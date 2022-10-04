<?php
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "CarQuery.php";

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
        <link rel="stylesheet" href="./../css/aggiungiAuto.css" type="text/css" media="screen">
        <link rel="icon" href="./../css/img/favicon.ico" type="image/x-icon">
        <script type="text/javascript" src="./../js/ajax/AjaxManager.js"></script>	
		<script type="text/javascript" src="./../js/ajax/InserimentoAuto.js"></script>
        <title>AutoLand - Aggiungi Auto</title>
    </head>
    <body>    
        <div class="contenitore">
            <div class="titolo">Aggiunta Auto</div>
            <form>
                <div class="informazioni">
                    <div class="div1">
                        <!-- marca -->
                        <div class="marca">
                            <span class="dettagli1">Marca</span>
                            <?php

                                $risultato = getProduttore();

                                echo '<select id = "produttore" name = "produttore">';
                                while($riga = $risultato->fetch_assoc()){
                                    echo '<option value = "'.$riga['casaProduttrice'].'">'.$riga['casaProduttrice'].'</option>';
                                }

                                echo '</select>';

                            ?>
                        </div>
                        <div>
                            <!-- nuovo o usato -->
                            <input type="radio" name="nuovoUsato" id="nuovo" value="nuovo" required onclick="InserimentoAuto.mostraNuovo()">
                            <label for="nuovo" class="dettagli1">Nuovo</label>
                            <input type="radio" name="nuovoUsato" id="usato" value="usato" required onclick="InserimentoAuto.mostraUsato()">
                            <label for="usato" class="dettagli1">Usato</label>
                        </div>
                        <div>
                            <!-- dettagli -->
                            <input type="checkbox" name="commerciale" id="commerciale" value="commerciale">
                            <label class="dettagli1" for="commerciale">Veicolo Commerciale</label>
                            <input type="checkbox" name="elettrico" id="elettrico" value="elettrico">
                            <label class="dettagli1" for="elettrico">Elettrico</label>
                        </div>

                        
                    </div>
                    
                    <div id="avvisi1" class="avvisi">

                    </div>
                    
                    <!-- prezzo -->
                    <div class="prezzo">
                        <span class="dettagli1">Prezzo</span>
                        <input type="text" name="prezzo" id="prezzo" placeholder="€" pattern="\d{4,}" required onblur="InserimentoAuto.controlloPrezzo()">
                    </div>

                    <div id="avvisi2" class="avvisi">

                    </div>

                    <!-- tutte le informazioni dell'auto -->
                    <div class="div2">
                        <div class="input-box">
                            <span class="dettagli">Nome Modello</span>
                            <input type="text" name="NomeModello" id="NomeModello" placeholder="Nome" required onblur="InserimentoAuto.controlloNome()">
                            <div id="avvisiNome" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Foto</span>
                            <input type="file" name="FotoAuto" id="FotoAuto" required onchange="InserimentoAuto.controlloFoto()">
                            <div id="avvisiFoto" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Cilindrata</span>
                            <input type="text" name="Cilindrata" id="Cilindrata" placeholder="cm³" pattern="\d*" required onblur="InserimentoAuto.controlloCilindrata()">
                            <div id="avvisiCilindrata" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Cavalli</span>
                            <input type="text" name="Cavalli" id="Cavalli" placeholder="CV" pattern="\d*" required onblur="InserimentoAuto.controlloCavalli()">
                            <div id="avvisiCavalli" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Cilindri</span>
                            <input type="text" name="Cilindri" id="Cilindri" placeholder="Cilindri" pattern="\d*" required onblur="InserimentoAuto.controlloCilindri()">
                            <div id="avvisiCilindri" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Cambio</span>
                            <select name="Cambio" id="Cambio">
                                <option value="Manuale" selected>Manuale</option>
                                <option value="Automatico">Automatico</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Marce</span>
                            <input type="text" name="Marce" id="Marce" placeholder="Marce" pattern="\d*" required onblur="InserimentoAuto.controlloMarce()">
                            <div id="avvisiMarce" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Posti</span>
                            <input type="text" name="Posti" id="Posti" placeholder="Posti" pattern="\d*" required onblur="InserimentoAuto.controlloPosti()">
                            <div id="avvisiPosti" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Porte</span>
                            <input type="text" name="Porte" id="Porte" placeholder="Porte" pattern="\d*" required onblur="InserimentoAuto.controlloPorte()">
                            <div id="avvisiPorte" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Bagagliaio</span>
                            <input type="text" name="Bagagliaio" id="Bagagliaio" placeholder="litri" pattern="\d*" required onblur="InserimentoAuto.controlloBagagliaio()">
                            <div id="avvisiBagagliaio" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Peso</span>
                            <input type="text" name="Peso" id="Peso" placeholder="kg" pattern="\d*" required onblur="InserimentoAuto.controlloPeso()">
                            <div id="avvisiPeso" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Lunghezza</span>
                            <input type="text" name="Lunghezza" id="Lunghezza" placeholder="mm" pattern="\d*" required onblur="InserimentoAuto.controlloLunghezza()">
                            <div id="avvisiLunghezza" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Larghezza</span>
                            <input type="text" name="Larghezza" id="Larghezza" placeholder="mm" pattern="\d*" required onblur="InserimentoAuto.controlloLarghezza()">
                            <div id="avvisiLarghezza" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Altezza</span>
                            <input type="text" name="Altezza" id="Altezza" placeholder="mm" pattern="\d*" required onblur="InserimentoAuto.controlloAltezza()">
                            <div id="avvisiAltezza" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Tipo Carburante</span>
                            <select name="TipoCarburante" id="TipoCarburante" >
                                <option value="Benzina" selected>Benzina</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Benzina/Elettrico">Benzina/Elettrico</option>
                                <option value="Diesel/Elettrico">Diesel/Elettrico</option>
                            </select>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Capacità Serbatoio</span>
                            <input type="text" name="Serbatoio" id="Serbatoio" placeholder="litri" pattern="\d*" required onblur="InserimentoAuto.controlloSerbatoio()">
                            <div id="avvisiSerbatoio" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Velocità Massima</span>
                            <input type="text" name="Velocita" id="Velocita" placeholder="km/h" pattern="\d*" required onblur="InserimentoAuto.controlloVelocita()">
                            <div id="avvisiVelocita" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Consumo Urbano</span>
                            <input type="text" name="ConsumoUrbano" id="ConsumoUrbano" placeholder="l/100 km" pattern="\d*\.?\d?" required onblur="InserimentoAuto.controlloConsumoUrbano()">
                            <div id="avvisiConsumoUrbano" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Consumo Extraurbano</span>
                            <input type="text" name="ConsumoExtraurbano" id="ConsumoExtraurbano" placeholder="l/100 km" pattern="\d*\.?\d?" required onblur="InserimentoAuto.controlloConsumoExtraurbano()">
                            <div id="avvisiConsumoExtraurbano" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Consumo Misto</span>
                            <input type="text" name="ConsumoMisto" id="ConsumoMisto" placeholder="l/100 km" pattern="\d*\.?\d?" required onblur="InserimentoAuto.controlloConsumoMisto()">
                            <div id="avvisiConsumoMisto" class="avvisi"></div>
                        </div>
                        <div class="input-box">
                            <span class="dettagli">Classe Emissione</span>
                            <input type="text" name="Emissione" id="Emissione" placeholder="Classe Emissione" required onblur="InserimentoAuto.controlloEmissione()">
                            <div id="avvisiEmissione" class="avvisi"></div>
                        </div>
                        <input type="hidden" id="CodConcessionaria" name="CodConcessionaria" value=<?php echo $_SESSION['userIdCars'] ?>>
                        
                    </div>

                    <!-- div in cui vengono messi i campi se seleziono l'auto usata -->
                    <div id="infoUsato" class="infoUsato">
                    </div>
                </div>

                <div class="avvisi" id="avvisi">

                </div>

                <div class="bottone">
                    <button class="bottoneInput" onclick="InserimentoAuto.goBack()">Annulla</button>
                    <button  class="bottoneInput" onclick="InserimentoAuto.trySubmit()">Aggiungi</button>
                </div>

            </form>
        </div>
        

    </body>
</html>