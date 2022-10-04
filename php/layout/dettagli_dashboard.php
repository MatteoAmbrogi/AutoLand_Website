<?php

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";

    function showSpecificheTecniche($rigaModello){
        
        // titolo
        echo '<div class ="div_titolo"> <span> Specifiche Tecniche: </span> </div>';
        

        echo '<div class ="div_specifiche_1">';
        
        echo '<div class = "div_specifiche_2">';
        
        // colonna 1
        echo '<div class = "div_specifiche_colonna">';

            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Cavalli</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['cavalli'] . ' CV' . '</span>';
                echo '</div>';

            echo '</div>';

            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Carburante</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['tipoCarburante'] . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Capacità Serbatoio</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['capacitaSerbatoio'] . ' l' . '</span>';
                echo '</div>';

            echo '</div>';

            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Cilindrata</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['cilindrata'] . ' cm' . '<sup>3</sup>' . '</span>';
                echo '</div>';

            echo '</div>';

            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Numero Cilindri</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['numeroCilindri'] . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Cambio</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['cambio'] . ' ' .  $rigaModello['marce'] . ' rapporti' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Posti</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['numPosti'] . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Porte</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['numPorte'] . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Velocità Massima</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['velocitaMassima'] . ' km/h' . '</span>';
                echo '</div>';

            echo '</div>';
            
        echo '</div>';

        // colonna 2
        echo '<div class = "div_specifiche_colonna">';

            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Lunghezza</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['lunghezza'] . ' mm' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Larghezza</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['larghezza'] . ' mm' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Altezza</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['altezza'] . ' mm' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Peso</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['peso'] . ' kg' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Dimensione Bagagliaio</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['dimensioneBagagliaio'] . ' l' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Consumo Urbano</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['consumoUrbano'] . ' l/100 km' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Consumo Extraurbano</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['consumoExtraurbano'] . ' l/100 km' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Consumo Misto</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['consumoMisto'] . ' l/100 km' . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Classe Emissione</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaModello['classeEmissione'] . '</span>';
                echo '</div>';

            echo '</div>';

        echo '</div>';


        echo '</div>';
        echo '</div>';

    }


    function showInfoUsato($rigaAuto){
        
        // modifico i km mettendo il punto separatore
        $oldKm = $rigaAuto['totKm'];
        if(strlen($oldKm) > 3){
            $newKm = substr_replace($oldKm,'.',strlen($oldKm)-3,0);
        }else{
            $newKm = $oldKm;
        }
        
        
        // titolo
        echo '<div class ="div_titolo"> <span> Informazioni Usato: </span> </div>';

        echo '<div class ="div_specifiche_1">';
        
        echo '<div class = "div_specifiche_2">';

        // colonna 1
        echo '<div class = "div_specifiche_colonna">';

            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Targa</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaAuto['targa'] . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Anno</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaAuto['anno'] . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Chilometraggio</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $newKm . ' km' . '</span>';
                echo '</div>';

            echo '</div>';
            
        echo '</div>';

        // colonna 2
        echo '<div class = "div_specifiche_colonna">';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Paese di origine</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaAuto['paeseOrigine'] . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Ultima manutenzione</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaAuto['ultimaManutenzione'] . '</span>';
                echo '</div>';

            echo '</div>';
            
            echo '<div class = "div_specifiche_riga_elemento">';

                echo '<div class = "div_specifiche_nome">';
                echo '<span>Proprietari precedenti</span>';
                echo '</div>';

                echo '<div class = "div_specifiche_contenuto">';
                echo '<span>' . $rigaAuto['numProprietariPrecedenti'] . '</span>';
                echo '</div>';

            echo '</div>';
        
        echo '</div>';

        echo '</div>';
        echo '</div>';

    }


    function showContatti($rigaConcessionaria, $casaProduttrice, $nome, $prezzo){

        // preparo l'email
        $mailto = "mailto:". $rigaConcessionaria['email'] . "?subject=" . "Annuncio%20" . $casaProduttrice . "%20" . $nome . "%20" . $prezzo . "%20€" . "&body=Vorrei essere ricontattato per avere maggiori informazioni su questo annuncio." ;
        
        // riga contatti
        echo '<div class = "div_contatti">';
            
            // informazioni di sinistra
            echo '<div class = "div_contatti_left">';
                echo '<span> In vendita da: </span><br>';
                // link alla pagina del concessionario
                echo '<a href = "./dettagliConcessionaria.php?codConcessionaria=' . $rigaConcessionaria['codConcessionaria'] . '">';
                    echo '<span class = "div_contatti_left nome">'. $rigaConcessionaria['nomeConcessionaria'] .'</span>';
                    echo '<span>'. ' ' . $rigaConcessionaria['citta'] . ' (' . $rigaConcessionaria['provincia'] . ')' .'</span>';
                echo '</a>';
            echo '</div>';

            // informazion di destra
            echo '<div class = "div_contatti_right">';

                // bottone del numero di telefono
                echo '<button class = "div_contatti_right_bottone chiama" onclick="mostraNumero()">';
                    echo '<img src = "./../css/img/telefono.svg" alt = "Telefono">';
                    echo '<span id = "Mostra_Numero">Mostra Numero</span>';
                    echo '<span id = "Numero">'. '+' . $rigaConcessionaria['numeroTelefono'] .'</span>';
                echo '</button>';

                // bottone per l'invio dell'email
                echo '<button class = "div_contatti_right_bottone" onclick = "window.location.href=\'' . $mailto .'\';">';
                    echo '<img src = "./../css/img/email.svg" alt = "Telefono">';
                    echo '<span>Contatta</span>';
                echo '</button>';

            echo '</div>';


        echo '</div>';

    }
    
    
    function showDettagliAuto($codAuto){

        // prelevo informazioni dal database
        $risultato = getCarById($codAuto);

        $numAuto = mysqli_num_rows($risultato);
		if($numAuto != 1) { 
			echo '<div class="error"><span>Sorry but something went wrong. Please try later!</span></div>';	
			return;
		}
        

        $rigaAuto = $risultato->fetch_assoc();

        // modello
        $risultatoModello = getModelloById( $rigaAuto['codModello'] );
        $rigaModello = null;
        if(mysqli_num_rows($risultatoModello) == 1)
            $rigaModello = $risultatoModello->fetch_assoc();
        
        // produttore
        $risultatoProduttore = getProduttoreById( $rigaModello['casaProduttrice'] );
        $rigaProduttore = null;
        if(mysqli_num_rows($risultatoProduttore) == 1)
            $rigaProduttore = $risultatoProduttore->fetch_assoc();
        
        // concessionaria
        $risultatoConcessionaria = getConcessionariaById( $rigaAuto['codConcessionaria'] );
        $rigaConcessionaria = null;
        if(mysqli_num_rows($risultatoConcessionaria) == 1)
            $rigaConcessionaria = $risultatoConcessionaria->fetch_assoc();
        
        // modifico il prezzo mettendo il punto separatore
        $oldPrezzo = $rigaAuto['prezzo'];
        $newPrezzo = substr_replace($oldPrezzo,'.',strlen($oldPrezzo)-3,0);


        // inizio pagina
        echo '<div class = "dettagli_auto">';

        echo '<div class = "dettagli_auto_div_1">';

        // poster
        echo '<div class = "div_poster">';
        echo '<img src = "' . $rigaModello['posterUrl'] . '" alt = "poster" >';
        echo '</div>';
        
        // logo modello e prezzo
        echo '<div class = "div_logo_modello_prezzo">';

        echo '<img class = "img_logo" src = "' . $rigaProduttore['posterUrlLogo'] . '" alt = "posterLogo" ><br>';
        echo '<span>' . $rigaModello['casaProduttrice'] . ' ' . $rigaModello['nomeModello'] . '</span><br>';
        echo '<span id = "prezzo">' . $newPrezzo . ' €' . '</span><br>';

        // informazioni dell'auto
        if($rigaAuto['isNew'] == 0){
            echo '<span id = "nuovo_usato"> Usato </span>';
        } else {
            echo '<span id = "nuovo_usato"> Nuovo </span>';
        }

        if($rigaAuto['veicoloCommerciale'] == 1){
            echo '<span id = "nuovo_usato">' . ', Veicolo Commerciale' . '</span>';
        }

        if($rigaAuto['elettrico'] == 1){
            echo '<span id = "nuovo_usato">' . ', Elettrico' . '</span>';
        }

        echo '</div>';

        echo '</div>';

        // riga dei contatti
        showContatti($rigaConcessionaria, $rigaModello['casaProduttrice'], $rigaModello['nomeModello'], $rigaAuto['prezzo']);

        // informazioni dell'usato
        if($rigaAuto['isNew'] == 0)
            showInfoUsato($rigaAuto);

        // specifiche tecniche
        showSpecificheTecniche($rigaModello);


        echo '</div>';

    }





?>