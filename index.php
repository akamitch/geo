<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeoIP Mitch test</title>
</head>
<body>
    <h1>Test GeoIP</h1>
    <p>
        If country = US and Subdivision isoCode = DE, will be redirected to http://delaver.yahoo.com
    </p>
<?php
require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;

// This reader object should be reused across lookups as creation of it is
// expensive.
$reader = new Reader('GeoLite2-City.mmdb');
//$clientIP = '128.101.101.101';
$clientIP = $_SERVER['HTTP_CF_CONNECTING_IP'];

$record = $reader->city($clientIP);
$country = $record->country->isoCode;
$subdivision = $record->mostSpecificSubdivision->isoCode;
print("Country: " . $country . "<br>\n"); // 'US'
print("Subdivision isoCode: " . $subdivision . "<br>\n"); // 'MN'
print("Subdivision name: " . $record->mostSpecificSubdivision->name . "<br>\n"); // 'Minnesota'

if ($country == "US" && $subdivision == "DE") {
    $newURL = "http://delaver.yahoo.com";
    header("Location: $newURL");
}



?>    
</body>
</html>
