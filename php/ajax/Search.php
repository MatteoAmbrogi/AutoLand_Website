<?php
    session_start();

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";


	// query di base
    $SearchQuery = "select * 
        from auto,modello,produttore,concessionaria 
        where auto.codModello = modello.codModello 
        and modello.casaProduttrice = produttore.casaProduttrice 
        and concessionaria.codConcessionaria = auto.codConcessionaria ";
	
    $order = "order by auto.codAuto";

	// opzioni da aggiungere alla query
    $SearchOptions = " ";

    $RicercaNuovo = $_GET['RicercaNuovo'];
    $RicercaUsato = $_GET['RicercaUsato'];
    $RicercaCommerciale = $_GET['RicercaCommerciale'];
    $RicercaElettrico = $_GET['RicercaElettrico'];
    $RicercaDiesel = $_GET['RicercaDiesel'];
    $RicercaBenzina = $_GET['RicercaBenzina'];
    $RicercaProduttore = $_GET['RicercaProduttore'];
    $RicercaNome = $_GET['RicercaNome'];

    if($RicercaNuovo == 1){
        $SearchOptions .= "and auto.isNew = 1 ";
    }
    if($RicercaUsato == 1){
        $SearchOptions .= "and auto.isNew = 0 ";
    }
    if($RicercaCommerciale == 1){
        $SearchOptions .= "and auto.veicoloCommerciale = 1 ";
    }
    if($RicercaElettrico == 1){
        $SearchOptions .= "and auto.elettrico = 1 ";
    }
    if($RicercaDiesel == 1){
        $SearchOptions .= "and modello.tipoCarburante LIKE '%Diesel%' ";
    }
    if($RicercaBenzina == 1){
        $SearchOptions .= "and modello.tipoCarburante LIKE '%Benzina%' ";
    }


    
    if($RicercaProduttore != "0"){
        $SearchOptions .= "and modello.casaProduttrice = '".$RicercaProduttore."' ";
    }

    if($RicercaNome != "0"){
        $SearchOptions .= "and modello.nomeModello LIKE '%".$RicercaNome."%' ";
    }

    $queryFinale = $SearchQuery . $SearchOptions . $order;
    $result = getSearch($queryFinale);

	// controlli sul risultato della query
    if (checkEmptyResult($result)){
		$response = setEmptyResponse();
		echo json_encode($response);
		return;
	}
	
	$message = "OK";	
	$response = setResponse($result, $message);
	echo json_encode($response);
	return;
	
	
	
	
	function checkEmptyResult($result){
		if ($result === null || !$result)
			return true;
			
		return ($result->num_rows <= 0);
	}
	// risposta in caso di errore
	function setEmptyResponse(){
		$message = "Non ci sono automobili da caricare";
		return new AjaxResponse("-1", $message);
	}
	// risposta
	function setResponse($result, $message){
		$response = new AjaxResponse("0", $message, $_SESSION['concessionariaCars']);
			
		$index = 0;
		while ($row = $result->fetch_assoc()){
			
			$Auto = new Auto();
			$Auto->codAuto = $row['codAuto'];
			$Auto->nomeModello = $row['nomeModello'];
			$Auto->casaProduttrice = $row['casaProduttrice'];
			$Auto->nomeConcessionaria = $row['nomeConcessionaria'];
			$Auto->isNew = $row['isNew'];
			$Auto->posterUrl = $row['posterUrl'];
			$Auto->tipoCarburante = $row['tipoCarburante'];
			$Auto->cavalli = $row['cavalli'];
			$Auto->cambio = $row['cambio'];
			$Auto->marce = $row['marce'];
			$Auto->anno = $row['anno'];
			$Auto->totKm = $row['totKm'];
			$Auto->numPorte = $row['numPorte'];
			$Auto->classeEmissione = $row['classeEmissione'];
			$Auto->codConcessionaria = $row['codConcessionaria'];
			$Auto->prezzo = $row['prezzo'];
			$Auto->ultimaManutenzione = $row['ultimaManutenzione'];
			$Auto->numProprietariPrecedenti = $row['numProprietariPrecedenti'];

			$preferitiRisultato = isPreferito($_SESSION['userIdCars'],$row['codAuto']);
			$risultato = $preferitiRisultato->fetch_assoc();

			$Auto->isPreferito = $risultato['num'];
		
			$response->data[$index] = $Auto;
			$index++;
		}
		
		return $response;
	}
    

?>