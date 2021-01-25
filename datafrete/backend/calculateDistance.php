<?php
	function haversine($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000) {
	  $latFrom = deg2rad($latitudeFrom);
	  $lonFrom = deg2rad($longitudeFrom);
	  $latTo = deg2rad($latitudeTo);
	  $lonTo = deg2rad($longitudeTo);

	  $latDelta = $latTo - $latFrom;
	  $lonDelta = $lonTo - $lonFrom;

	  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
	  return number_format($angle * $earthRadius, 2, ',', '.');
	}

	try {
		$lat1 = isset($_GET["lat1"])? $_GET["lat1"] : null;
		$lat2 = isset($_GET["lat2"])? $_GET["lat2"] : null;
		$lon1 = isset($_GET["lon1"])? $_GET["lon1"] : null;
		$lon2 = isset($_GET["lon2"])? $_GET["lon2"] : null;

		if ($lat1 && $lat2 && $lon1 && $lon2) {
			echo json_encode(array("success" => 1, "message" => "Sucesso.", "value" => haversine($lat1, $lon1, $lat2, $lon2)));
		} else {
			throw new Exception("Valores não informados.");
		}

	} catch (Exception $e) {
		throw new Exception ($e->getMessage());
	}
?>