<?php

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";

    // prelevo i dati dalla form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $indirizzo = $_POST['indirizzo'];
    $telefono = $_POST['telefono'];

    // crittografia della password
    $passHash = password_hash($password,PASSWORD_BCRYPT);

    // inserimento nuovo utente
    if(inserisciNuovoUtente($username,$passHash,$email,$nome,$cognome,$indirizzo,$telefono))
    {
        header('location: ./../../index.php');
    }else{
        echo '<script>window.alert("Si sono verificati degli errori")</script>';
    }


?>