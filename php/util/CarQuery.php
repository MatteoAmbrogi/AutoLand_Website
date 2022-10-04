<?php

    require_once __DIR__ . "/../config.php";
    // utilizzo della classe CarsDbManager per le query
    require_once DIR_UTIL . "DbManager.php";

    // funzione per la pagina nuovo e usato
    function getCars($searchType, $offset, $num){
        global $CarsDb;

        $searchType = $CarsDb->sqlInjectionFilter($searchType);
        // per il numero di pagina da visualizzare
        $offset = $CarsDb->sqlInjectionFilter($offset);
        $num = $CarsDb->sqlInjectionFilter($num);

        $queryText = "select * 
        from auto,modello,produttore,concessionaria 
        where auto.codModello = modello.codModello 
        and modello.casaProduttrice = produttore.casaProduttrice 
        and concessionaria.codConcessionaria = auto.codConcessionaria
        and auto.isNew = '". $searchType ."'
        order by auto.codAuto
        limit ". $offset ." , " . $num ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


    // per la pagina veicoli commerciali
    function getVeicoliCommerciali($offset, $num){

        global $CarsDb;

        $offset = $CarsDb->sqlInjectionFilter($offset);
        $num = $CarsDb->sqlInjectionFilter($num);

        $queryText = "select * 
        from auto,modello,produttore,concessionaria 
        where auto.codModello = modello.codModello 
        and modello.casaProduttrice = produttore.casaProduttrice 
        and concessionaria.codConcessionaria = auto.codConcessionaria
        and auto.veicoloCommerciale = 1 
        order by auto.codAuto
        limit ". $offset ." , " . $num ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    // per la pagina elettrico
    function getElettrico($offset, $num){

        global $CarsDb;

        $offset = $CarsDb->sqlInjectionFilter($offset);
        $num = $CarsDb->sqlInjectionFilter($num);

        $queryText = "select * 
        from auto,modello,produttore,concessionaria 
        where auto.codModello = modello.codModello 
        and modello.casaProduttrice = produttore.casaProduttrice 
        and concessionaria.codConcessionaria = auto.codConcessionaria
        and auto.elettrico = 1 
        order by auto.codAuto
        limit ". $offset ." , " . $num ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    // funzioni per la pagina con i dettagli auto ***************************************************
    function getCarById($codAuto){
        global $CarsDb;

        $codAuto = $CarsDb->sqlInjectionFilter($codAuto);

        $queryText = "select * 
        from auto
        where auto.codAuto = " . $codAuto ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


    function getModelloById($codModello){
        global $CarsDb;

        $codModello = $CarsDb->sqlInjectionFilter($codModello);

        $queryText = "select * 
        from modello
        where modello.codModello = " . $codModello ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function getProduttoreById($casaProduttrice){
        global $CarsDb;

        $casaProduttrice = $CarsDb->sqlInjectionFilter($casaProduttrice);

        $queryText = 'select * 
        from produttore
        where produttore.casaProduttrice =  \'' . $casaProduttrice . '\'' ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function getConcessionariaById($codConcessionaria){
        global $CarsDb;

        $codConcessionaria = $CarsDb->sqlInjectionFilter($codConcessionaria);

        $queryText = "select * 
        from concessionaria
        where codConcessionaria = " . $codConcessionaria ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    // funzione per le auto della concessionaria
    function getAutoConcessionaria($codConcessionaria){
        global $CarsDb;

        $codConcessionaria = $CarsDb->sqlInjectionFilter($codConcessionaria);

        $queryText = "select * 
        from auto,modello,produttore,concessionaria 
        where auto.codModello = modello.codModello 
        and modello.casaProduttrice = produttore.casaProduttrice 
        and concessionaria.codConcessionaria = auto.codConcessionaria
        and concessionaria.codConcessionaria = '". $codConcessionaria ."'
        order by auto.codAuto";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


    // funzione per le auto preferite
    function getPreferiti($userId){
        global $CarsDb;

        $userId = $CarsDb->sqlInjectionFilter($userId);

        $queryText = "select * 
        from auto,modello,produttore,concessionaria,preferiti 
        where auto.codModello = modello.codModello 
        and modello.casaProduttrice = produttore.casaProduttrice 
        and concessionaria.codConcessionaria = auto.codConcessionaria
        and preferiti.autoId = auto.codAuto
        and preferiti.userId = '". $userId ."'
        order by auto.codAuto";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    // funione per la ricerca auto **********************************************************
    function getSearch($QueryDiRicerca){
        global $CarsDb;

        

        $queryText = $QueryDiRicerca;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    // funzioni per la registrazione utente *****************************************************
    function checkUsername($nomeUtente){
        global $CarsDb;

        $nomeUtente = $CarsDb->sqlInjectionFilter($nomeUtente);

        $queryText = "select * 
        from utenti 
        where username = '" . $nomeUtente . "'";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }
    
    function checkEmail($email){
        global $CarsDb;

        $email = $CarsDb->sqlInjectionFilter($email);

        $queryText = "select * 
        from utenti 
        where email = '" . $email . "'";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function inserisciNuovoUtente($username,$password,$email,$nome,$cognome,$indirizzo,$telefono){
        global $CarsDb;

        echo '<script>console.log("prova")</script>';

        $username = $CarsDb->sqlInjectionFilter($username);
        $password = $CarsDb->sqlInjectionFilter($password);
        $email = $CarsDb->sqlInjectionFilter($email);
        $nome = $CarsDb->sqlInjectionFilter($nome);
        $cognome = $CarsDb->sqlInjectionFilter($cognome);
        $indirizzo = $CarsDb->sqlInjectionFilter($indirizzo);
        $telefono = $CarsDb->sqlInjectionFilter($telefono);

        $queryText = "INSERT INTO utenti (username,password,email,nome,cognome,indirizzo,telefono)
                    VALUES ('". $username ."','". $password ."','". $email ."','". $nome ."','". $cognome ."','". $indirizzo ."','". $telefono ."')";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


    // funzioni per la registrazione Concessionaria *****************************************************
    function checkUsernameConcessionaria($username){
        global $CarsDb;

        $username = $CarsDb->sqlInjectionFilter($username);

        $queryText = "select * 
        from concessionaria 
        where usernameConcessionaria = '" . $username . "'";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function checkEmailConcessionaria($email){
        global $CarsDb;

        $email = $CarsDb->sqlInjectionFilter($email);

        $queryText = "select * 
        from concessionaria 
        where email = '" . $email . "'";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    // iserimento con foto
    function inserisciNuovaConcessionariaFoto($username,$name,$telefono,$email,$password,$provincia,$citta,$cap,$via,
    $civico,$descrizione,$lunedi,$martedi,$mercoledi,$giovedi,$venerdi,$sabato,$domenica,$foto){
        global $CarsDb;

        $username = $CarsDb->sqlInjectionFilter($username);
        $name = $CarsDb->sqlInjectionFilter($name);
        $telefono = $CarsDb->sqlInjectionFilter($telefono);
        $email = $CarsDb->sqlInjectionFilter($email);
        $password = $CarsDb->sqlInjectionFilter($password);
        $provincia = $CarsDb->sqlInjectionFilter($provincia);
        $citta = $CarsDb->sqlInjectionFilter($citta);
        $cap = $CarsDb->sqlInjectionFilter($cap);
        $via = $CarsDb->sqlInjectionFilter($via);
        $civico = $CarsDb->sqlInjectionFilter($civico);
        $descrizione = $CarsDb->sqlInjectionFilter($descrizione);
        $lunedi = $CarsDb->sqlInjectionFilter($lunedi);
        $martedi = $CarsDb->sqlInjectionFilter($martedi);
        $mercoledi = $CarsDb->sqlInjectionFilter($mercoledi);
        $giovedi = $CarsDb->sqlInjectionFilter($giovedi);
        $venerdi = $CarsDb->sqlInjectionFilter($venerdi);
        $sabato = $CarsDb->sqlInjectionFilter($sabato);
        $domenica = $CarsDb->sqlInjectionFilter($domenica);
        $foto = $CarsDb->sqlInjectionFilter($foto);

        $queryText = "INSERT INTO concessionaria(nomeConcessionaria, usernameConcessionaria, 
        passwordConcessionaria, posterUrlConcessionaria, numeroTelefono, email, via, numeroCivico, cap, citta, 
        provincia, descrizione, lunedi, martedi, mercoledi, giovedi, venerdi, sabato, domenica) VALUES 
        ('".$name."','".$username."','".$password."','".$foto."','".$telefono."','".$email."','".$via."',
        ".$civico.",".$cap.",'".$citta."','".$provincia."','".$descrizione."','".$lunedi."','".$martedi."',
        '".$mercoledi."','".$giovedi."','".$venerdi."','".$sabato."','".$domenica."')";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    // inserimento senza foto
    function inserisciNuovaConcessionaria($username,$name,$telefono,$email,$password,$provincia,$citta,$cap,$via,
    $civico,$descrizione,$lunedi,$martedi,$mercoledi,$giovedi,$venerdi,$sabato,$domenica){
        global $CarsDb;

        $username = $CarsDb->sqlInjectionFilter($username);
        $name = $CarsDb->sqlInjectionFilter($name);
        $telefono = $CarsDb->sqlInjectionFilter($telefono);
        $email = $CarsDb->sqlInjectionFilter($email);
        $password = $CarsDb->sqlInjectionFilter($password);
        $provincia = $CarsDb->sqlInjectionFilter($provincia);
        $citta = $CarsDb->sqlInjectionFilter($citta);
        $cap = $CarsDb->sqlInjectionFilter($cap);
        $via = $CarsDb->sqlInjectionFilter($via);
        $civico = $CarsDb->sqlInjectionFilter($civico);
        $descrizione = $CarsDb->sqlInjectionFilter($descrizione);
        $lunedi = $CarsDb->sqlInjectionFilter($lunedi);
        $martedi = $CarsDb->sqlInjectionFilter($martedi);
        $mercoledi = $CarsDb->sqlInjectionFilter($mercoledi);
        $giovedi = $CarsDb->sqlInjectionFilter($giovedi);
        $venerdi = $CarsDb->sqlInjectionFilter($venerdi);
        $sabato = $CarsDb->sqlInjectionFilter($sabato);
        $domenica = $CarsDb->sqlInjectionFilter($domenica);

        $queryText = "INSERT INTO concessionaria(nomeConcessionaria, usernameConcessionaria, 
        passwordConcessionaria, numeroTelefono, email, via, numeroCivico, cap, citta, 
        provincia, descrizione, lunedi, martedi, mercoledi, giovedi, venerdi, sabato, domenica) VALUES 
        ('".$name."','".$username."','".$password."','".$telefono."','".$email."','".$via."',
        ".$civico.",".$cap.",'".$citta."','".$provincia."','".$descrizione."','".$lunedi."','".$martedi."',
        '".$mercoledi."','".$giovedi."','".$venerdi."','".$sabato."','".$domenica."')";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }
    

    // funzioni per la pagina dell'account ***********************************************
    function getAccountById($userId){
        global $CarsDb;

        $userId = $CarsDb->sqlInjectionFilter($userId);

        $queryText = "select * 
        from utenti 
        where userId = ". $userId ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }



    // funzioni per la modifica dell'account *********************************************
    function modificaNomeCognome($id,$nome,$cognome){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $nome = $CarsDb->sqlInjectionFilter($nome);
        $cognome = $CarsDb->sqlInjectionFilter($cognome);

        $queryText = "UPDATE utenti
        SET nome = '".$nome."' , cognome = '".$cognome."' 
        WHERE userId = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaFotoProfilo($id,$percorso){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $percorso = $CarsDb->sqlInjectionFilter($percorso);

        $queryText = "UPDATE utenti
        SET immagineUtente = '".$percorso."' 
        WHERE userId = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaIndirizzo($id,$indirizzo){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $indirizzo = $CarsDb->sqlInjectionFilter($indirizzo);

        $queryText = "UPDATE utenti
        SET indirizzo = '".$indirizzo."'
        WHERE userId = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaPassword($id,$password){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $password = $CarsDb->sqlInjectionFilter($password);

        $queryText = "UPDATE utenti
        SET password = '".$password."'
        WHERE userId = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaTelefono($id,$telefono){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $telefono = $CarsDb->sqlInjectionFilter($telefono);

        $queryText = "UPDATE utenti
        SET telefono = '".$telefono."'
        WHERE userId = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaDataNascita($id,$data){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $data = $CarsDb->sqlInjectionFilter($data);

        $queryText = "UPDATE utenti
        SET dataNascita = '".$data."'
        WHERE userId = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaSesso($id,$sesso){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $sesso = $CarsDb->sqlInjectionFilter($sesso);

        $queryText = "UPDATE utenti
        SET sesso = '".$sesso."'
        WHERE userId = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }



    // funzioni per la modifica dell'account concessionaria *********************************************
    function modificaNomeConcessionaria($id,$nome){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $nome = $CarsDb->sqlInjectionFilter($nome);

        $queryText = "UPDATE concessionaria
        SET nomeConcessionaria = '".$nome."' 
        WHERE codConcessionaria = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaCittaConcessionaria($id,$citta,$provincia,$cap){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $citta = $CarsDb->sqlInjectionFilter($citta);
        $provincia = $CarsDb->sqlInjectionFilter($provincia);
        $cap = $CarsDb->sqlInjectionFilter($cap);

        $queryText = "UPDATE concessionaria
        SET citta = '".$citta."' , provincia = '" .$provincia. "' , cap = '".$cap."' 
        WHERE codConcessionaria = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaViaConcessionaria($id,$via,$civico){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $via = $CarsDb->sqlInjectionFilter($via);
        $civico = $CarsDb->sqlInjectionFilter($civico);

        $queryText = "UPDATE concessionaria
        SET via = '".$via."' , numeroCivico = '" .$civico. "' 
        WHERE codConcessionaria = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaFotoProfiloConcessionaria($id,$percorso){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $percorso = $CarsDb->sqlInjectionFilter($percorso);

        $queryText = "UPDATE concessionaria
        SET posterUrlConcessionaria = '".$percorso."' 
        WHERE codConcessionaria = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaPasswordConcessionaria($id, $pass){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $pass = $CarsDb->sqlInjectionFilter($pass);

        $queryText = "UPDATE concessionaria
        SET passwordConcessionaria = '".$pass."'
        WHERE codConcessionaria = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaTelefonoConcessionaria($id,$telefono){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $telefono = $CarsDb->sqlInjectionFilter($telefono);

        $queryText = "UPDATE concessionaria
        SET numeroTelefono = '".$telefono."'
        WHERE codConcessionaria = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaDescrizioneConcessionaria($id,$descrizione){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $descrizione = $CarsDb->sqlInjectionFilter($descrizione);

        $queryText = "UPDATE concessionaria
        SET descrizione = '".$descrizione."'
        WHERE codConcessionaria = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function modificaOrariConcessionaria($id,$lunedi,$martedi,$mercoledi,$giovedi,$venerdi,$sabato,$domenica){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $lunedi = $CarsDb->sqlInjectionFilter($lunedi);
        $martedi = $CarsDb->sqlInjectionFilter($martedi);
        $mercoledi = $CarsDb->sqlInjectionFilter($mercoledi);
        $giovedi = $CarsDb->sqlInjectionFilter($giovedi);
        $venerdi = $CarsDb->sqlInjectionFilter($venerdi);
        $sabato = $CarsDb->sqlInjectionFilter($sabato);
        $domenica = $CarsDb->sqlInjectionFilter($domenica);

        $queryText = "UPDATE concessionaria
        SET lunedi = '".$lunedi."' , martedi = '" .$martedi. "', mercoledi = '" .$mercoledi. "', giovedi = '" .$giovedi. "', venerdi = '" .$venerdi. "', sabato = '" .$sabato. "', domenica = '" .$domenica. "' 
        WHERE codConcessionaria = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


    // funzioni per la modifica dell'auto *********************************************
    function ModificaAutoNuovoQuery($id,$prezzo){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $prezzo = $CarsDb->sqlInjectionFilter($prezzo);

        $queryText = "UPDATE auto
        SET prezzo = ".$prezzo."
        WHERE codAuto = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


    function ModificaAutoUsatoQuery($id,$prezzo,$anno,$km,$ultManu,$numPro){
        global $CarsDb;

        $id = $CarsDb->sqlInjectionFilter($id);
        $prezzo = $CarsDb->sqlInjectionFilter($prezzo);
        $anno = $CarsDb->sqlInjectionFilter($anno);
        $km = $CarsDb->sqlInjectionFilter($km);
        $ultManu = $CarsDb->sqlInjectionFilter($ultManu);
        $numPro = $CarsDb->sqlInjectionFilter($numPro);

        $queryText = "UPDATE auto
        SET prezzo = ".$prezzo." , anno = ".$anno. ", totKm = ".$km. ", ultimaManutenzione = '" .$ultManu."' , numProprietariPrecedenti = ".$numPro. "
        WHERE codAuto = ". $id ;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


    // funzioni per l'aggiornamento dei preferiti ********************************************************
    function isPreferito($userId, $carId){
        global $CarsDb;

        $userId = $CarsDb->sqlInjectionFilter($userId);
        $carId = $CarsDb->sqlInjectionFilter($carId);

        $queryText = "select COUNT(*) as num
        from preferiti 
        where userId = '" . $userId . "'and autoId = " . $carId;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function removePreferiti($autoId,$userId){
        global $CarsDb;

        $autoId = $CarsDb->sqlInjectionFilter($autoId);
        $userId = $CarsDb->sqlInjectionFilter($userId);

        $queryText = "DELETE FROM preferiti
                    WhERE userId = '" . $userId . "' and autoId = " . $autoId;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    function inserisciPreferiti($autoId,$userId){
        global $CarsDb;

        $autoId = $CarsDb->sqlInjectionFilter($autoId);
        $userId = $CarsDb->sqlInjectionFilter($userId);

        $queryText = "INSERT INTO preferiti (autoId, userId)
                    VALUES ('".$autoId."','".$userId."')";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }

    // funzioni per l'inserimento delle auto nel database *****************************************
    function getProduttore(){
        global $CarsDb;


        $queryText = "SELECT casaProduttrice FROM produttore";

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


    function AggiungiModello($produttore,$NomeModello,$FotoAuto,$Cilindrata, $Cavalli , $Cambio , $Marce , $Cilindri ,
    $Posti , $Porte , $Lunghezza , $Larghezza , $Altezza , $Peso , $Bagagliaio , $TipoCarburante ,
     $Serbatoio , $Velocita , $ConsumoUrb , $ConsumoExtr , $ConsumoMisto ,
    $Emissione){
        global $CarsDb;


        $queryTextInsertModello = "INSERT INTO modello(casaProduttrice, nomeModello, posterUrl, cilindrata,
    cavalli, cambio, marce, numeroCilindri, numPosti, numPorte,
    lunghezza, larghezza, altezza, peso, dimensioneBagagliaio,
    tipoCarburante, capacitaSerbatoio, velocitaMassima, consumoUrbano,
    consumoExtraurbano, consumoMisto, classeEmissione) VALUES
    ('".$produttore."','".$NomeModello."','".$FotoAuto."',".$Cilindrata."," .$Cavalli." , '".$Cambio."' , ".$Marce." , ".$Cilindri." ,
 ".$Posti." , ".$Porte." , ".$Lunghezza." , ".$Larghezza." , ".$Altezza." , ".$Peso." , ".$Bagagliaio." , '".$TipoCarburante."' ,
  ".$Serbatoio." , ".$Velocita." , ".$ConsumoUrb." , ".$ConsumoExtr." , ".$ConsumoMisto." ,
 '".$Emissione."')";

        $result = $CarsDb->performQuery($queryTextInsertModello);
        $CarsDb->closeConnection();
        return $result;
    }

    function getNewCodModello($produttore,$NomeModello,$FotoAuto,$Cilindrata, $Cavalli , $Cambio , $Marce , $Cilindri ,
    $Posti , $Porte , $Lunghezza , $Larghezza , $Altezza , $Peso , $Bagagliaio , $TipoCarburante ,
     $Serbatoio , $Velocita , $ConsumoUrb , $ConsumoExtr , $ConsumoMisto ,
    $Emissione){
        global $CarsDb;

        $queryTextFindCod = "SELECT codModello FROM modello WHERE 
    casaProduttrice= '".$produttore."' AND nomeModello='".$NomeModello."' AND posterUrl = '".$FotoAuto."' AND cilindrata= ".$Cilindrata." AND
    cavalli = ".$Cavalli." AND cambio = '".$Cambio."' AND marce = ".$Marce." AND numeroCilindri= ".$Cilindri." AND numPosti= ".$Posti." AND numPorte= ".$Porte." AND
    lunghezza= ".$Lunghezza." AND larghezza= ".$Larghezza." AND altezza= ".$Altezza." AND peso= ".$Peso." AND dimensioneBagagliaio= ".$Bagagliaio." AND
    tipoCarburante = '".$TipoCarburante."' AND capacitaSerbatoio= ".$Serbatoio." AND velocitaMassima= ".$Velocita." AND consumoUrbano= ".$ConsumoUrb." AND
    consumoExtraurbano= ".$ConsumoExtr." AND consumoMisto= ".$ConsumoMisto." AND classeEmissione= '".$Emissione."'";

        $result = $CarsDb->performQuery($queryTextFindCod);
        $CarsDb->closeConnection();
        return $result;
    }

    function AggiungiNuovo($CodConcessionaria , $codModello , $prezzo ,$commerciale , $elettrico){
        global $CarsDb;

        $CodConcessionaria = $CarsDb->sqlInjectionFilter($CodConcessionaria);
        $codModello = $CarsDb->sqlInjectionFilter($codModello);
        $prezzo = $CarsDb->sqlInjectionFilter($prezzo);
        $commerciale = $CarsDb->sqlInjectionFilter($commerciale);
        $elettrico = $CarsDb->sqlInjectionFilter($elettrico);

        $queryTextNuovo = "INSERT INTO auto(codConcessionaria, codModello, prezzo, isNew,
        veicoloCommerciale, elettrico) VALUES 
       ( ".$CodConcessionaria." , ".$codModello." , ".$prezzo." , 1 ,
        ".$commerciale." , ".$elettrico." )";

        $result = $CarsDb->performQuery($queryTextNuovo);
        $CarsDb->closeConnection();
        return $result;
    }

    function AggiungiAutoUsato($CodConcessionaria , $codModello , $prezzo ,
    $commerciale , $elettrico , $PaeseOrigine , $Anno , $totKm ,
    $Targa , $UltimaManu , $ProprietariPrec){
        global $CarsDb;

        $queryTextUsato = "INSERT INTO auto(codConcessionaria, codModello, prezzo, isNew,
        veicoloCommerciale, elettrico, paeseOrigine, anno, totKm,
        targa, ultimaManutenzione, numProprietariPrecedenti) VALUES 
       (".$CodConcessionaria." , ".$codModello." , ".$prezzo." , 0 ,
        ".$commerciale." , ".$elettrico." , '".$PaeseOrigine."' , ".$Anno." , ".$totKm." ,
        '".$Targa."' , '".$UltimaManu."' , ".$ProprietariPrec." )";

        $result = $CarsDb->performQuery($queryTextUsato);
        $CarsDb->closeConnection();
        return $result;
    }


    // elimina auto ****************************************************
    function removeAutoById($codAuto){
        global $CarsDb;

        $codAuto = $CarsDb->sqlInjectionFilter($codAuto);

        $queryText = "DELETE FROM auto WHERE codAuto = ". $codAuto;

        $result = $CarsDb->performQuery($queryText);
        $CarsDb->closeConnection();
        return $result;
    }


?>