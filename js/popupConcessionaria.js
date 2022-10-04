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

// funzioni che creano le varie form ******************************
function ModificaNome(id,value){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaConcessionaria.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Nome Concessionaria";
    
    var nome = document.createElement('div');
    nome.className = "divinterna";
    var spanNome = document.createElement('span');
    spanNome.textContent = "Nome";
    var inputNome = document.createElement('input');
    inputNome.type = "text";
    inputNome.name = "Nome";
    inputNome.id = "Nome";
    inputNome.placeholder = "Nome";
    inputNome.value = value;
    inputNome.required = true;
    inputNome.autofocus = true;
    nome.appendChild(spanNome);
    nome.appendChild(inputNome);


    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'codConcessionaria';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "Nome";

    contenuto.appendChild(titolo);
    contenuto.appendChild(nome);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaCitta(id,value){
    
    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaConcessionaria.php";
    contenuto.target = "_self";
    contenuto.setAttribute('onsubmit', "return controlloCitta(this.citta.value) && controlloProv(this.provincia.value);")
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Indirizzo";
    
    var citta = document.createElement('div');
    citta.className = "divinterna";
    var span = document.createElement('span');
    span.textContent = "Città";
    var input = document.createElement('input');
    input.type = "text";
    input.name = "citta";
    input.id = "citta";
    input.placeholder = "Città";
    input.value = value[0];
    input.required = true;
    input.autofocus = true;
    citta.appendChild(span);
    citta.appendChild(input);

    var prov = document.createElement('div');
    prov.className = "divinterna";
    var span1 = document.createElement('span');
    span1.textContent = "Provincia";
    var input1 = document.createElement('input');
    input1.type = "text";
    input1.name = "provincia";
    input1.id = "provincia";
    input1.placeholder = "Provincia";
    input1.value = value[1];
    input1.required = true;
    prov.appendChild(span1);
    prov.appendChild(input1);

    var cap = document.createElement('div');
    cap.className = "divinterna";
    var span2 = document.createElement('span');
    span2.textContent = "Cap";
    var input2 = document.createElement('input');
    input2.type = "text";
    input2.name = "cap";
    input2.id = "cap";
    input2.placeholder = "Cap";
    input2.setAttribute('pattern',"\\d*");
    input2.value = value[2];
    input2.required = true;
    cap.appendChild(span2);
    cap.appendChild(input2);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'codConcessionaria';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "citta";

    contenuto.appendChild(titolo);
    contenuto.appendChild(citta);
    contenuto.appendChild(prov);
    contenuto.appendChild(cap);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaIndirizzo(id,value){
    
    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaConcessionaria.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Indirizzo";
    
    var via = document.createElement('div');
    via.className = "divinterna";
    var span = document.createElement('span');
    span.textContent = "Via";
    var input = document.createElement('input');
    input.type = "text";
    input.name = "via";
    input.id = "via";
    input.placeholder = "Via";
    input.value = value[0];
    input.required = true;
    input.autofocus = true;
    via.appendChild(span);
    via.appendChild(input);

    var civico = document.createElement('div');
    civico.className = "divinterna";
    var span1 = document.createElement('span');
    span1.textContent = "Numero Civico";
    var input1 = document.createElement('input');
    input1.type = "text";
    input1.name = "civico";
    input1.id = "civico";
    input1.placeholder = "Numero Civico";
    input1.value = value[1];
    input1.required = true;
    civico.appendChild(span1);
    civico.appendChild(input1);


    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'codConcessionaria';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "indirizzo";

    contenuto.appendChild(titolo);
    contenuto.appendChild(via);
    contenuto.appendChild(civico);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}


function ModificaFoto(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaConcessionaria.php";
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
    inputHidden1.name = 'codConcessionaria';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "Foto";

    contenuto.appendChild(titolo);
    contenuto.appendChild(foto);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaPassword(id){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaConcessionaria.php";
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
    inputHidden1.name = 'codConcessionaria';
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
    contenuto.action = "./registrazione/modificaConcessionaria.php";
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
    inputHidden1.name = 'codConcessionaria';
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


function ModificaDescrizione(id,value){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaConcessionaria.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Descrizione";
    
    var desc = document.createElement('div');
    desc.className = "divinterna";
    var input = document.createElement('textarea');
    input.name = "Descrizione";
    input.id = "Descrizione";
    input.value = value;
    input.rows = 13;
    input.cols = 80;
    input.required = true;
    input.autofocus = true;
    desc.appendChild(input);

    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'codConcessionaria';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "Descrizione";

    contenuto.appendChild(titolo);
    contenuto.appendChild(desc);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaOrari(id,value){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaConcessionaria.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    titolo.textContent = "Modifica Orari";
    
    var lunedi = document.createElement('div');
    lunedi.className = "divinterna";
    var span = document.createElement('span');
    span.textContent = "Lunedi";
    var input = document.createElement('input');
    input.type = "text";
    input.name = "lunedi";
    input.id = "lunedi";
    input.placeholder = "Lunedi";
    input.value = value[0];
    input.required = true;
    input.autofocus = true;
    lunedi.appendChild(span);
    lunedi.appendChild(input);

    var martedi = document.createElement('div');
    martedi.className = "divinterna";
    var span1 = document.createElement('span');
    span1.textContent = "Martedi";
    var input1 = document.createElement('input');
    input1.type = "text";
    input1.name = "martedi";
    input1.id = "martedi";
    input1.placeholder = "Martedi";
    input1.value = value[1];
    input1.required = true;
    martedi.appendChild(span1);
    martedi.appendChild(input1);
    
    var mercoledi = document.createElement('div');
    mercoledi.className = "divinterna";
    var span2 = document.createElement('span');
    span2.textContent = "Mercoledi";
    var input2 = document.createElement('input');
    input2.type = "text";
    input2.name = "mercoledi";
    input2.id = "mercoledi";
    input2.placeholder = "Mercoledi";
    input2.value = value[2];
    input2.required = true;
    mercoledi.appendChild(span2);
    mercoledi.appendChild(input2);

    var giovedi = document.createElement('div');
    giovedi.className = "divinterna";
    var span3 = document.createElement('span');
    span3.textContent = "Giovedi";
    var input3 = document.createElement('input');
    input3.type = "text";
    input3.name = "giovedi";
    input3.id = "giovedi";
    input3.placeholder = "Giovedi";
    input3.value = value[3];
    input3.required = true;
    giovedi.appendChild(span3);
    giovedi.appendChild(input3);

    var venerdi = document.createElement('div');
    venerdi.className = "divinterna";
    var span4 = document.createElement('span');
    span4.textContent = "Venerdi";
    var input4 = document.createElement('input');
    input4.type = "text";
    input4.name = "venerdi";
    input4.id = "venerdi";
    input4.placeholder = "Venerdi";
    input4.value = value[4];
    input4.required = true;
    venerdi.appendChild(span4);
    venerdi.appendChild(input4);

    var sabato = document.createElement('div');
    sabato.className = "divinterna";
    var span5 = document.createElement('span');
    span5.textContent = "Sabato";
    var input5 = document.createElement('input');
    input5.type = "text";
    input5.name = "sabato";
    input5.id = "sabato";
    input5.placeholder = "Sabato";
    input5.value = value[5];
    input5.required = true;
    sabato.appendChild(span5);
    sabato.appendChild(input5);

    var domenica = document.createElement('div');
    domenica.className = "divinterna";
    var span6 = document.createElement('span');
    span6.textContent = "Domenica";
    var input6 = document.createElement('input');
    input6.type = "text";
    input6.name = "domenica";
    input6.id = "domenica";
    input6.placeholder = "Domenica";
    input6.value = value[6];
    input6.required = true;
    domenica.appendChild(span6);
    domenica.appendChild(input6);


    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'codConcessionaria';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    inputHidden2.value = "Orari";

    contenuto.appendChild(titolo);
    contenuto.appendChild(lunedi);
    contenuto.appendChild(martedi);
    contenuto.appendChild(mercoledi);
    contenuto.appendChild(giovedi);
    contenuto.appendChild(venerdi);
    contenuto.appendChild(sabato);
    contenuto.appendChild(domenica);
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}

function ModificaAuto(id,value){

    var contenuto = document.createElement('form');
    contenuto.className = "contenutoPopUp";
    contenuto.id = "Form_id";
    contenuto.method = "post";
    contenuto.action = "./registrazione/modificaConcessionaria.php";
    contenuto.target = "_self";
    var titolo = document.createElement('div');
    titolo.className = "titoloPupUp";
    if(value.isNew == 1){
        titolo.textContent = "Modifica Auto Nuova";
    } else if(value.isNew == 0){
        titolo.textContent = "Modifica Auto Usata";
    }
    
    var prezzo = document.createElement('div');
    prezzo.className = "divinterna";
    var span = document.createElement('span');
    span.textContent = "Prezzo";
    var input = document.createElement('input');
    input.type = "text";
    input.name = "prezzo";
    input.id = "prezzo";
    input.placeholder = "€";
    input.value = value.prezzo;
    input.setAttribute('pattern',"\\d*");
    input.required = true;
    input.autofocus = true;
    prezzo.appendChild(span);
    prezzo.appendChild(input);

    var anno = document.createElement('div');
    anno.className = "divinterna";
    var span1 = document.createElement('span');
    span1.textContent = "Anno";
    var input1 = document.createElement('input');
    input1.type = "text";
    input1.name = "anno";
    input1.id = "anno";
    input1.placeholder = "Anno";
    input1.setAttribute('pattern',"\\d{4}");
    input1.value = value.anno;
    input1.required = true;
    anno.appendChild(span1);
    anno.appendChild(input1);

    var km = document.createElement('div');
    km.className = "divinterna";
    var span2 = document.createElement('span');
    span2.textContent = "Chilometraggio";
    var input2 = document.createElement('input');
    input2.type = "text";
    input2.name = "km";
    input2.id = "km";
    input2.placeholder = "km";
    input2.value = value.totKm;
    input2.setAttribute('pattern',"\\d*");
    input2.required = true;
    km.appendChild(span2);
    km.appendChild(input2);

    var ultManu = document.createElement('div');
    ultManu.className = "divinterna";
    var span3 = document.createElement('span');
    span3.textContent = "Ultima Revisione";
    var input3 = document.createElement('input');
    input3.type = "date";
    input3.name = "ultManu";
    input3.id = "ultManu";
    input3.value = value.ultimaManutenzione;
    input3.required = true;
    ultManu.appendChild(span3);
    ultManu.appendChild(input3);

    var numPro = document.createElement('div');
    numPro.className = "divinterna";
    var span4 = document.createElement('span');
    span4.textContent = "Prop. Precedenti";
    var input4 = document.createElement('input');
    input4.type = "text";
    input4.name = "numPro";
    input4.id = "numPro";
    input4.placeholder = "Proprietari Precedenti";
    input4.value = value.numProprietariPrecedenti;
    input4.setAttribute('pattern',"\\d*");
    input4.required = true;
    numPro.appendChild(span4);
    numPro.appendChild(input4);


    var inputHidden1 = document.createElement('input');
    inputHidden1.type = "hidden";
    inputHidden1.name = 'codAuto';
    inputHidden1.value = id;

    var inputHidden2 = document.createElement('input');
    inputHidden2.type = "hidden";
    inputHidden2.name = 'tipoForm';
    if(value.isNew == 1){
        inputHidden2.value = "ModificaAutoNuovo";
    } else if(value.isNew == 0){
        inputHidden2.value = "ModificaAutoUsato";
    }

    contenuto.appendChild(titolo);
    contenuto.appendChild(prezzo);
    if(value.isNew == 0){
        contenuto.appendChild(anno);
        contenuto.appendChild(km);
        contenuto.appendChild(ultManu);
        contenuto.appendChild(numPro);
    }
    contenuto.appendChild(inputHidden1);
    contenuto.appendChild(inputHidden2);

    return contenuto;

}



// funzione che crea il popup
function creaPopUp(tipo,id,value){

    // se e' gia presente il popup termino
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
        case "Nome":
            var contenuto = ModificaNome(id,value);
            break;
        case "cittaPrCap":
            var contenuto = ModificaCitta(id,value);
            break;
        case "indirizzo":
            var contenuto = ModificaIndirizzo(id,value);
            break;
        case "Foto":
            var contenuto = ModificaFoto(id);
            break;
        case "Password":
            var contenuto = ModificaPassword(id);
            break;
        case "Telefono":
            var contenuto = ModificaTelefono(id);
            break;
        case "Descrizione":
            var contenuto = ModificaDescrizione(id,value);
            break;
        case "Orari":
            var contenuto = ModificaOrari(id,value);
            break;
        case "ModificaAuto":
            var contenuto = ModificaAuto(id,value);
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
    // inseriso il popup nel main
    document.getElementsByTagName('main')[0].appendChild(popup);
    
}

/* funzioni onclick/onblur/onsubmit *******************************/
function closePopup(){
    var popup = document.getElementById(POPUP_ID);
    if(popup == null){
        return;
    }
    document.getElementsByTagName('main')[0].removeChild(popup);
}


function controlloCitta(value){
    
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
        avvisi.textContent = "Città non valida";
        return false; 
    }else{
        return true;
    }
}


function controlloProv(value){
    
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
        avvisi.textContent = "Provincia non valida";
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

