POPUP_ID = 'PopUp';
AVVISI_ID = 'avvisi';

function createButton(){

    var divBottoni = document.createElement('div');
    divBottoni.className = "divBottoni";

    // bottone annulla
    var closeButton = document.createElement('button');
    closeButton.setAttribute('onclick', 'closePopup()');
    closeButton.setAttribute('class', 'bottonePopup annulla');
    closeButton.innerHTML = "Annulla";
    
    // bottone invio
    var submitButton = document.createElement('input');
    submitButton.setAttribute('form', 'Form_id');
    submitButton.type = "submit";
    submitButton.value = "Invio";
    submitButton.setAttribute('class', 'bottonePopup invio');

    divBottoni.appendChild(closeButton);
    divBottoni.appendChild(submitButton);
    
    return divBottoni;
}


// funzioni che creano le varie form **************************
function ModificaNomeCognome(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaUtente.php";
    contenuto.target = "_self";
    contenuto.setAttribute('onsubmit', "return controlloTesto(this.Nome.value) && controlloTesto(this.Cognome.value);")
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Nome e Congome";
    
    var nome = document.createElement('div');
    nome.className = "divinterna";
    var spanNome = document.createElement('span');
    spanNome.textContent = "Nome";
    var inputNome = document.createElement('input');
    inputNome.type = "text";
    inputNome.name = "Nome";
    inputNome.id = "Nome";
    inputNome.placeholder = "Nome";
    inputNome.required = true;
    inputNome.autofocus = true;
    nome.appendChild(spanNome);
    nome.appendChild(inputNome);

    var Cognome = document.createElement('div');
    Cognome.className = "divinterna";
    var spanCognome = document.createElement('span');
    spanCognome.textContent = "Cognome";
    var inputCognome = document.createElement('input');
    inputCognome.type = "text";
    inputCognome.name = "Cognome";
    inputCognome.id = "Cognome";
    inputCognome.placeholder = "Cognome";
    inputCognome.required = true;
    Cognome.appendChild(spanCognome);
    Cognome.appendChild(inputCognome);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'userId';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "NomeCognome";

    contenuto.appendChild(titolo);
    contenuto.appendChild(nome);
    contenuto.appendChild(Cognome);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;
}


