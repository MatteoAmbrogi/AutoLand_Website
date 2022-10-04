<?php
	require_once __DIR__ . "/config.php";
    require_once DIR_UTIL . "DbManager.php";
    require_once DIR_UTIL . "sessionUtil.php"; 
 
	$username = $_POST['username'];
	$password = $_POST['password'];
	// campo hidden che specifica il tipo di accesso da fare
	$tipo = $_POST['tipoAccesso'];

	if($tipo == "utente"){
		$errorMessage = login($username, $password);
		if($errorMessage === null)
			header('location: ./nuovo.php');
		else
			header('location: ./../index.php?errorMessage=' . $errorMessage );
	}else if($tipo == "concessionaria"){
		$errorMessage = loginConcess($username, $password);
		if($errorMessage === null)
			header('location: ./nuovo.php');
		else
			header('location: ./../index.php?errorMessage=' . $errorMessage );
	}
	
	


	// funzioni login utente
	function login($username, $password){   
		if ($username != null && $password != null){
			$userId = authenticate($username, $password);
    		if ($userId > 0){
    			session_start();
    			setSession($username, $userId, "false");
    			return null;
    		}

    	} else
    		return 'Occorre inserire qualcosa';
    	
    	return 'Username e password non validi';
	}
	
	function authenticate ($username, $password){   
		global $CarsDb;
		$username = $CarsDb->sqlInjectionFilter($username);

		$queryText = "select * from utenti where username='" . $username . "'";

		$result = $CarsDb->performQuery($queryText);
		$numRow = mysqli_num_rows($result);
		if ($numRow != 1){
			return -1;
		}
		$CarsDb->closeConnection();
		$userRow = $result->fetch_assoc();
		// controllo password cifrata
		if(!password_verify($password,$userRow['password'])){
			return -1;
		}
			
		
		return $userRow['userId'];
	}

	// funzioni login concessionaria
	function loginConcess($username, $password){   
		if ($username != null && $password != null){
			$carId = authenticateConcess($username, $password);
    		if ($carId > 0){
    			session_start();
    			setSession($username, $carId, "true");
    			return null;
    		}

    	} else
    		return 'Occorre inserire qualcosa';
    	
    	return 'Username e password non validi';
	}
	
	function authenticateConcess($username, $password){   
		global $CarsDb;
		$username = $CarsDb->sqlInjectionFilter($username);

		$queryText = "select * from concessionaria where usernameConcessionaria='" . $username . "'";

		$result = $CarsDb->performQuery($queryText);
		$numRow = mysqli_num_rows($result);
		if ($numRow != 1){
			return -1;
		}

		$CarsDb->closeConnection();
		$userRow = $result->fetch_assoc();
		// controllo password cifrata
		if(!password_verify($password,$userRow['passwordConcessionaria'])){
			return -1;
		}
		
		return $userRow['codConcessionaria'];
	}

?>