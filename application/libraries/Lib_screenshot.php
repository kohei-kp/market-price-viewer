<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(__DIR__ . '/../../vendor/autoload.php');

use JonnyW\PhantomJs\Client as PhantomJS;
use Aws\S3\S3Client as Amazon_S3;

class Lib_screenshot
{

    private $phantomJsClient;
    private $s3Client;

    public function __construct()
    {
        $this->phantomJsClient = PhantomJS::getInstance();
        $this->phantomJsClient->getEngine()->setPath($_SERVER['DOCUMENT_ROOT'] . '/../vendor/jakoch/phantomjs/bin/phantomjs');

        $this->s3Client = new Amazon_S3([
            'credentials' => [
                'key' => getenv('AWS_S3_ACCESS_KEY'),
                'secret' => getenv('AWS_S3_SECRET_ACCESS_KEY')
            ],
            'region' => 'ap-northeast-1',
            'version' => 'latest'
        ]);
    }

    /**
     * URLにアクセスし、スクリーンショットを撮る
     *
     * @param string $url
     * @param integer $width
     * @param integer $height
     * @param integer $top
     * @param integer $left
     * @param string $filename
     * @return string objectURL
     */
    public function takeScreenshot($url, $width, $height, $top, $left, $filename)
    {
        try
        {
            $request = $this->phantomJsClient->getMessageFactory()->createCaptureRequest($url);
            $request->setCaptureDimensions($width, $height, $top, $left);

            $response = $this->phantomJsClient->getMessageFactory()->createResponse();

            // 保存先
            $file = "{$_SERVER['DOCUMENT_ROOT']}/assets/screenshot/{$filename}.jpg";
            $request->setOutputFile($file);

            $this->phantomJsClient->send($request, $response);

            // S3に保存
            $result = $this->s3Client->putObject([
                'Bucket' => getenv('AWS_S3_STORAGE'),
                'Key' => 'myscreenshotviewer/' . $filename . '.jpg',
                'Body' => fopen("{$_SERVER['DOCUMENT_ROOT']}/assets/screenshot/{$filename}.jpg", 'r'),
                'ACL' => 'public-read'
            ]);

            unlink("{$_SERVER['DOCUMENT_ROOT']}/assets/screenshot/{$filename}.jpg");
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * 複数更新する
     *
     * @param array $pages
     */
    public function takeScreenshots($pages)
    {
        foreach ($pages as $page)
        {
            $this->takeScreenshot(
                $page['url'],
                $page['width'],
                $page['height'],
                $page['top'],
                $page['left'],
                $page['filename']
            );
        }
    }
}
