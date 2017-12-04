<?php

require_once('vendor/autoload.php');

use JonnyW\PhantomJs\Client;

$client = Client::getInstance();

$request = $client->getMessageFactory()->createCaptureRequest("http://www.hareruyamtg.com/jp/g/gSETS000117/");
//$request = $client->getMessageFactory()->createCaptureRequest('http://jonnyw.me');

//$width  = 400;
//$height = 200;
$dim_width  = 680;
$dim_height = 250;
$top        = 290;
$left       = 260;

//$request->setViewportSize($width, $height);
$request->setCaptureDimensions($dim_width, $dim_height, $top, $left);

$response = $client->getMessageFactory()->createResponse();

// 保存作
$file = 'screenshot/capture.jpg';

$request->setOutputFile($file);

$client->send($request, $response);

if ($response->getStatus() === 200)
{
    echo $response->getContent();
}


