function CarLoader(){}

CarLoader.DEFAUL_METHOD = "GET";
CarLoader.URL_REQUEST = "./ajax/CarLoader.php";

CarLoader.ASYNC_TYPE = true;

CarLoader.CURRENT_PAGE_INDEX = 1;
CarLoader.CAR_TO_LOAD = 8;

CarLoader.USATO = 0;
CarLoader.NUOVO = 1;
CarLoader.VEICOLICOMMERCIALI = 2;
CarLoader.ELETTRICO = 4;


CarLoader.SUCCESS_RESPONSE = "0";
CarLoader.NO_MORE_DATA = "-1";

// funzione di caricamento dati 
CarLoader.loadData = 
    function(searchType){
        var queryString = "?searchType=" + searchType + "&carToLoad=" + CarLoader.CAR_TO_LOAD
                        + "&offset=" + (CarLoader.CURRENT_PAGE_INDEX-1)*CarLoader.CAR_TO_LOAD;
        var url = CarLoader.URL_REQUEST + queryString;
        var responseFunction = CarLoader.onAjaxResponse;

        AjaxManager.performAjaxRequest(CarLoader.DEFAUL_METHOD, 
                                        url, CarLoader.ASYNC_TYPE, 
                                        null, responseFunction);

    }

// funzione per la pagina concessionaria lato utente
CarLoader.loadDataConcessionaria = 
    function(codConcessionaria){
        var queryString = "?searchType=3&codConcessionaria=" + codConcessionaria;
        var url = CarLoader.URL_REQUEST + queryString;
        var responseFunction = CarLoader.onAjaxResponseDefault;

        AjaxManager.performAjaxRequest(CarLoader.DEFAUL_METHOD, 
                                        url, CarLoader.ASYNC_TYPE, 
                                        null, responseFunction);

    }

// funzione per le auto visualizzate nella pagina account concessionaria
CarLoader.loadDataConcessionariaAccount = 
    function(codConcessionaria){
        var queryString = "?searchType=3&codConcessionaria=" + codConcessionaria;
        var url = CarLoader.URL_REQUEST + queryString;
        var responseFunction = CarLoader.onAjaxResponseConcessionaria;

        AjaxManager.performAjaxRequest(CarLoader.DEFAUL_METHOD, 
                                        url, CarLoader.ASYNC_TYPE, 
                                        null, responseFunction);

    }

// per il caricamento dei preferiti nella pagina dell'account utente
CarLoader.loadDataPreferiti = 
    function(){
        var queryString = "?searchType=5";
        var url = CarLoader.URL_REQUEST + queryString;
        var responseFunction = CarLoader.onAjaxResponsePreferiti;

        AjaxManager.performAjaxRequest(CarLoader.DEFAUL_METHOD, 
                                        url, CarLoader.ASYNC_TYPE, 
                                        null, responseFunction);

    }

// funzioni per lo spostamento tra pagine
CarLoader.nextPage =
    function(searchType){
        CarLoader.CURRENT_PAGE_INDEX++;
        CarLoader.loadData(searchType);
    }

CarLoader.previusPage = 
    function(searchType){
        CarLoader.CURRENT_PAGE_INDEX--;
        if(CarLoader.CURRENT_PAGE_INDEX <= 1){
            CarLoader.CURRENT_PAGE_INDEX = 1;
        }
        CarLoader.loadData(searchType);
    }



// funzioni di risposta ad ajax

// funzione per le pagine con le frecce di navigazione 
CarLoader.onAjaxResponse = 
    function(response){
        
        if (response.responseCode === CarLoader.NO_MORE_DATA && CarLoader.CURRENT_PAGE_INDEX == 1){
            CarDashboard.setEmptyDashboard();
            CarDashboard.updatePage(CarLoader.CURRENT_PAGE_INDEX,true);
            return;
        }
          
        if (response.responseCode === CarLoader.SUCCESS_RESPONSE)
			CarDashboard.refreshData(response.data, 0, response.isConcessionaria);
        

        var endPage = ( response.data === null || response.data.length < CarLoader.CAR_TO_LOAD );
        CarDashboard.updatePage(CarLoader.CURRENT_PAGE_INDEX, endPage);
        
    }


CarLoader.onAjaxResponseDefault =
    function(response){

        if (response.responseCode === CarLoader.NO_MORE_DATA){
            CarDashboard.setEmptyDashboard();
            return;
        }
          
        if (response.responseCode === CarLoader.SUCCESS_RESPONSE)
			CarDashboard.refreshData(response.data, 0, response.isConcessionaria);

    }

CarLoader.onAjaxResponsePreferiti =
    function(response){


        if (response.responseCode === CarLoader.NO_MORE_DATA){
            CarDashboard.setEmptyDashboardPreferiti();
            return;
        }
          
        if (response.responseCode === CarLoader.SUCCESS_RESPONSE)
			CarDashboard.refreshData(response.data, 1, response.isConcessionaria);
    }

CarLoader.onAjaxResponseConcessionaria = 
    function(response){

        if (response.responseCode === CarLoader.NO_MORE_DATA){
            CarDashboard.setEmptyDashboard();
            return;
        }
          
        if (response.responseCode === CarLoader.SUCCESS_RESPONSE)
			CarDashboard.refreshData(response.data, 1, response.isConcessionaria);

    }