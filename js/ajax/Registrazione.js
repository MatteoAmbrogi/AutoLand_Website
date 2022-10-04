function Registrazione(){}

Registrazione.DEFAUL_METHOD = "GET";
Registrazione.URL_REQUEST = "../ajax/Registrazione.php";
Registrazione.ASYNC_TYPE = true;

Registrazione.SUCCESS_RESPONSE = "0";
Registrazione.ERROR = "-1";

Registrazione.username = false;
Registrazione.pass = false;
Registrazione.email = false;

// controllo nel database con ajax se e' gia' presente un username uguale
Registrazione.controlloNomeUtente = 
    function(nomeUtente){
        var queryString = "?nomeUtente=" + nomeUtente;
        var url = Registrazione.URL_REQUEST + queryString;
        var responseFunction = Registrazione.responseNomeUtente;

        AjaxManager.performAjaxRequest(Registrazione.DEFAUL_METHOD, 
                                        url, Registrazione.ASYNC_TYPE, 
                                        null, responseFunction);
    }

Registrazione.responseNomeUtente =
    function(response){
        if(response.responseCode === Registrazione.ERROR){
            document.getElementById("avvisi").innerHTML = response.message;
            document.getElementById("username").style.borderColor = "red";
            Registrazione.username = true;
        }else
        {
            document.getElementById("avvisi").innerHTML = "";
            document.getElementById("username").style.borderColor = "";
            Registrazione.username = false;
        }
    }

Registrazione.controlloPassword = 
    function(){
        var pass1 = document.getElementById("password1");
        var pass2 = document.getElementById("password2");
        
        // se inserisco solo la prima password non occorre fare controlli
        if(pass2.value == ''){
            return;
        }
        if(pass1.value !== pass2.value){
            pass1.style.borderColor = "red";
            pass2.style.borderColor = "red";
            document.getElementById("avvisi").innerHTML = "Password diverse";
            Registrazione.pass = true;
        } else
        {
            pass1.style.borderColor = "";
            pass2.style.borderColor = "";
            document.getElementById("avvisi").innerHTML = "";
            Registrazione.pass = false;
        }
    }

// controllo nel database con ajax se e' gia' presente un email uguale
Registrazione.controlloEmail = 
    function(email){
        var queryString = "?email=" + email;
        var url = Registrazione.URL_REQUEST + queryString;
        var responseFunction = Registrazione.responseEmail;

        AjaxManager.performAjaxRequest(Registrazione.DEFAUL_METHOD, 
                                        url, Registrazione.ASYNC_TYPE, 
                                        null, responseFunction);
    }

Registrazione.responseEmail =
    function(response){
        if(response.responseCode === Registrazione.ERROR){
            document.getElementById("avvisi").innerHTML = response.message;
            document.getElementById("email").style.borderColor = "red";
            Registrazione.email = true;
        }else
        {
            document.getElementById("avvisi").innerHTML = "";
            document.getElementById("email").style.borderColor = "";
            Registrazione.email = false;
        }
    }


Registrazione.trySubmit = 
    function(){
        if(Registrazione.username || Registrazione.pass || Registrazione.email){
            return false;
        }else{
            return true;
        }
    }
