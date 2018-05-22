<?php

    header('Content-Type: text/html; charset=ISO-8859-1'); 
    require_once('lib/nusoap.php');

    //Parámetros
    $ipAddress  = "187.189.79.18";
    $licenseKey = "";
    
    //url del webservice
    $wsdl="http://ws.cdyne.com/ip2geo/ip2geo.asmx?wsdl";
    
    //instanciando un nuevo objeto cliente para consumir el webservice
    $client=new nusoap_client($wsdl,'wsdl');

    //Setting credentials for Authentication 
	$client->setCredentials("EECHEVERRIA","GDC2016","basic");


    //pasando los parámetros a un array
    $param=array('ipAddress' => $ipAddress, 'licenseKey' => $licenseKey);

    //llamando al método y pasándole el array con los parámetros
    $resultado = $client->call('ResolveIP', $param);
   
    //si ocurre algún error al consumir el Web Service
    if ($client->fault) { // si
        $error = $client->getError();
    if ($error) { // Hubo algun error
            //echo 'Error:' . $error;
            //echo 'Error2:' . $error->faultactor;
            //echo 'Error3:' . $error->faultdetail;faultstring
            echo 'Error:  ' . $client->faultstring;
        }
        
        die();
    }
    echo "<pre>";
    //print_r($resultado);
	$result=$resultado['ResolveIPResult'];
	
	//for($i=0;$i<=count($result);$i++){
		echo $result['City']."<br>";

		echo "<br>"."<br>";		
	//}	
    echo "</pre>";

?>