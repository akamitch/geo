<?php
require_once 'vendor/autoload.php';
use GeoIp2\Database\Reader;

// This reader object should be reused across lookups as creation of it is
// expensive.
$reader = new Reader('GeoLite2-City.mmdb');

$record = $reader->city('128.101.101.101');

print($record->country->isoCode);
?>