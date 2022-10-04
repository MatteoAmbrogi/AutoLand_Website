<?php

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";


    function fotoProfilo($rigaAccount){

        $immagine = $rigaAccount['immagineUtente'];
        $azione = "Modifica Foto";
        // caso in cui non sia presente l'immagine nel database
        if($immagine == NULL)
        {
            $immagine = "./../img/utenti/user.png";
            $azione = "Aggiungi Foto";
        }

        echo '<div class = "immagineProfilo">';
            echo '<div class = "div_poster">';

                // foto
                echo '<img alt="Foto Profilo"  src="'.$immagine.'">';

            echo '</div>';

            // bottone
            echo '<button class="modifica foto" onclick="creaPopUp(\'FotoProfilo\','.$rigaAccount['userId'].')">';

                // testo del bottone
                echo '<span>'.$azione.'</span>';

            echo '</button>';
        echo '</div>';

    }

    function infoDestra($rigaAccount){

        echo '<div class="infoDestra titoli">';
            // username
            echo '<span id="username">'.$rigaAccount['username'].'</span><br>';
            // email
            echo '<span >Email: '.$rigaAccount['email'].'</span><br>';
            
            echo '<div>';
                // nome e cogome utente
                echo '<span >'.$rigaAccount['nome']. ' '. $rigaAccount['cognome'] .'</span>';
                // bottone di modifica
                echo '<button class="modifica" onclick="creaPopUp(\'NomeCognome\','.$rigaAccount['userId'].')">';

                    echo '<span>Modifica</span>';

                echo '</button>';
            echo '</div>';

        echo '</div>';

    }

    function info($rigaAccount){

        // controllo se il sesso o la data di nascita non sono presenti
        if($rigaAccount['sesso']==NULL){
            $azioneS = "Aggiungi";
        }else{
            $azioneS = "Modifica";
        }

        if($rigaAccount['dataNascita']==NULL){
            $azioneD = "Aggiungi";
        }else{
            $azioneD = "Modifica";
        }
        


        echo '<div>';
            // password
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Password: </span>';
                echo '<button class="modifica" onclick="creaPopUp(\'Password\','.$rigaAccount['userId'].')">';

                    echo '<span>Modifica Password</span>';

                echo '</button>';
            echo '</div>';

            // indirizzo
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Indirizzo: </span>';
                echo '<span>'.$rigaAccount['indirizzo'].'</span>';
                echo '<button class="modifica" onclick="creaPopUp(\'Indirizzo\','.$rigaAccount['userId'].')">';

                    echo '<span>Modifica Indirizzo</span>';

                echo '</button>';
            echo '</div>';

            // telefono
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Telefono: </span>';
                echo '<span>'.$rigaAccount['telefono'].'</span>';
                echo '<button class="modifica" onclick="creaPopUp(\'Telefono\','.$rigaAccount['userId'].')">';

                    echo '<span>Modifica Telefono</span>';

                echo '</button>';
            echo '</div>';

            // data di nascita
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Data di nascita: </span>';
                echo '<span>'.$rigaAccount['dataNascita'].'</span>';
                echo '<button class="modifica" onclick="creaPopUp(\'DataNascita\','.$rigaAccount['userId'].')">';

                    echo '<span>'.$azioneD.'</span>';

                echo '</button>';
            echo '</div>';

            // sesso
            echo '<div class = "testo info">';
                echo '<span class = "titolo">Sesso: </span>';
                echo '<span>'.$rigaAccount['sesso'].'</span>';
                echo '<button class="modifica" onclick="creaPopUp(\'Sesso\','.$rigaAccount['userId'].')">';

                    echo '<span>'.$azioneS.'</span>';

                echo '</button>';
            echo '</div>';
        echo '</div>';

    }



    function showDettagliAccount($userId){

        // prelevo le informazioni dal database
        $risultato = getAccountById($userId);

        $numAccount = mysqli_num_rows($risultato);
		if($numAccount != 1) { 
			echo '<div class="error"><span>Sorry but something went wrong. Please try later!</span></div>';	
			return;
		}

        $rigaAccount = $risultato->fetch_assoc();

        echo '<div class = "dettagliUtente">';
        echo '<div class = "dettagliUtente_div1">';

        // foto
        fotoProfilo($rigaAccount);
        // informazioni di destra
        infoDestra($rigaAccount);

        echo '</div>';

        // tutte le rimanenti informazioni
        info($rigaAccount);

        echo '<div class = "div_titolo">Auto Preferite:</div>';

        // div che verra riempita da ajax con le auto preferite
        echo '<div id="carDashboard">';
        echo '</div>';
        
        echo '</div>';
    }
?>