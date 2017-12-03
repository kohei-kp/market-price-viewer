<?php

require_once('vendor/autoload.php');

use JonnyW\PhantomJs\Client;

$client = Client::getInstance();

// DB接続
try
{
    $dsn = 'mysql:dbname=cards;host:localhost';
    $dbh = new PDO($dsn, 'root', 'root');

    $stmt = $dbh->prepare(
        'SELECT * from cards JOIN sites ON cards.site_id = sites.site_id'
    );

    $stmt->execute();

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
    {

        $request = $client->getMessageFactory()->createCaptureRequest($result['url']);

        $request->setCaptureDimensions($result['width'], $result['height'], $result['top'], $result['left']);
        $response = $client->getMessageFactory()->createResponse();

        // 保存先
        $file = './htdocs/assets/screenshot/' . $result['card_id'] . '.jpg';
        $request->setOutputFile($file);

        $client->send($request, $response);
        //if ($response->getStatus() === 200)
        //{
        //    echo $response->getContent();
        //}
    }
}
catch (Exception $e)
{
    throw $e;
}
