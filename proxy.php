<?php
$token = '3df4514cde0d15dd2b8269b1008a0b8b83c37ff02ad81c9f8c81c5706e84e9ce';
$session_id = 'ac3ce102dde2c42918bd671e0c8414e1';
$cookie = "__utma=262503198.1480261429.1399890343.1403400273.1404247653.10; __utmz=262503198.1399890343.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); test-persistent=1; CSRF_TOKEN=$token; __utmb=262503198.9.10.1404247653; __utmc=262503198; test-session=1; PHPSESSID=$session_id; visitedDashboard=1";
if (isset($_POST['paramed']) && $_POST['paramed'] == 'true') {
	$pickupAreas = $_POST['pickupAreas'];
	$deliveryAreas = $_POST['deliveryAreas'];
	$vehicleTypeIds = $_POST['vehicleTypeIds'];

	$cmd = "curl " .
		"'https://www.centraldispatch.com/protected/listing-search/get-results-ajax' ".
		"-H 'Host: www.centraldispatch.com' " .
		"-H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:31.0) Gecko/20100101 Firefox/31.0 Iceweasel/31.0' " .
		"-H 'Accept: application/json, text/javascript, */*; q=0.01' " .
		"-H 'Accept-Language: en-US,en;q=0.5' " .
		"-H 'Accept-Encoding: gzip, deflate' " .
		"-H 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8' " .
		"-H 'X-Requested-With: XMLHttpRequest' " .
		"-H 'Referer: https://www.centraldispatch.com/protected/listing-search/result?$pickupAreas&pickupRadius=25&pickupCity=&pickupState=&pickupZip=&origination_valid=1&$deliveryAreas&deliveryRadius=25&deliveryCity=&deliveryState=&deliveryZip=&destination_valid=1&$vehicleTypeIds&trailerType=&vehiclesRun=&minVehicles=1&maxVehicles=&shipWithin=30&paymentType=&minPayPrice=&minPayPerMile=&highlightPeriod=1&listingsPerPage=100&highlightOnTop=1&postedBy=&primarySort=1&secondarySort=4&CSRFToken=$token' " .
		"-H 'Cookie: $cookie' " .
		"-H 'Connection: keep-alive' " .
		"-o /tmp/file.gz " .
		"--insecure " .
		"-H 'Pragma: no-cache' " .
		"-H 'Cache-Control: no-cache' --data 'pageStart=0&pageSize=100&destination_valid=1&origination_valid=1&deliveryCity=&deliveryRadius=25&deliveryState=&deliveryZip=&$deliveryAreas&highlightPeriod=1&highlightOnTop=1&listingsPerPage=100&maxVehicles=&minPayPerMile=&minPayPrice=&minVehicles=1&paymentType=&$pickupAreas&pickupCity=&pickupRadius=25&pickupState=&pickupZip=&postedBy=&primarySort=1&secondarySort=4&shipWithin=30&trailerType=&$vehicleTypeIds&vehiclesRun=&CSRFToken=$token&init=undefined'";
	$cmd1 = "curl " . 
		"'https://www.centraldispatch.com/protected/listing-search/get-results-ajax' " .
		"-H 'Accept: application/json, text/javascript, */*; q=0.01' " .
		"-H 'Accept-Encoding: gzip, deflate' " .
		"-H 'Accept-Language: en-US,en;q=0.5' " .
		"-H 'Cache-Control: no-cache' " .
		"-H 'Connection: keep-alive' " .
		"-H 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8' " .
		"-H 'Cookie: $cookie' " .
		"-H 'Host: www.centraldispatch.com' " .
		"-H 'Pragma: no-cache' " .
		"-H 'Referer: https://www.centraldispatch.com/protected/listing-search/result?$pickupAreas&pickupRadius=25&pickupCity=&pickupState=&pickupZip=&origination_valid=1&$deliveryAreas&deliveryRadius=25&deliveryCity=&deliveryState=&deliveryZip=&destination_valid=1&trailerType=&$vehicleTypeIds&vehiclesRun=&minVehicles=1&maxVehicles=&shipWithin=30&paymentType=&minPayPrice=&minPayPerMile=&highlightPeriod=1&listingsPerPage=100&highlightOnTop=1&postedBy=&primarySort=1&secondarySort=4&CSRFToken=$token' " .
		"-H 'User-Agent: Mozilla/5.0 (X11; Linux x86_64; rv:30.0) Gecko/20100101 Firefox/30.0 Iceweasel/30.0' " .
		"-o /tmp/file.gz " .
		"--insecure " .
		"-H 'X-Requested-With: XMLHttpRequest' " .
		"--data 'pageStart=0&pageSize=100&destination_valid=1&origination_valid=1&deliveryCity=&deliveryRadius=25&deliveryState=&deliveryZip=&$deliveryAreas&highlightPeriod=1&highlightOnTop=1&listingsPerPage=100&maxVehicles=&minPayPerMile=&minPayPrice=&minVehicles=1&paymentType=&$pickupAreas&pickupCity=&pickupRadius=25&pickupState=&pickupZip=&postedBy=&primarySort=1&secondarySort=4&shipWithin=30&$vehicleTypeIds&trailerType=&vehiclesRun=&CSRFToken=$token&init=undefined'";
} else {
	if (isset($_GET['sid'])) {
		$sid = (int)$_GET['sid'];
	} else {
		$sid = die('{}');
	}
	$cmd = "wget 'http://centraldispatch.com/protected/listing-search/get-results-ajax' --post-data='pageStart=0&pageSize=100&id=$sid&listingsPerPage=100&CSRFToken=$token&init=undefined' --header='Accept: application/json, text/javascript, */*; q=0.01' --header='Accept-Encoding: gzip, deflate' --header='Cache-Control: no-cache' --header='Connection: keep-alive' --header='Content-Length: 144' --header='Content-Type: application/x-www-form-urlencoded; charset=UTF-8' --header='Cookie: $cookie' --header='Host: centraldispatch.com' --header='Pragma: no-cache' --header='Referer: https://centraldispatch.com/protected/listing-search/result?id=162186' --header='User-Agent: Mozilla/5.0 (Windows NT 6.1; rv:30.0) Gecko/20100101 Firefox/30.0' --header='X-Requested-With: XMLHttpRequest' -O /tmp/file.gz";
}
	file_put_contents('/tmp/result.log',$cmd);
	//file_put_contents('/tmp/result.log', print_r($_POST, 1));
	exec($cmd);
	$ret = file_get_contents('/tmp/file.gz');
	$data = gzdecode($ret);
	$data = str_replace('\n', '', $data);

	die($data);