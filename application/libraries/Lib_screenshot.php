<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(__DIR__ . '/../../vendor/autoload.php');

use JonnyW\PhantomJs\Client as PhantomJS;
use Aws\S3\S3Client as AWS_S3;

class Lib_screenshot
{

    private $phantomJsClient;
    private $s3Client;

    public function __construct()
    {
        $this->phantomJsClient = PhantomJS::getInstance();
        $this->phantomJsClient->getEngine()->setPath($_SERVER['DOCUMENT_ROOT'] . '/../vendor/jakoch/phantomjs/bin/phantomjs');

        $this->s3Client = AWS_S3::factory([
            'credentials' => [
                'key' => getenv('AWS_S3_ACCESS_KEY'),
                'secret' => getenv('AWS_S3_SECRET_KEY')
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
     */
    public function takeScreenshot($url, $width, $height, $top, $left, $filename)
    {
        $request = $this->phantomJsClient->getMessageFactory()->createCaptureRequest($url);

        $request->setCaptureDimensions($width, $height, $top, $left);

        $response = $this->phantomJsClient->getMessageFactory()->createResponse();

        // 保存先
        $file = "{$_SERVER['DOCUMENT_ROOT']}/assets/screenshot/{$filename}.jpg";
        $request->setOutputFile($file);

        $this->phantomJsClient->send($request, $response);

        $image = fopen("{$_SERVER['DOCUMENT_ROOT']}/assets/screenshot/{$filename}.jpg", 'rb');

        // S3に保存
        $this->s3Client->putObject([
            'Bucket' => getenv('AWS_S3_STORAGE'),
            'Key' => $filename . '.jpg',
            'Body' => $image,
            'ContentType' => 'image/jpeg'
        ]);
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
