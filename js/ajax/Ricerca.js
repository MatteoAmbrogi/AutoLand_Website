function Ricerca(){}

Ricerca.DEFAUL_METHOD = "GET";
Ricerca.URL_REQUEST = "./ajax/Search.php";
Ricerca.ASYNC_TYPE = true;

Ricerca.SUCCESS_RESPONSE = "0";
Ricerca.NO_MORE_DATA = "-1";


Ricerca.load = 
    function(){

        var RicercaNuovo;
        var RicercaUsato;
        var RicercaCommerciale;
        var RicercaElettrico;
        var RicercaBenzina;
        var RicercaDiesel;
        var RicercaNome;
        var RicercaProduttore;

        // controllo di tutti i campi di inserimento ***********************************

        if(document.getElementById("RicercaNuovo").checked){
            RicercaNuovo = 1;
        }else{
            RicercaNuovo = 0;
        }

        if(document.getElementById("RicercaUsato").checked){
            RicercaUsato = 1;
        }else{
            RicercaUsato = 0;
        }

        if(document.getElementById("RicercaCommerciale").checked){
            RicercaCommerciale = 1;
        }else{
            RicercaCommerciale = 0;
        }

        if(document.getElementById("RicercaElettrico").checked){
            RicercaElettrico = 1;
        }else{
            RicercaElettrico = 0;
        }

        if(document.getElementById("RicercaBenzina").checked){
            RicercaBenzina = 1;
        }else{
            RicercaBenzina = 0;
        }

        if(document.getElementById("RicercaDiesel").checked){
            RicercaDiesel = 1;
        }else{
            RicercaDiesel  = 0;
        }

        if(document.getElementById("RicercaNome").value != ""){
            RicercaNome = document.getElementById("RicercaNome").value;
        }else{
            RicercaNome = 0;
        }

        if(document.getElementById("RicercaProduttore").value != ""){
            RicercaProduttore = document.getElementById("RicercaProduttore").value;
        }else{
            RicercaProduttore = 0;
        }

        //controlli per nuovo e usato
        if(RicercaUsato == 1 && RicercaNuovo == 1){
            RicercaUsato = 0;
            RicercaNuovo = 0;
        }
        //controlli per diesel e benzina
        if(RicercaBenzina == 1 && RicercaDiesel == 1){
            RicercaBenzina = 0;
            RicercaDiesel = 0;
        }

        // creazione della query da inviare con ajax
        var queryString = "?RicercaNuovo=" + RicercaNuovo + "&RicercaUsato=" + RicercaUsato + "&RicercaCommerciale=" + RicercaCommerciale + "&RicercaElettrico=" + RicercaElettrico
        + "&RicercaDiesel=" + RicercaDiesel + "&RicercaBenzina=" + RicercaBenzina + "&RicercaNome=" + RicercaNome + "&RicercaProduttore=" + RicercaProduttore ;
        

        
        var url = Ricerca.URL_REQUEST + queryString;
        var responseFunction = Ricerca.onAjaxResponse;

        AjaxManager.performAjaxRequest(Ricerca.DEFAUL_METHOD, 
                                        url, Ricerca.ASYNC_TYPE, 
                                        null, responseFunction);


    }



Ricerca.onAjaxResponse = 
    function(response){
        if (response.responseCode === Ricerca.NO_MORE_DATA){
            CarDashboard.setEmptyDashboard();
            return;
        }
          
        if (response.responseCode === Ricerca.SUCCESS_RESPONSE)
			CarDashboard.refreshData(response.data, 0, response.isConcessionaria);
    }

