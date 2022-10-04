<?php

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";

    // prelevo il tipo di popup
    $tipo = $_POST['tipoForm'];
    
    switch($tipo){
        case "NomeCognome":
            NomeCognome();
            break;
        case "FotoProfilo":
            FotoProfilo();
            break;
        case "Indirizzo":
            Indirizzo();
            break;
        case "Password":
            Password();
            break;
        case "Telefono":
            Telefono();
            break;
        case "DataNascita":
            DataNascita();
            break;
        case "Sesso":
            Sesso();
            break;
        default:
            break;
    }
    
    // funzioni di modifica nel database
    function NomeCognome(){
        
        $userId = $_POST['userId'];
        $Nome = $_POST['Nome'];
        $Cognome = $_POST['Cognome'];

        if(isset($Nome) && isset($Cognome)){
            if(modificaNomeCognome($userId,$Nome,$Cognome))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    function FotoProfilo(){

        $userId = $_POST['userId'];

        $risultato = getAccountById($userId);
        $rigaRisultato = $risultato->fetch_assoc();

        $dir = './../../img/utenti/';
        $name = $rigaRisultato['username'];

        $tmp = $_FILES['Foto']['tmp_name'];
        $imgtype = $_FILES['Foto']['type'];
        
        $type = explode("/",$imgtype);

        $percorsoDatabase = './../img/utenti/' . $name .'.'. $type[1];

        modificaFotoProfilo($userId,$percorsoDatabase);

        move_uploaded_file($tmp , $dir . $name .'.'. $type[1]);
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }

    function Indirizzo(){
        $userId = $_POST['userId'];
        $Indirizzo = $_POST['Indirizzo'];

        if(isset($Indirizzo)){
            if(modificaIndirizzo($userId,$Indirizzo))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    function Password(){
        $userId = $_POST['userId'];
        $Password = $_POST['Pass1'];

        if(isset($Password)){
            $passHash = password_hash($Password,PASSWORD_BCRYPT);
            if(modificaPassword($userId,$passHash))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    function Telefono(){
        $userId = $_POST['userId'];
        $Telefono = $_POST['Telefono'];

        if(isset($Telefono)){
            if(modificaTelefono($userId,$Telefono))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }

    function DataNascita(){
        $userId = $_POST['userId'];
        $DataNascita = $_POST['DataNascita'];

        if(isset($DataNascita)){
            if(modificaDataNascita($userId,$DataNascita))
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }

    }

    function Sesso(){
        $userId = $_POST['userId'];
        $Sesso = $_POST['Sesso'];

        if($Sesso == "Altro"){
            $Sesso = NULL;
        }

        if(modificaSesso($userId,$Sesso))
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }

?>