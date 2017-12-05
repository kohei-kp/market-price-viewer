<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once(__DIR__ . '/../../vendor/autoload.php');

use JonnyW\PhantomJs\Client;

class Lib_screenshot
{

    private $client;

    public function __construct()
    {
        $this->client = Client::getInstance();
        $this->client->getEngine()->setPath($_SERVER['DOCUMENT_ROOT'] . '/../vendor/jakoch/phantomjs/bin/phantomjs');
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
        $request = $this->client->getMessageFactory()->createCaptureRequest($url);

        $request->setCaptureDimensions($width, $height, $top, $left);

        $response = $this->client->getMessageFactory()->createResponse();

        // 保存先
        $file = "{$_SERVER['DOCUMENT_ROOT']}/assets/screenshot/{$filename}.jpg";
        $request->setOutputFile($file);

        $this->client->send($request, $response);
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
