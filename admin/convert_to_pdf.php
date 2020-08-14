<?php

require_once('../vendor/autoload.php');
require_once('../vendor/cloudmersive/cloudmersive_document_convert_api_client/vendor/autoload.php');

$filename=$_POST["doc"];

// Configure API key authorization: Apikey
$config = Swagger\Client\Configuration::getDefaultConfiguration()->setApiKey('Apikey', '8fb904ff-c6f0-42a6-b5f1-0a0b84e05269');

$name_with_ext = explode(".", "$filename");

$only_name = $name_with_ext[0];

$apiInstance = new Swagger\Client\Api\ConvertDocumentApi(

    new GuzzleHttp\Client(),
    $config
);
$input_file = "../documents/words/$filename"; // \SplFileObject | Input file to perform the operation on.

try {
    $result = $apiInstance->convertDocumentDocxToPdf($input_file);

    header('content-disposition: attachment; filename=' . "$only_name" . '.pdf');
    header('Content-type: application/octet-stream');

    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ConvertDocumentApi->convertDocumentDocxToPdf: ', $e->getMessage(), PHP_EOL;
}
