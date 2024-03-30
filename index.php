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

$record = $reader->city('128.101.101.101');

print($record->country->isoCode);


$properties = get_object_vars($record);

foreach ($properties as $property => $value) {
    echo $property . ': ' . $value . PHP_EOL;
}
?>    
</body>
</html>
