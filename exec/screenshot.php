<?php
require_once(__DIR__ . '/../vendor/autoload.php');

use JonnyW\PhantomJs\Client;
use Aws\S3\S3Client;

$client = Client::getInstance();
$s3Client = new S3Client([
    'credentils' => [
        'key' => getenv('AWS_S3_ACCESS_KEY'),
        'secret' => getenv('AWS_S3_SECRET_ACCESS_KEY')
    ],
    'region' => 'ap-northeast-1',
    'version' => 'latest'
]);

// DB接続
try
{
    $db_host = getenv('DB_HOST');
    $db_name = getenv('DB_NAME');
    $db_pass = getenv('DB_PASSWORD');
    $db_user = getenv('DB_USER');

    $dsn = "mysql:dbname=${db_name};host=${db_host}";
    $dbh = new PDO($dsn, $db_user, $db_pass);

    $sql = 'SELECT * FROM cards JOIN sites ON cards.site_id = sites.site_id';

    if (isset($argv[1]))
    {
        $sql.= ' WHERE cards.card_id = ?';
    }

    $stmt = $dbh->prepare($sql);
    $stmt->execute([isset($argv[1]) ? $argv[1] : NULL]);

    while ($result = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $request = $client->getMessageFactory()->createCaptureRequest($result['url']);

        $request->setCaptureDimensions($result['width'], $result['height'], $result['top'], $result['left']);
        $response = $client->getMessageFactory()->createResponse();

        // 保存先
        $file = __DIR__ . '/../htdocs/assets/screenshot/' . $result['card_id'] . '.jpg';
        $request->setOutputFile($file);

        $client->send($request, $response);

        // S3に保存
        $resultS3 = $s3Client->putObject([
            'Bucket' => getenv('AWS_S3_STORAGE'),
            'Key' => 'myscreenshotviewer/' . $result['card_id'] . '.jpg',
            'Body' => fopen(__DIR__ . '/../htdocs/assets/screenshot/' . $result['card_id'] . '.jpg', 'r'),
            'ACL' => 'public-read'
        ]);
        unlink(__DIR__ . '/../htdocs/assets/screenshot/' . $result['card_id'] . '.jpg');
    }
}
catch (Exception $e)
{
    throw $e;
}
