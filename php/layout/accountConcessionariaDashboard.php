<?php

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";


    function fotoProfilo($rigaConcessionaria){

        $immagine = $rigaConcessionaria['posterUrlConcessionaria'];
        $azione = "Modifica Foto";
        // se l'immagine non fosse impostata
        if($immagine == NULL)
        {
            // immagine di default
            $immagine = "./../img/concessionaria/concessionaria.png";
            $azione = "Aggiungi Foto";
        }

        echo '<div class = "immagineProfilo">';
            // foto
            echo '<div class = "div_poster">';

                echo '<img alt="Foto Profilo"  src="'.$immagine.'">';

            echo '</div>';

            // bottone di aggiunta o modifica
            echo '<button class="modifica foto" onclick="creaPopUp(\'Foto\','.$rigaConcessionaria['codConcessionaria'].')">';

                echo '<span>'.$azione.'</span>';

            echo '</button>';
        echo '</div>';

    }


    function infoDestra($rigaConcessionaria){

        
        echo '<div class = "div_nome_luogo">';

            // nome
            echo '<div class = "destra nome">';
                echo '<span>' . $rigaConcessionaria['nomeConcessionaria'] . '</span>';
                echo '<button class="modifica" onclick="creaPopUp(\'Nome\','.$rigaConcessionaria['codConcessionaria'].',\''.$rigaConcessionaria['nomeConcessionaria'].'\')">';

                    echo '<span>Modifica Nome</span>';

                echo '</button>';
            echo '</div>';

            echo '<br>';

            // indirizzo 1
            echo '<div  class = "destra">';
                echo '<span >' . $rigaConcessionaria['citta'] . ' (' . $rigaConcessionaria['provincia'] . ') ' . $rigaConcessionaria['cap'] . ' ' .'</span>';
                echo '<button class="modifica" onclick="creaPopUp(\'cittaPrCap\','.$rigaConcessionaria['codConcessionaria'].', [\''.$rigaConcessionaria['citta'].'\',\''.$rigaConcessionaria['provincia'].'\',\''.$rigaConcessionaria['cap'].'\'])">';

                    echo '<span>Modifica</span>';

                echo '</button>';
            echo '</div>';

            echo '<br>';
            
            // indirizzo 2
            echo '<div class = "destra">';
                echo '<span>' . $rigaConcessionaria['via'] . ', ' . $rigaConcessionaria['numeroCivico'] .'</span>';
                echo '<button class="modifica" onclick="creaPopUp(\'indirizzo\','.$rigaConcessionaria['codConcessionaria'].', [\''.$rigaConcessionaria['via'].'\',\''.$rigaConcessionaria['numeroCivico'].'\'])">';

                    echo '<span>Modifica</span>';

                echo '</button>';
            echo '</div>';
            
        echo '</div>';

    }

    function info($rigaConcessionaria){

        echo '<div class = "informazioni">';

            // username concessionaria
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Username: </span>';
                echo '<span id = "username">'.$rigaConcessionaria['usernameConcessionaria'].'</span>';
            echo '</div>';

            // email
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Email: </span>';
                echo '<span>'.$rigaConcessionaria['email'].'</span>';
            echo '</div>';
            
            // password
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Password: </span>';
                echo '<button class="modifica" onclick="creaPopUp(\'Password\','.$rigaConcessionaria['codConcessionaria'].')">';

                    echo '<span>Modifica Password</span>';

                echo '</button>';
            echo '</div>';
            

            // telefono
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Telefono: </span>';
                echo '<span>'.$rigaConcessionaria['numeroTelefono'].'</span>';
                echo '<button class="modifica" onclick="creaPopUp(\'Telefono\','.$rigaConcessionaria['codConcessionaria'].')">';

                    echo '<span>Modifica Telefono</span>';

                echo '</button>';
            echo '</div>';
            
            
        echo '</div>';
    }


    function showDescrizione($rigaConcessionaria){

        echo '<div class = "div_descrizione">';
        
            // descrizione
            echo '<div class = "div_titolo">Descrizione:</div><br>';
            echo '<button class="modifica nomargin" onclick="creaPopUp(\'Descrizione\','.$rigaConcessionaria['codConcessionaria'].',\''.$rigaConcessionaria['descrizione'].'\')">';

                echo 'Modifica Descrizione';

            echo '</button>';
            echo '<br>';
            echo '<span>' . $rigaConcessionaria['descrizione'] . '</spna>';

        echo '</div>';

        // orari settimanali
        echo '<div class = "div_descrizione">';

            echo '<div class = "div_titolo">Orari Settimanali:</div><br>';

            echo '<button class="modifica nomargin" onclick="creaPopUp(\'Orari\','.$rigaConcessionaria['codConcessionaria'].', [\''.$rigaConcessionaria['lunedi'].'\',\''.$rigaConcessionaria['martedi'].'\',\''.$rigaConcessionaria['mercoledi'].'\',\''.$rigaConcessionaria['giovedi'].'\',\''.$rigaConcessionaria['venerdi'].'\',\''.$rigaConcessionaria['sabato'].'\',\''.$rigaConcessionaria['domenica'].'\'])">';

                echo 'Modifica Orari';

            echo '</button>';

            echo '<br>';

            echo '<div class = "div_1_orari">';

                echo '<div class = "div_2_orari">';

                    echo '<div class = "div_orari giorno">';
                    echo '<span>Lunedì</span>';
                    echo '</div>';

                    echo '<div class = "div_orari">';
                    echo '<span>'. $rigaConcessionaria['lunedi'] .'</span>';
                    echo '</div>';

                echo '</div>';
                
                echo '<div class = "div_2_orari">';

                    echo '<div class = "div_orari giorno">';
                    echo '<span>Martedì</span>';
                    echo '</div>';

                    echo '<div class = "div_orari">';
                    echo '<span>'. $rigaConcessionaria['martedi'] .'</span>';
                    echo '</div>';

                echo '</div>';
                
                echo '<div class = "div_2_orari">';

                    echo '<div class = "div_orari giorno">';
                    echo '<span>Mercoledì</span>';
                    echo '</div>';

                    echo '<div class = "div_orari">';
                    echo '<span>'. $rigaConcessionaria['mercoledi'] .'</span>';
                    echo '</div>';

                echo '</div>';
                
                echo '<div class = "div_2_orari">';

                    echo '<div class = "div_orari giorno">';
                    echo '<span>Giovedì</span>';
                    echo '</div>';

                    echo '<div class = "div_orari">';
                    echo '<span>'. $rigaConcessionaria['giovedi'] .'</span>';
                    echo '</div>';

                echo '</div>';
                
                echo '<div class = "div_2_orari">';

                    echo '<div class = "div_orari giorno">';
                    echo '<span>Venerdì</span>';
                    echo '</div>';

                    echo '<div class = "div_orari">';
                    echo '<span>'. $rigaConcessionaria['venerdi'] .'</span>';
                    echo '</div>';

                echo '</div>';
                
                echo '<div class = "div_2_orari">';

                    echo '<div class = "div_orari giorno">';
                    echo '<span>Sabato</span>';
                    echo '</div>';

                    echo '<div class = "div_orari">';
                    echo '<span>'. $rigaConcessionaria['sabato'] .'</span>';
                    echo '</div>';

                echo '</div>';
                
                echo '<div class = "div_2_orari">';

                    echo '<div class = "div_orari giorno">';
                    echo '<span>Domenica</span>';
                    echo '</div>';

                    echo '<div class = "div_orari">';
                    echo '<span>'. $rigaConcessionaria['domenica'] .'</span>';
                    echo '</div>';

                echo '</div>';
                


            echo '</div>';

        echo '</div>';
    }



    function showDettagliConcessionaria($codConcessionaria){

        // prelevo le informazioni della concessionaria dal database
        $risultato = getConcessionariaById($codConcessionaria);

        $numConcessionari = mysqli_num_rows($risultato);
		if($numConcessionari != 1) { 
			echo '<div class="error"><span>Sorry but something went wrong. Please try later!</span></div>';	
			return;
		}

        $rigaConcessionaria = $risultato->fetch_assoc();


        echo '<div class = "dettagli_concessionaria">';

        echo '<div class = "dettagli_conc_div_1">';

        // foto profilo
        fotoProfilo($rigaConcessionaria);
        // informazioni di destra
        infoDestra($rigaConcessionaria);
        
        echo '</div>';

        // informazioni generali
        info($rigaConcessionaria);
        // descrizione e orari
        showDescrizione($rigaConcessionaria);

        echo '<div class = "div_titolo">Annunci:</div>';

        // bottone di aggiunta auto
        echo '<div>';
            echo '<button class = "Bottone_aggiungi" onclick = "location.href=\'./aggiungiAuto.php\';">Aggiungi Auto</button>';
        echo '</div>';

        // div riempita da ajax con gli annunci della concessionaria
        echo '<div id="carDashboard">';
        echo '</div>';

        echo '</div>';
    }

?>