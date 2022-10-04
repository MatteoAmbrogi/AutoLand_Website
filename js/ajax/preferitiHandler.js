function prefetitiHandler(){}

prefetitiHandler.DEFAUL_METHOD = "GET";
prefetitiHandler.URL_REQUEST = "./ajax/PreferitiInterazione.php";
prefetitiHandler.ASYNC_TYPE = true;

prefetitiHandler.SUCCESS_RESPONSE = "0";
prefetitiHandler.ERROR = "-1";


prefetitiHandler.prefer = 
    function(carId,type){
        // per capire se l'elemento e' gia preferito o no
        var flag = getOppositeFlag(document.getElementById("buttonCar" + carId));
        var queryString = "?autoId=" + carId + "&flag=" + flag;
        var url = prefetitiHandler.URL_REQUEST + queryString;
        
        
        if(type == 0){
            var responseFunction = prefetitiHandler.onAjaxResponse;
        }else if(type == 1){
            // caso in cui devo ricaricare tutte le auto nella pagina dell'account utente
            var responseFunction = prefetitiHandler.onAjaxResponseRefresh;
        }

        

        AjaxManager.performAjaxRequest(prefetitiHandler.DEFAUL_METHOD,
                                        url,prefetitiHandler.ASYNC_TYPE,
                                        null, responseFunction);
    }

prefetitiHandler.onAjaxResponse =
    function(response){
        if(response.responseCode === prefetitiHandler.SUCCESS_RESPONSE){
            // aggiorno il bottone
            CarDashboard.updatePreferiti(response.data);
        }
    }


prefetitiHandler.onAjaxResponseRefresh =
    function(response){
        if(response.responseCode === prefetitiHandler.SUCCESS_RESPONSE){
            // aggiorno il bottone
            CarDashboard.updatePreferiti(response.data);
            // aggiorno le auto nella pagina dell'account utente
            CarLoader.loadDataPreferiti();
        }
    }

 
function getOppositeFlag(elem){

    var classAtt = elem.getAttribute('class');
    // leggo l'ultimo numero del nome della classe
    var currentFlag = parseInt(classAtt.charAt(classAtt.length-1));
    // restituisce l'opposto
	return (currentFlag+1)%2;

}
