<?php
	
    session_start();
	require_once __DIR__ . "/php/config.php";
    include DIR_UTIL . "sessionUtil.php";

    if (isLogged()){
		    header('Location: ./php/nuovo.php');
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
        <link rel="stylesheet" href="./css/login.css" type="text/css" media="screen">
        <link rel="icon" href="./css/img/favicon.ico" type="image/x-icon">
        <script src="./js/Effetti.js"></script>
        <title>Login</title>
    </head>
    <body>
    	<header>
            <div class="title">AutoLand</div>
        </header>



        <main>
            <div class="contenitore" id="contenitore" >
                <div class="title1">Login</div>
                <!-- per scegliere il tipo di accesso -->
                <div class="opzioni">
                    <button id="Utente" class="utente_pressed" onclick="SelezionaUtente()">Utente</button>
                    <button id="Concessionaria" class="unpressed" onclick="SelezionaConcessionario()">Concessionaria</button>
                </div>

                <form action="./php/login.php" method="POST">
                    <div class="informazioni">
                        <div class="input-box">
                            <input type="text" name="username" id="username" placeholder="Username" required autofocus>
                        </div>
                        <div class="input-box">
                            <input type="password" name="password" id="password" placeholder="Password" required>
                        </div>
                    </div>
                    
                    <!-- campo hidden per descrivere il tipo di accesso -->
                    <input id="tipoAccesso" type="hidden" name="tipoAccesso" value="utente">

                    <div class="bottone">
                        <input type="submit" value="Accedi">
                    </div>

                    <!-- link alla pagina di registrazione -->
                    <div class="registrazione">
                        <a href="./php/registrazione/registrazione_utente.php" id="registrazione">Registrati</a>
                    </div>

                    <!-- div in caso di errori -->
                    <?php
                        if (isset($_GET['errorMessage'])){
                            echo '<div class="error">';
                            echo '<span>' . $_GET['errorMessage'] . '</span>';
                            echo '</div>';
                        }
                    ?>

                </form>
            </div>
        </main>
        
        <footer>
			<div class="footerLine"></div>
            <div class="foot">
                <a href="./html/terms.html" target="_blank">Terms of Service</a>
            </div>
            

		</footer>
    

    </body>
</html>