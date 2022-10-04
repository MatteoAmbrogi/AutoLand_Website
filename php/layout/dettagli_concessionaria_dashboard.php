<?php

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";



    function showContatti($rigaConcessionaria){

        // preparo l'email
        $mailto = "mailto:". $rigaConcessionaria['email'];

        echo '<div class = "div_contatti">';
            
            // chiama
            echo '<button class = "div_contatti_bottone chiama" onclick="mostraNumero()">';
                echo '<img src = "./../css/img/telefono.svg" alt = "Telefono">';
                echo '<span id = "Mostra_Numero">Mostra Numero</span>';
                echo '<span id = "Numero">'. '+' . $rigaConcessionaria['numeroTelefono'] .'</span>';
            echo '</button>';
            // email
            echo '<button class = "div_contatti_bottone" onclick = "window.location.href=\'' . $mailto .'\';">';
                echo '<img src = "./../css/img/email.svg" alt = "Telefono">';
                echo '<span>Contatta</span>';
            echo '</button>';
            
        echo '</div>';

    }


    function showDescrizione($rigaConcessionaria){

        // descrizione
        echo '<div class = "div_descrizione">';
        
            echo '<div class = "div_titolo">Descrizione:</div><br>';
            echo '<span>' . $rigaConcessionaria['descrizione'] . '</spna>';

        echo '</div>';

        // orari
        echo '<div class = "div_descrizione">';

            echo '<div class = "div_titolo">Orari Settimanali:</div><br>';

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

        // prelevo informazioni dal database
        $risultato = getConcessionariaById($codConcessionaria);

        $numConcessionari = mysqli_num_rows($risultato);
		if($numConcessionari != 1) { 
			echo '<div class="error"><span>Sorry but something went wrong. Please try later!</span></div>';	
			return;
		}

        $rigaConcessionaria = $risultato->fetch_assoc();

        echo '<div class = "dettagli_concessionaria">';

        echo '<div class = "dettagli_conc_div_1">';

        $immagine = $rigaConcessionaria['posterUrlConcessionaria'];
        if($immagine == NULL)
        {
            $immagine = "./../img/concessionaria/concessionaria.png";
        }
        // immagine
        echo '<div class = "div_poster">';
        echo '<img  src = "' . $immagine . '" alt = "poster" >';
        echo '</div>';

        // nome e luogo
        echo '<div class = "div_nome_luogo">';

        echo '<span id = "Nome">' . $rigaConcessionaria['nomeConcessionaria'] . '</span><br>';
        echo '<span>' . $rigaConcessionaria['citta'] . ' (' . $rigaConcessionaria['provincia'] . ') ' . $rigaConcessionaria['cap'] . ' ' .'</span><br>';
        echo '<span>' . $rigaConcessionaria['via'] . ', ' . $rigaConcessionaria['numeroCivico'] .'</span><br>';
        
        echo '</div>';
        
        echo '</div>';

        showContatti($rigaConcessionaria);
        showDescrizione($rigaConcessionaria);

        echo '<div class = "div_titolo">Annunci:</div>';

        echo '<div id="carDashboard">';
        echo '</div>';

        echo '</div>';
    }



?>