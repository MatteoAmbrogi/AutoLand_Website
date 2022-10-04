<?php
    session_start();

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";

    $response = new AjaxResponse();

    if(isset($_GET['autoId']) && isset($_GET['flag']))
    {
        $autoId = $_GET['autoId'];
        $flag = $_GET['flag'];

        // flag uguale a 0 devo togliere la riga dal database, 1 devo inserirlo
        if($flag == 0){
            if(removePreferiti($autoId,$_SESSION['userIdCars'])){
                $message = "OK";
                $code = "0";
                $response = new AjaxResponse($code, $message);

                $Auto = new Auto();
                $Auto->codAuto = $autoId;
                $Auto->isPreferito = $flag;

                $response->data = $Auto;

                echo json_encode($response);
                return;
            }
        }else if($flag == 1){
            if(inserisciPreferiti($autoId,$_SESSION['userIdCars'])){
                $message = "OK";
                $code = "0";
                $response = new AjaxResponse($code, $message);
                
                $Auto = new Auto();
                $Auto->codAuto = $autoId;
                $Auto->isPreferito = $flag;

                $response->data = $Auto;
                
                echo json_encode($response);
                return;
            }
        }
    }


    // se si presentano degli errori
    echo json_encode($response);
    return;


?>