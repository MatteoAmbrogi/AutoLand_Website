<?php
	require_once __DIR__ . "/config.php";
	session_start();
    include DIR_UTIL . "sessionUtil.php";

    // controllo accesso
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
        <link rel="stylesheet" href="./../css/accountUtente.css" type="text/css" media="screen">
        <link rel="stylesheet" href="./../css/main-content.css" type="text/css" media="screen">
        <link rel="icon" href="./../css/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="./../js/popup.js"></script>	
        <script type="text/javascript" src="./../js/ajax/AjaxManager.js"></script>	
		<script type="text/javascript" src="./../js/ajax/CarLoader.js"></script>
		<script type="text/javascript" src="./../js/ajax/CarDashboard.js"></script>
        <script type="text/javascript" src="./../js/ajax/preferitiHandler.js"></script>
        <title>AutoLand - Account</title>
    </head>
    <body>    
        
        <?php
            
            // includo i file di layout
            include DIR_LAYOUT . "navaside.php";
            
            include DIR_LAYOUT . "accountUtenteDashboard.php";
			
            echo '<main class="main-content">';
                    
                $userId = $_SESSION['userIdCars'];
                showDettagliAccount($userId);

            echo '</main>';

            include DIR_LAYOUT . "footer.php";
        ?>

        <script type="text/javascript">
            // aggiunta delle auto preferite con ajax
            CarLoader.loadDataPreferiti();
        </script>

    </body>
</html>