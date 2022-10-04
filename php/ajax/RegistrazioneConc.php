<?php
    session_start();

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";


    $response = new AjaxResponse();

    // controllo username
    if(isset($_GET['Username'])){
        $username = $_GET['Username'];
        $result = checkUsernameConcessionaria($username);
        $numRow = mysqli_num_rows($result);
        
        $message = "OK";
        $code = "0";
        if( $numRow == 1 )
        {
            $message = "Username gia' in uso";
            $code = "-1";
        }
        $response = new AjaxResponse($code, $message);
        echo json_encode($response);
        return;
    }

    // controllo email
    if(isset($_GET['email']))
    {
        $email = $_GET['email'];
        $result = checkEmailConcessionaria($email);
        $numRow = mysqli_num_rows($result);
        
        $message = "OK";
        $code = "0";
        if( $numRow == 1 )
        {
            $message = "Email gia' in uso";
            $code = "-1";
        }
        $response = new AjaxResponse($code, $message);
        echo json_encode($response);
        return;
    }

    
    // se si presentano degli errori
    echo json_encode($response);
    return;


?>