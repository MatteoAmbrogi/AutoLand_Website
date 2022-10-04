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
        <link rel="stylesheet" href="../../css/RegistrazioneConcessionaria.css" type="text/css" media="screen">
        <link rel="icon" href="../../css/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="../../js/ajax/AjaxManager.js"></script>
        <script type="text/javascript" src="../../js/ajax/RegistrazioneConc.js"></script>
        <title>Registrazione Concessionaria</title>
    </head>
    <body>
        <div class="contenitore">
            <div class="title">Registrazione Concessionaria</div>
            <form action="invioRegistrazioneConcessionaria.php" method="POST" enctype="multipart/form-data" onsubmit="return RegistrazioneConc.trySubmit();">
                <div class="interno_contenitore">
                    <div class="informazioni">
                        <div class="input-box">
                            <span class="dettagli">Username</span>
                            <input id="username" name="username" type="text" placeholder="Inserisci Username" required autofocus onblur="RegistrazioneConc.controlloNomeUtente(this.value)">
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Nome</span>
                            <input id="name" name="name" type="text" placeholder="Inserisci Nome" required>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Telefono</span>
                            <input id="telefono" name="telefono" type="tel" placeholder="Inserisci Telefono" required pattern="\d*">
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Email</span>
                            <input id="email" name="email" type="email" placeholder="Inserisci Email" required onblur="RegistrazioneConc.controlloEmail(this.value)">
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Password</span>
                            <input id="password1" name="password" type="password" placeholder="Inserisci Password" required onblur="RegistrazioneConc.controlloPassword()">
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Conferma Password</span>
                            <input id="password2" type="password" placeholder="Conferma Password" required onblur="RegistrazioneConc.controlloPassword()">
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Foto Concessionaria</span>
                            <input type="file" id="foto" name="foto" onblur="RegistrazioneConc.controlloFoto(this.value)">
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Provincia</span>
                            <input type="text" id="Provincia" name="Provincia" placeholder="Inserisci Provincia" pattern="[a-zA-Z]*" required >
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Città</span>
                            <input type="text" id="Citta" name="Citta" placeholder="Inserisci Città" required pattern="[a-zA-Z]*" >
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Cap</span>
                            <input type="text" id="Cap" name="Cap" placeholder="Inserisci Cap" required pattern="\d*" >
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Via</span>
                            <input type="text" id="Via" name="Via" placeholder="Inserisci Via" required >
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Numero Civico</span>
                            <input type="text" id="Civico" name="Civico" placeholder="Inserisci N.Civico" required>
                        </div>
                    </div>
                    
                    <div class="Descrizione">
                        <span class="dettagli">Descrizione</span>
                        <textarea name="Descrizione" id="Descrizione" rows="7" placeholder="Inserisci Descrizione Concessionaria" required></textarea>
                    </div> 

                    <div class="Sottotitolo">Orari Settimanali:</div>
                    
                    <div class="informazioni">
                        <div class="input-box">
                            <span class="dettagli">Lunedì</span>
                            <input type="text" id="Lunedi" name="Lunedi" placeholder="Inserisci Orario" required>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Martedì</span>
                            <input type="text" id="Martedi" name="Martedi" placeholder="Inserisci Orario" required>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Mercoledì</span>
                            <input type="text" id="Mercoledi" name="Mercoledi" placeholder="Inserisci Orario" required>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Giovedì</span>
                            <input type="text" id="Giovedi" name="Giovedi" placeholder="Inserisci Orario" required>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Venerdì</span>
                            <input type="text" id="Venerdi" name="Venerdi" placeholder="Inserisci Orario" required>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Sabato</span>
                            <input type="text" id="Sabato" name="Sabato" placeholder="Inserisci Orario" required>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Domenica</span>
                            <input type="text" id="Domenica" name="Domenica" placeholder="Inserisci Orario" required>
                        </div>
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
