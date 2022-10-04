<?php  
	
	require_once __DIR__ . "/../config.php";
	// oggetto database
    $CarsDb = new CarsDbManager();

	class CarsDbManager {
		private $mysqli_conn = null;
	
		function CarsDbManager(){
			$this->openConnection();
		}
    
		// instaura la connessione al database se non e' gia presente
    	function openConnection(){
    		if (!$this->isOpened()){
    			global $dbHostname;
    			global $dbUsername;
    			global $dbPassword;
    			global $dbName;
    			
    			$this->mysqli_conn = new mysqli($dbHostname, $dbUsername, $dbPassword);
				if ($this->mysqli_conn->connect_error) 
					die('Connect Error (' . $this->mysqli_conn->connect_errno . ') ' . $this->mysqli_conn->connect_error);

				$this->mysqli_conn->select_db($dbName) or
					die ('Can\'t use db: ' . mysqli_error());
			}
    	}
    
    	// controllo se la connessione e' gia aperta
    	function isOpened(){
       		return ($this->mysqli_conn != null);
    	}
		// esecuzione query
		function performQuery($queryText) {
			if (!$this->isOpened())
				$this->openConnection();
			
			return $this->mysqli_conn->query($queryText);
		}
		// filtraggio per i parametri delle query
		function sqlInjectionFilter($parameter){
			if(!$this->isOpened())
				$this->openConnection();
				
			return $this->mysqli_conn->real_escape_string($parameter);
		}
		// funzione di chiusura della connessione
		function closeConnection(){
 	       	if($this->mysqli_conn !== null)
				$this->mysqli_conn->close();
			
			$this->mysqli_conn = null;
		}
	}

?>