function ModificaFotoProfilo(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaUtente.php";
    contenuto.target = "_self";
    contenuto.enctype = "multipart/form-data";
    contenuto.setAttribute('onsubmit', "return controlloFoto(this.Foto.value);")
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Foto";

    var foto = document.createElement('div');
    foto.className = "divinterna";
    var inputFoto = document.createElement('input');
    inputFoto.type = "file";
    inputFoto.name = "Foto";
    inputFoto.id = "Foto";
    inputFoto.required = true;
    inputFoto.autofocus = true;
    foto.appendChild(inputFoto);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'userId';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "FotoProfilo";

    contenuto.appendChild(titolo);
    contenuto.appendChild(foto);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaIndirizzo(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaUtente.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Indirizzo";
    
    var indirizzo = document.createElement('div');
    indirizzo.className = "divinterna";
    var spanIndirizzo = document.createElement('span');
    spanIndirizzo.textContent = "Indirizzo";
    var inputIndirizzo = document.createElement('input');
    inputIndirizzo.type = "text";
    inputIndirizzo.name = "Indirizzo";
    inputIndirizzo.id = "Indirizzo";
    inputIndirizzo.placeholder = "Indirizzo";
    inputIndirizzo.required = true;
    inputIndirizzo.autofocus = true;
    indirizzo.appendChild(spanIndirizzo);
    indirizzo.appendChild(inputIndirizzo);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'userId';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "Indirizzo";

    contenuto.appendChild(titolo);
    contenuto.appendChild(indirizzo);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaPassword(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaUtente.php";
    contenuto.target = "_self";
    contenuto.setAttribute('onsubmit', "return controlloPass(this.Pass1.value, this.Pass2.value);");
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Password";
    
    var pass1 = document.createElement('div');
    pass1.className = "divinterna";
    var span = document.createElement('span');
    span.textContent = "Password";
    var input = document.createElement('input');
    input.type = "password";
    input.name = "Pass1";
    input.id = "Pass1";
    input.placeholder = "Password";
    input.required = true;
    input.autofocus = true;
    pass1.appendChild(span);
    pass1.appendChild(input);

    var pass2 = document.createElement('div');
    pass2.className = "divinterna";
    var span1 = document.createElement('span');
    span1.textContent = "Ripeti Password";
    var input1 = document.createElement('input');
    input1.type = "password";
    input1.name = "Pass2";
    input1.id = "Pass2";
    input1.placeholder = "Ripeti Password";
    input1.required = true;
    pass2.appendChild(span1);
    pass2.appendChild(input1);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'userId';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "Password";

    contenuto.appendChild(titolo);
    contenuto.appendChild(pass1);
    contenuto.appendChild(pass2);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaTelefono(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaUtente.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Telefono";
    
    var tel = document.createElement('div');
    tel.className = "divinterna";
    var span = document.createElement('span');
    span.textContent = "Telefono";
    var input = document.createElement('input');
    input.type = "tel";
    input.name = "Telefono";
    input.id = "Telefono";
    input.placeholder = "Telefono";
    input.required = true;
    input.autofocus = true;
    input.setAttribute('pattern',"\\d*");
    tel.appendChild(span);
    tel.appendChild(input);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'userId';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "Telefono";

    contenuto.appendChild(titolo);
    contenuto.appendChild(tel);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaDataNascita(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaUtente.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Data di nascita";
    
    var Data = document.createElement('div');
    Data.className = "divinterna";
    var span = document.createElement('span');
    span.textContent = "Data";
    var input = document.createElement('input');
    input.type = "date";
    input.name = "DataNascita";
    input.id = "DataNascita";
    input.required = true;
    input.autofocus = true;
    Data.appendChild(span);
    Data.appendChild(input);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'userId';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "DataNascita";

    contenuto.appendChild(titolo);
    contenuto.appendChild(Data);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaSesso(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaUtente.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Sesso";
    
    var Sesso = document.createElement('div');
    Sesso.className = "divinternaSesso";
    
    var input = document.createElement('input');
    input.type = "radio";
    input.name = "Sesso";
    input.id = "Uomo";
    input.required = true;
    input.value = "Uomo";

    var label = document.createElement('label');
    label.for = "Uomo";
    label.textContent = "Uomo";
    
    var input1 = document.createElement('input');
    input1.type = "radio";
    input1.name = "Sesso";
    input1.id = "Donna";
    input1.required = true;
    input1.value = "Donna";

    var label1 = document.createElement('label');
    label1.for = "Donna";
    label1.textContent = "Donna";

    var input2 = document.createElement('input');
    input2.type = "radio";
    input2.name = "Sesso";
    input2.id = "Altro";
    input2.required = true;
    input2.value = "Altro";

    var label2 = document.createElement('label');
    label2.for = "Altro";
    label2.textContent = "Altro";
    
    Sesso.appendChild(input);
    Sesso.appendChild(label);
    Sesso.appendChild(input1);
    Sesso.appendChild(label1);
    Sesso.appendChild(input2);
    Sesso.appendChild(label2);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'userId';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "Sesso";

    contenuto.appendChild(titolo);
    contenuto.appendChild(Sesso);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}


// funzione che crea il popup ****************************************
function creaPopUp(tipo,id){

    // se e' gia presente termino
    var popup = document.getElementById(POPUP_ID);
    if( popup !== null){
        return;
    }


    var popup = document.createElement('div');
    popup.setAttribute('id', POPUP_ID);

    var divContent = document.createElement('div');
    divContent.setAttribute('class', 'popup_divContent');
    

    // creo il popup in base al tipo passato
    switch(tipo){
        case "NomeCognome":
            var contenuto = ModificaNomeCognome(id);
            break;
        case "FotoProfilo":
            var contenuto = ModificaFotoProfilo(id);
            break;
        case "Indirizzo":
            var contenuto = ModificaIndirizzo(id);
            break;
        case "Password":
            var contenuto = ModificaPassword(id);
            break;
        case "Telefono":
            var contenuto = ModificaTelefono(id);
            break;
        case "DataNascita":
            var contenuto = ModificaDataNascita(id);
            break;
        case "Sesso":
            var contenuto = ModificaSesso(id);
            break;
        default:
            console.log("Errore nel creare il popup di modifica dati");
            break;
    }

    // div avvisi
    var avvisi = document.createElement('div');
    avvisi.className = "avvisi";
    avvisi.id = AVVISI_ID;
    
    divContent.appendChild(contenuto);
    divContent.appendChild(avvisi);
    // creo i bottoni di invio e annullamento
    divContent.appendChild(createButton());
    popup.appendChild(divContent);
    // inserisco il popup nel main
    document.getElementsByTagName('main')[0].appendChild(popup);
    
}

// funzioni onclick/onblur/onsubmit *****************************************
function closePopup(){
    var popup = document.getElementById(POPUP_ID);
    if(popup == null){
        return;
    }
    document.getElementsByTagName('main')[0].removeChild(popup);
}

function controlloTesto(value){
    
    var avvisi = document.getElementById(AVVISI_ID);
    avvisi.textContent = '';
    
    if(value == ''){
        return;
    }
    
    // pattern per verificare che non ci siano numeri
    var pattern = /^([^0-9]*)$/;
    //entra se ci sono dei numeri
    if( !pattern.test(value) )
    {
        avvisi.textContent = "Non sono ammessi numeri";
        return false; 
    }else{
        return true;
    }
}

function controlloFoto(value){

    var avvisi = document.getElementById(AVVISI_ID);
    avvisi.textContent = '';
    
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(value)) {
        avvisi.textContent = "Tipo del file non valido";
        return false;
    }else{
        return true;
    }

}

function controlloPass(pass1,pass2){
    var avvisi = document.getElementById(AVVISI_ID);
    avvisi.textContent = '';

    if(pass1 != pass2)
    {
        avvisi.textContent = "Password diverse";
        return false;
    }else{
        return true;
    }
}
