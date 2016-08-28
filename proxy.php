<?php

$data_file = "data.gz";
$data_file_path = __DIR__."/$data_file";

$prev_values = explode("\n", file_get_contents(__DIR__ . '/prev_values.ini'));
$session_id = trim(isset($prev_values[0]) ? $prev_values[0] : 'f95f4c6c737293cd39198119b7d0617f');
$token = trim(isset($prev_values[1]) ? $prev_values[1] : 'aecc8306886c901a27c1bbe0f765c973013f99bbce21dbc4af3e615833c02509');

$cookie = "routeBased=0; CSRF_TOKEN=$token; __utmt=1; test-persistent=1; PHPSESSID=$session_id; visitedDashboard=1; __utma=262503198.1047277846.1423690780.1445377380.1447104745.8; __utmb=262503198.3.10.1447104745; __utmc=262503198; __utmz=262503198.1423690780.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); test-session=1; defaultView=list";

$pickupAreas = $_POST['pickupAreas'];
$deliveryAreas = $_POST['deliveryAreas'];
$vehicleTypeIds = $_POST['vehicleTypeIds'];

$cmd = "curl 'https://www.centraldispatch.com/protected/listing-search/get-results-ajax' " .
    " -H 'Accept: application/json, text/javascript, */*; q=0.01' " .
    " -H 'Accept-Encoding: gzip, deflate' " .
    " -H 'Accept-Language: en-US,en;q=0.5' " .
    " -H 'Cache-Control: no-cache' " .
    " -H 'Connection: keep-alive' " .
    " -H 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8' " .
    " -H 'Cookie: $cookie' " .
    " -H 'Host: www.centraldispatch.com' " .
    " --compressed " .
    " -H 'Pragma: no-cache' " .
    " -H 'Origin: https://www.centraldispatch.com' " . 
    " -H 'Referer: https://www.centraldispatch.com/protected/listing-search/result?$pickupAreas&pickupRadius=25&pickupCity=&pickupState=&pickupZip=&origination_valid=1&FatAllowCanada=1&$deliveryAreas&deliveryRadius=25&deliveryCity=&deliveryState=&deliveryZip=&destination_valid=1&$vehicleTypeIds&FatAllowCanada=1&trailerType=&vehiclesRun=&minVehicles=1&maxVehicles=&shipWithin=60&paymentType=&minPayPrice=&minPayPerMile=&highlightOnTop=1&highlightPeriod=1&listingsPerPage=100&postedBy=&primarySort=1&secondarySort=1&CSRFToken=$token' " .
    " -H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0 Iceweasel/36.0' " .
    " -o $data_file_path " .
    " -H 'X-Requested-With: XMLHttpRequest' --data 'pageStart=0&pageSize=100&destination_valid=1&origination_valid=1&deliveryCity=&deliveryRadius=25&deliveryState=&deliveryZip=&$deliveryAreas&highlightOnTop=1&highlightPeriod=1&listingsPerPage=100&maxVehicles=&minPayPerMile=&minPayPrice=&minVehicles=1&paymentType=&$pickupAreas&$vehicleTypeIds&pickupCity=&pickupRadius=25&pickupState=&pickupZip=&postedBy=&primarySort=1&secondarySort=4&shipWithin=60&trailerType=&vehiclesRun=&CSRFToken=$token&init=undefined' ";
exec($cmd);
if (file_exists($data_file_path)) {
    $ret = file_get_contents("$data_file_path");
    $data = $ret; //gzdecode($ret);
    $data = str_replace('\n', '', $data);
    unlink("$data_file_path");
} else {
    $data = '';
}

die($data);