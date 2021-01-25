<?php
try {
	$value = isset($_GET['value']) ? $_GET['value'] : null;

	if ($value) {
		$opts = array('http' =>
		    array(
		        'method'  => 'GET',
		        'header'  => 'Authorization: Token token=991c75ebcb31d5fcc0dab002589c571a'
		    )
		);

		$context = stream_context_create($opts);
		$result = file_get_contents('https://www.cepaberto.com/api/v3/cep?cep='.$value, false, $context);

		echo json_encode(array("success" => 1, "message" => "Sucesso.", "value" => $result));
	} else {
		throw new Exception ("CEP não informado.");
	}
} catch(Exception $e) {
	throw $e;
}
?>