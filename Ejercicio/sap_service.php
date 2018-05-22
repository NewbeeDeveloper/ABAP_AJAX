<?php

    header('Content-Type: text/html; charset=ISO-8859-1'); 
    require_once('lib/nusoap.php');

    //Parámetros
    $ICadena  = "EDUARDO";
    
    //url del webservice
    $wsdl="http://omerpdev.omnilife.com:8008/sap/bc/srt/wsdl/flv_10002A111AD1/srvc_url/sap/bc/srt/rfc/sap/zmf_envio_ajax/100/zmf_envio_ajax/zmf_envio_ajax_b?sap-client=100";
    
    //instanciando un nuevo objeto cliente para consumir el webservice
    $client=new nusoap_client($wsdl,'wsdl');

    $client->setCredentials("EECHEVERRIA","GDC2016");

    var_dump($client);

    //pasando los parámetros a un array
     $param=array('ICadena' => $ICadena);

     var_dump($param);
    //llamando al método y pasándole el array con los parámetros
     try {

           $resultado = $client->call('ZmfEnvioAjax', $param); 
                   var_dump($resultado);

         
     } catch (Exception $e) {

        var_dump($e);
         
     }


   
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

   echo  $result = $resultado['ECadena'] ;




?>