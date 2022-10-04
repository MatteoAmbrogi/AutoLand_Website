<?php
	require_once __DIR__ . "/config.php";
	
    session_start();
    include DIR_UTIL . "sessionUtil.php";

    // controllo dell'accesso
    if (!isLogged()){
		    header('Location: ./../index.php');
		    exit;
    }
    	
?>





<!DOCTYPE html>

<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name = "author" content = "Ambrogi Matteo">
        <meta name = "keywords" content = "Cars, Auto, Macchine, Automobili">
        <meta name="description" content="Vendita, Acquisto e Gestione Automobili">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
        <link rel="stylesheet" href="./../css/home.css" type="text/css" media="screen">
        <link rel="stylesheet" href="./../css/main-dettagliAuto.css" type="text/css" media="screen">
        <link rel="icon" href="./../css/img/favicon.ico" type="image/x-icon">
		<script type="text/javascript" src="./../js/Effetti.js"></script>
        <title>AutoLand - Dettagli Auto</title>
    </head>
    <body>    
        
        <?php
            // includo il layout del sito
            include DIR_LAYOUT . "navaside.php";
            
            include DIR_LAYOUT . "dettagli_dashboard.php";
			
            echo '<main class="main-content">';
            
        
            $codAuto = $_GET['codAuto'];
            showDettagliAuto($codAuto);
            
            echo '</main>';

            include DIR_LAYOUT . "footer.php";
        ?>
        
    </body>
</html>