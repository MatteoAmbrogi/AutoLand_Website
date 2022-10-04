<?php
	
	function setSession($username, $userId, $Concessionaria){
		$_SESSION['userIdCars'] = $userId;
		$_SESSION['usernameCars'] = $username;
		$_SESSION['concessionariaCars'] = $Concessionaria;
	}

	// controllo dell'accesso
	function isLogged(){		
		if(isset($_SESSION['userIdCars']))
			return $_SESSION['userIdCars'];
		else
			return false;
	}
	

?>