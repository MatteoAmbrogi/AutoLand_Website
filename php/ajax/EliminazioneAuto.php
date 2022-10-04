<?php
    session_start();

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";

    $response = new AjaxResponse();

    if(isset($_GET['codAuto']) && isset($_GET['codConcessionaria'])){
        $codAuto = $_GET['codAuto'];
        $codConcessionaria = $_GET['codConcessionaria'];

        // elimino la riga dal database
        if(removeAutoById($codAuto)){
            $message = "OK";
            $code = "0";
            $response = new AjaxResponse($code, $message);

            $response->data = $codConcessionaria;

            echo json_encode($response);
            return;
        }
    }



    // se si presentano degli errori
    echo json_encode($response);
    return;
?>