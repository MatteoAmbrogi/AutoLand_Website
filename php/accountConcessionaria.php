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
        <link rel="stylesheet" href="./../css/accountConcessionaria.css" type="text/css" media="screen">
        <link rel="stylesheet" href="./../css/main-content.css" type="text/css" media="screen">
        <link rel="icon" href="./../css/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="./../js/popupConcessionaria.js"></script>
        <script type="text/javascript" src="./../js/ajax/AjaxManager.js"></script>	
		<script type="text/javascript" src="./../js/ajax/CarLoader.js"></script>
		<script type="text/javascript" src="./../js/ajax/CarDashboard.js"></script>
		<script type="text/javascript" src="./../js/ajax/EliminaAuto.js"></script>
        <title>AutoLand - Account Concessionaria</title>
    </head>
    <body>    
        
        <?php
            
            // includo i file di layout
            include DIR_LAYOUT . "navaside.php";
            
            include DIR_LAYOUT . "accountConcessionariaDashboard.php";
			
            echo '<main class="main-content">';
                    
                $codConcessionaria = $_SESSION['userIdCars'];
                showDettagliConcessionaria($codConcessionaria);

            echo '</main>';

            include DIR_LAYOUT . "footer.php";
        ?>
        
        <script type="text/javascript">
            // caricamento delle auto della concessionaria tramite ajax
            var codConcessionaria = <?php echo $_SESSION['userIdCars'] ?>;
            CarLoader.loadDataConcessionariaAccount(codConcessionaria);
        </script>


    </body>
</html>