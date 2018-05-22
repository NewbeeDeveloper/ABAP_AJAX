<?php

ini_set('soap.wsdl_cache_enabled', 0);
ini_set('soap.wsdl_cache_ttl', 900);
ini_set('default_socket_timeout', 15);


// Servicio WEB y creedenciales
$wsdl_emp     = "WSDL1.xml";
$options_emp  = array('login' => "", 'password' => "" );

//LLamado al servicio WEB
	try{ $client = new SoapClient($wsdl_emp,$options_emp); }catch(Exception $e){
		echo "Excepcion!!!!";
		var_dump($e);
		$e->getMessage();
		exit(0);
	}

	//Prámetros para el método
	$arr_in = array();
	$arr_in["ICadena"]	= $_REQUEST["q"];

	//LLamado al método
	$res = $client->ZmfEnvioAjax($arr_in);	

	//Impresión en de la respuesta
	echo $respuesta = $res->ECadena ;

?>

