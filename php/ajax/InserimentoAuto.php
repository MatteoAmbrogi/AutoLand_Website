<?php
    session_start();

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";


    $response = new AjaxResponse();

    // prelevo dei dati inviati da ajax
    $produttore = $_POST['produttore'];
    $NomeModello = $_POST['NomeModello'];
    $Cilindrata = $_POST['Cilindrata'];
    $Cavalli = $_POST['Cavalli'];
    $Cilindri = $_POST['Cilindri'];
    $Cambio = $_POST['Cambio'];
    $Marce = $_POST['Marce'];
    $Posti = $_POST['Posti'];
    $Porte = $_POST['Porte'];
    $Bagagliaio = $_POST['Bagagliaio'];
    $Peso = $_POST['Peso'];
    $Lunghezza = $_POST['Lunghezza'];
    $Larghezza = $_POST['Larghezza'];
    $Altezza = $_POST['Altezza'];
    $TipoCarburante = $_POST['TipoCarburante'];
    $Serbatoio = $_POST['Serbatoio'];
    $Velocita = $_POST['Velocita'];
    $ConsumoUrb = $_POST['ConsumoUrbano'];
    $ConsumoExtr = $_POST['ConsumoExtraurbano'];
    $ConsumoMisto = $_POST['ConsumoMisto'];
    $Emissione = $_POST['Emissione'];

    // caricamento della foto nella cartella
    $tmp = $_FILES['FotoAuto']['tmp_name'];
    $name = $_FILES['FotoAuto']['name'];
    $dir = './../../img/auto/';
    $FotoAuto =  './../img/auto/' . $name;
    move_uploaded_file($tmp , $dir . $name);

    // aggiungo il modello 
    AggiungiModello($produttore,$NomeModello,$FotoAuto,$Cilindrata, $Cavalli , $Cambio , $Marce , $Cilindri ,
    $Posti , $Porte , $Lunghezza , $Larghezza , $Altezza , $Peso , $Bagagliaio , $TipoCarburante ,
    $Serbatoio , $Velocita , $ConsumoUrb , $ConsumoExtr , $ConsumoMisto ,
    $Emissione);

    $risultatoCodModello = getNewCodModello($produttore,$NomeModello,$FotoAuto,$Cilindrata, $Cavalli , $Cambio , $Marce , $Cilindri ,
    $Posti , $Porte , $Lunghezza , $Larghezza , $Altezza , $Peso , $Bagagliaio , $TipoCarburante ,
    $Serbatoio , $Velocita , $ConsumoUrb , $ConsumoExtr , $ConsumoMisto ,
    $Emissione);
    $rigaRisultato = $risultatoCodModello->fetch_assoc();
    $codModello = $rigaRisultato['codModello'];
        

    $nuovoUsato = $_POST['nuovoUsato'];

    $commerciale = $_POST['commerciale'];
    $elettrico = $_POST['elettrico'];

    $prezzo = $_POST['prezzo'];
    $CodConcessionaria = $_POST['CodConcessionaria'];

    if($nuovoUsato == 1){
        AggiungiNuovo($CodConcessionaria , $codModello , $prezzo ,$commerciale , $elettrico);
    }else{
        $PaeseOrigine = $_POST['PaeseOrigine'];
        $Anno = $_POST['Anno'];
        $totKm = $_POST['totKm'];
        $Targa = $_POST['Targa'];
        $UltimaManu = $_POST['UltimaManutenzione'];
        $ProprietariPrec = $_POST['ProprietariPrec'];

        AggiungiAutoUsato($CodConcessionaria , $codModello , $prezzo , $commerciale , $elettrico , $PaeseOrigine , $Anno , $totKm , $Targa , $UltimaManu , $ProprietariPrec);
    }





    $message = "OK";
    $code = "0";
    $response = new AjaxResponse($code, $message);
    echo json_encode($response);
    return;



?>