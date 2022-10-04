<?php

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";

    // prelevo i dati dalla form
    $username = $_POST['username'];
    $name = $_POST['name'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $provincia = $_POST['Provincia'];
    $citta = $_POST['Citta'];
    $cap = $_POST['Cap'];
    $via = $_POST['Via'];
    $civico = $_POST['Civico'];
    $descrizione = $_POST['Descrizione'];
    $lunedi = $_POST['Lunedi'];
    $martedi = $_POST['Martedi'];
    $mercoledi = $_POST['Mercoledi'];
    $giovedi = $_POST['Giovedi'];
    $venerdi = $_POST['Venerdi'];
    $sabato = $_POST['Sabato'];
    $domenica = $_POST['Domenica'];

    // crittografia della password
    $passHash = password_hash($password,PASSWORD_BCRYPT);

    // se la foto non e' stata caricata 
    if($_FILES['foto']['error']==4){
        
        // inserimento nel database senza foto
        if(inserisciNuovaConcessionaria($username,$name,$telefono,$email,$passHash,$provincia,$citta,$cap,$via,
        $civico,$descrizione,$lunedi,$martedi,$mercoledi,$giovedi,$venerdi,$sabato,$domenica))
        {
            header('location: ./../../index.php');
        }else{
            echo '<script>window.alert("Si sono verificati degli errori")</script>';
        }
    }else{
        // sposto la foto nella cartlla corretta
        $dir = './../../img/concessionaria/';
        $nomeFoto = $username;
    
        $tmp = $_FILES['foto']['tmp_name'];
        $imgtype = $_FILES['foto']['type'];
        
        $type = explode("/",$imgtype);
    
        $percorsoDatabase = './../img/concessionaria/' . $nomeFoto .'.'. $type[1];
    
        move_uploaded_file($tmp , $dir . $nomeFoto .'.'. $type[1]);
    
        // inserimento nel database
        if(inserisciNuovaConcessionariaFoto($username,$name,$telefono,$email,$passHash,$provincia,$citta,$cap,$via,
        $civico,$descrizione,$lunedi,$martedi,$mercoledi,$giovedi,$venerdi,$sabato,$domenica,$percorsoDatabase))
        {
            header('location: ./../../index.php');
        }else{
            echo '<script>window.alert("Si sono verificati degli errori")</script>';
        }
    }



?>