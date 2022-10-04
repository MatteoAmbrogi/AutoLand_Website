function RegistrazioneConc(){}

RegistrazioneConc.DEFAUL_METHOD = "GET";
RegistrazioneConc.URL_REQUEST = "../ajax/RegistrazioneConc.php";
RegistrazioneConc.ASYNC_TYPE = true;

RegistrazioneConc.SUCCESS_RESPONSE = "0";
RegistrazioneConc.ERROR = "-1";


RegistrazioneConc.username = false;
RegistrazioneConc.email = false;
RegistrazioneConc.password = false;
RegistrazioneConc.fotoConc = false;


// controllo nel database con ajax se e' gia' presente un username uguale
RegistrazioneConc.controlloNomeUtente = 
    function(username){
        var queryString = "?Username=" + username;
        var url = RegistrazioneConc.URL_REQUEST + queryString;
        var responseFunction = RegistrazioneConc.responseUsername;

        AjaxManager.performAjaxRequest(RegistrazioneConc.DEFAUL_METHOD, 
                                        url, RegistrazioneConc.ASYNC_TYPE, 
                                        null, responseFunction);
    }
    

RegistrazioneConc.responseUsername =
    function(response){
        if(response.responseCode === RegistrazioneConc.ERROR){
            document.getElementById("avvisi").innerHTML = response.message;
            document.getElementById("username").style.borderColor = "red";
            RegistrazioneConc.username = true;
        }else
        {
            document.getElementById("avvisi").innerHTML = "";
            document.getElementById("username").style.borderColor = "";
            RegistrazioneConc.username = false;
        }
    }

// controllo nel database con ajax se e' gia' presente un email uguale
RegistrazioneConc.controlloEmail = 
    function(email){
        var queryString = "?email=" + email;
        var url = RegistrazioneConc.URL_REQUEST + queryString;
        var responseFunction = RegistrazioneConc.responseEmail;

        AjaxManager.performAjaxRequest(RegistrazioneConc.DEFAUL_METHOD, 
                                        url, RegistrazioneConc.ASYNC_TYPE, 
                                        null, responseFunction);
    }

RegistrazioneConc.responseEmail =
    function(response){
        if(response.responseCode === RegistrazioneConc.ERROR){
            document.getElementById("avvisi").innerHTML = response.message;
            document.getElementById("email").style.borderColor = "red";
            RegistrazioneConc.email = true;
        }else
        {
            document.getElementById("avvisi").innerHTML = "";
            document.getElementById("email").style.borderColor = "";
            RegistrazioneConc.email = false;
        }
    }

// controllo password
RegistrazioneConc.controlloPassword = 
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
            RegistrazioneConc.password = true;

        } else
        {
            pass1.style.borderColor = "";
            pass2.style.borderColor = "";
            document.getElementById("avvisi").innerHTML = "";
            RegistrazioneConc.password = false;
        }
    }



RegistrazioneConc.trySubmit =
    function(){
        if(RegistrazioneConc.username || RegistrazioneConc.email || RegistrazioneConc.password || RegistrazioneConc.fotoConc){
            return false;
        }else{
            return true;
        }
    }

// controllo foto
RegistrazioneConc.controlloFoto =
    function(value){

        if(value == ""){
            RegistrazioneConc.fotoConc =false;
            return true;
        }

        var avvisi = document.getElementById("avvisi");
        avvisi.textContent = '';
        document.getElementById("foto").style.borderColor = "";
        
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(value)) {
            avvisi.textContent = "Tipo del file non valido";
            document.getElementById("foto").style.borderColor = "red";
            RegistrazioneConc.fotoConc = true;
            return false;
        }else{
            RegistrazioneConc.fotoConc = false;
            return true;
        }
    }