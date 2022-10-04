function EliminaAuto(){}

EliminaAuto.DEFAUL_METHOD = "GET";
EliminaAuto.URL_REQUEST = "./ajax/EliminazioneAuto.php";
EliminaAuto.ASYNC_TYPE = true;

EliminaAuto.SUCCESS_RESPONSE = "0";
EliminaAuto.ERROR = "-1";


EliminaAuto.elimina =
    function(codAuto,codConcessionaria){

        var queryString = "?codAuto=" + codAuto + "&codConcessionaria=" + codConcessionaria;
        var url = EliminaAuto.URL_REQUEST + queryString;

        var responseFunction = EliminaAuto.onAjaxResponse;

        AjaxManager.performAjaxRequest(EliminaAuto.DEFAUL_METHOD,
                                        url,EliminaAuto.ASYNC_TYPE,
                                        null, responseFunction);

    }

EliminaAuto.onAjaxResponse = 
    function(response){
        if(response.responseCode === EliminaAuto.SUCCESS_RESPONSE){
            // aggiorno dinamicamente le auto della concessionaria
            CarLoader.loadDataConcessionariaAccount(response.data);
        }
    }