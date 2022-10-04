<?php
    session_start();

    require_once __DIR__ . "/../config.php";
    require_once DIR_UTIL . "CarQuery.php";
    require_once DIR_AJAX_UTIL . "AjaxResponse.php";

    $response = new AjaxResponse();

	// risposta in caso di errore
    if(!isset($_GET['searchType']))
    {
        echo json_encode($response);
        return;
    }
    
	// prelevo il tipo di caricamento da effettuare
	$searchType = $_GET['searchType'];

	if(isset($_GET['carToLoad']) && isset($_GET['offset'])){
		$carToLoad = $_GET['carToLoad'];
		$offset = $_GET['offset'];
	}
	
	// eseguo la query in base al tipo passato
    switch($searchType){
        case 0:
            $result = getCars($searchType, $offset, $carToLoad);
            break;
        case 1:
			$result = getCars($searchType, $offset, $carToLoad);
			break;
		case 2:
			$result = getVeicoliCommerciali($offset, $carToLoad);
			break;
		case 3:
			$codConcessionaria = $_GET['codConcessionaria'];
			$result = getAutoConcessionaria($codConcessionaria);
			break;
		case 4:
			$result = getElettrico($offset, $carToLoad);
			break;
		case 5:
			$result = getPreferiti($_SESSION['userIdCars']);
			break;
		default:
            $result = null;
            break;
    }

	



	// controllo del risultato della query
    if (checkEmptyResult($result)){
		$response = setEmptyResponse();
		echo json_encode($response);
		return;
	}
	
	// invio della risposta
	$message = "OK";	
	$response = setResponse($result, $message);
	echo json_encode($response);
	return;
	
	
	
	
	function checkEmptyResult($result){
		if ($result === null || !$result)
			return true;
			
		return ($result->num_rows <= 0);
	}
	// risposta con errore
	function setEmptyResponse(){
		$message = "Non ci sono automobili da caricare";
		return new AjaxResponse("-1", $message);
	}
	
	// creazione della risposta da inviare
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