<?php
	require_once __DIR__ . "/config.php";
	session_start();
    include DIR_UTIL . "sessionUtil.php";
    require_once DIR_UTIL . "CarQuery.php";

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
        <link rel="stylesheet" href="./../css/main-content.css" type="text/css" media="screen">
        <link rel="icon" href="./../css/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="./../js/ajax/AjaxManager.js"></script>	
		<script type="text/javascript" src="./../js/ajax/Ricerca.js"></script>
		<script type="text/javascript" src="./../js/ajax/CarDashboard.js"></script>
		<script type="text/javascript" src="./../js/ajax/preferitiHandler.js"></script>
        <title>AutoLand - Ricerca</title>
    </head>
    <body onload="Ricerca.load()">

        <?php
            include DIR_LAYOUT . "navaside.php";
        ?>

        <main class="main-content">
            <!-- checkbox prima riga -->
            <div class="Ricerca_riga0">
                <div class="Ricerca_elem">
                    <input type="checkbox" name="RicercaNuovo" id="RicercaNuovo" value="Nuovo" onclick="Ricerca.load()">
                    <label for="RicercaNuovo">Nuovo</label>
                </div>
                <div class="Ricerca_elem">
                    <input type="checkbox" name="RicercaUsato" id="RicercaUsato" value="Usato" onclick="Ricerca.load()">
                    <label for="RicercaUsato">Usato</label>
                </div>
                <div class="Ricerca_elem">
                    <input type="checkbox" name="RicercaCommerciale" id="RicercaCommerciale" value="Commerciale" onclick="Ricerca.load()">
                    <label for="RicercaCommerciale">Veicoli Commerciali</label>
                </div>
                <div class="Ricerca_elem">
                    <input type="checkbox" name="RicercaElettrico" id="RicercaElettrico" value="Elettrico" onclick="Ricerca.load()">
                    <label for="RicercaElettrico">Elettrico</label>
                </div>
            </div>
            <!-- secoda riga -->
            <div class="Ricerca_riga1">
                <!-- select con case produttrici -->
                <div class="Ricerca_elem">
                    <span>Marca</span>
                        <?php

                            $risultato = getProduttore();

                            echo '<select id = "RicercaProduttore" name = "RicercaProduttore" onclick="Ricerca.load()">';
                            echo '<option value="" selected>Produttore</option>';
                            while($riga = $risultato->fetch_assoc()){
                                echo '<option value = "'.$riga['casaProduttrice'].'">'.$riga['casaProduttrice'].'</option>';
                            }

                            echo '</select>';

                        ?>
                </div>
                <div class="Ricerca_elem">
                    <span>Nome</span>
                    <input type="text" name="RicercaNome" id="RicercaNome" placeholder="Nome Modello" onkeyup="Ricerca.load()">
                </div>
                <div class="Ricerca_elem">
                    <input type="checkbox" name="RicercaBenzina" id="RicercaBenzina" value="Benzina" onclick="Ricerca.load()">
                    <label for="RicercaBenzina">Benzina</label>
                </div>
                <div class="Ricerca_elem">
                    <input type="checkbox" name="RicercaDiesel" id="RicercaDiesel" value="Diesel" onclick="Ricerca.load()">
                    <label for="RicercaDiesel">Diesel</label>
                </div>

            </div>

            <div id="carDashboard">

            </div>

        </main>

        <?php
            include DIR_LAYOUT . "footer.php";
        ?>
        
        <script type="text/javascript">
            // evidenzio il nome nel menu
            document.getElementById("Ricerca").getElementsByTagName("span")[0].className = "highlighted_text";
        </script>

    
    </body>
</html>