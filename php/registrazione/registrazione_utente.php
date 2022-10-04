<?php
	
    session_start();
	require_once __DIR__ . "./../config.php";
    include DIR_UTIL . "sessionUtil.php";

    // controllo accesso
    if (isLogged()){
		    header('Location: ./../nuovo.php');
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
        <link rel="stylesheet" href="../../css/RegistrazioneUtente.css" type="text/css" media="screen">
        <link rel="icon" href="../../css/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="../../js/ajax/AjaxManager.js"></script>
        <script type="text/javascript" src="../../js/ajax/Registrazione.js"></script>
        <title>Registrazione Utente</title>
    </head>
    <body>
        <div class="contenitore">
            <div class="title">Registrazione Utente</div>
            <form action="invioRegistrazioneUtente.php" method="POST" onsubmit="return Registrazione.trySubmit();">
                <div class="informazioni">
                    <div class="input-box">
                        <span class="dettagli">Username</span>
                        <input id="username" name="username" type="text" placeholder="Inserisci Username" required autofocus onblur="Registrazione.controlloNomeUtente(this.value)">
                    </div>
                     <div class="input-box">
                        <span class="dettagli">Email</span>
                        <input id="email" name="email" type="email" placeholder="Inserisci Email" required onblur="Registrazione.controlloEmail(this.value)">
                    </div>
                    <div class="input-box">
                        <span class="dettagli">Password</span>
                        <input id="password1" name="password" type="password" placeholder="Inserisci Password" required onblur="Registrazione.controlloPassword()">
                    </div>
                    <div class="input-box">
                        <span class="dettagli">Conferma Password</span>
                        <input id="password2" type="password" placeholder="Conferma Password" required onblur="Registrazione.controlloPassword()">
                    </div>
                    <div class="input-box">
                        <span class="dettagli">Nome</span>
                        <input type="text" name="nome" placeholder="Inserisci Nome" pattern="[a-zA-Z]*" required>
                    </div>
                    <div class="input-box">
                        <span class="dettagli">Cognome</span>
                        <input type="text" name="cognome" placeholder="Inserisci Cognome" pattern="[a-zA-Z]*" required>
                    </div>
                    <div class="input-box">
                        <span class="dettagli">Indirizzo</span>
                        <input type="text" name="indirizzo" placeholder="Inserisci Indirizzo" required>
                    </div>
                    <div class="input-box">
                        <span class="dettagli">Telefono</span>
                        <input type="tel" name="telefono" placeholder="Inserisci Telefono" pattern="\d*" required>
                    </div>
                </div>    
                <div class="avvisi" id="avvisi">

                </div>
                <div class="bottone">
                    <input type="submit" value="Registrati">
                </div>
                
            </form>
        </div>
    </body>
</html>
