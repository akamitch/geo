<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Test GeoIP 2</h1>
<?php
require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;

// This reader object should be reused across lookups as creation of it is
// expensive.
$reader = new Reader('GeoLite2-City.mmdb');
//$clientIP = '128.101.101.101';
$clientIP = $_SERVER['HTTP_CF_CONNECTING_IP'];

$record = $reader->city($clientIP);

print($record->country->isoCode . "<br>\n"); // 'US'
print($record->mostSpecificSubdivision->name . "<br>\n"); // 'Minnesota'
print($record->mostSpecificSubdivision->isoCode . "<br>\n"); // 'MN'
?>    
</body>
</html>
