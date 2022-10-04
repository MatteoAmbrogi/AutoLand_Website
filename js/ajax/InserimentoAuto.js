function InserimentoAuto(){}

InserimentoAuto.DEFAUL_METHOD = "POST";
InserimentoAuto.URL_REQUEST = "./ajax/InserimentoAuto.php";
InserimentoAuto.ASYNC_TYPE = true;

InserimentoAuto.SUCCESS_RESPONSE = "0";

InserimentoAuto.usato = false;


// funzioni ajax


InserimentoAuto.aggiungi = 
    function(){

        // prelevo tutti i dati dalla form e li invio con ajax  
        var formData = new FormData();

        formData.append("produttore", document.getElementById("produttore").value);
        formData.append("NomeModello",document.getElementById("NomeModello").value);
        formData.append("Cilindrata",document.getElementById("Cilindrata").value);
        formData.append("Cavalli",document.getElementById("Cavalli").value);
        formData.append("Cilindri",document.getElementById("Cilindri").value);
        formData.append("Cambio",document.getElementById("Cambio").value);
        formData.append("Marce",document.getElementById("Marce").value);
        formData.append("Posti",document.getElementById("Posti").value);
        formData.append("Porte",document.getElementById("Porte").value);
        formData.append("Bagagliaio",document.getElementById("Bagagliaio").value);
        formData.append("Peso",document.getElementById("Peso").value);
        formData.append("Lunghezza",document.getElementById("Lunghezza").value);
        formData.append("Larghezza",document.getElementById("Larghezza").value);
        formData.append("Altezza",document.getElementById("Altezza").value);
        formData.append("TipoCarburante",document.getElementById("TipoCarburante").value);
        formData.append("Serbatoio",document.getElementById("Serbatoio").value);
        formData.append("Velocita",document.getElementById("Velocita").value);
        formData.append("ConsumoUrbano",document.getElementById("ConsumoUrbano").value);
        formData.append("ConsumoExtraurbano",document.getElementById("ConsumoExtraurbano").value);
        formData.append("ConsumoMisto",document.getElementById("ConsumoMisto").value);
        formData.append("Emissione",document.getElementById("Emissione").value);

        formData.append("FotoAuto",document.getElementById("FotoAuto").files[0]);


        if(document.getElementById("commerciale").checked){
            var commerciale = 1;
        }else{
            var commerciale = 0;
        }
        formData.append("commerciale", commerciale);
        
        if(document.getElementById("elettrico").checked){
            var elettrico = 1;
        }else{
            var elettrico = 0;
        }
        formData.append("elettrico", elettrico);

        formData.append("prezzo",document.getElementById("prezzo").value);
        formData.append("CodConcessionaria",document.getElementById("CodConcessionaria").value);


        if(document.getElementById("nuovo").checked){
            formData.append("nuovoUsato", 1);
        }else{
            formData.append("nuovoUsato",0);
            formData.append("PaeseOrigine",document.getElementById("PaeseOrigine").value);
            formData.append("Anno",document.getElementById("Anno").value);
            formData.append("totKm",document.getElementById("totKm").value);
            formData.append("Targa",document.getElementById("Targa").value);
            formData.append("UltimaManutenzione",document.getElementById("UltimaManutenzione").value);
            formData.append("ProprietariPrec",document.getElementById("ProprietariPrec").value);
        }
        





        var url = InserimentoAuto.URL_REQUEST;
        var responseFunction = InserimentoAuto.onAjaxResponse;

        AjaxManager.performAjaxRequest(InserimentoAuto.DEFAUL_METHOD, 
                                        url, InserimentoAuto.ASYNC_TYPE, 
                                        formData, responseFunction);


       
    }

InserimentoAuto.onAjaxResponse = 
    function(response){
        // torno alla pagina precedente dopo l'inserimento
        if(response.responseCode === InserimentoAuto.SUCCESS_RESPONSE){
            window.location.replace("accountConcessionaria.php");
        }
    }

// funzioni per la visualizzazione
InserimentoAuto.mostraUsato = 
    function(){

        InserimentoAuto.usato = true;
        document.getElementById("avvisi1").innerHTML = "";

        var sottotitolo = document.createElement('div');
        sottotitolo.className = "sottotitolo";
        sottotitolo.innerHTML = "Informazioni Usato:";
    
        var div2 = document.createElement('div');
        div2.className = "div2";
    
        var PaeseOrigine = document.createElement('div');
        PaeseOrigine.className = "input-box";
        var span = document.createElement('span');
        span.className = "dettagli";
        span.textContent = "Paese di origine";
        var input = document.createElement('input');
        input.type = "text";
        input.name = "PaeseOrigine";
        input.id = "PaeseOrigine";
        input.placeholder = "Paese di orignine";
        input.required = true;
        input.setAttribute("onblur", "InserimentoAuto.controlloPaeseOrigine()");
        var divAvvisiPaese = document.createElement('div');
        divAvvisiPaese.className = "avvisi";
        divAvvisiPaese.id = "avvisiPaeseOrigine";
        PaeseOrigine.appendChild(span);
        PaeseOrigine.appendChild(input);
        PaeseOrigine.appendChild(divAvvisiPaese);
        div2.appendChild(PaeseOrigine);
    
        var Anno = document.createElement('div');
        Anno.className = "input-box";
        var span1 = document.createElement('span');
        span1.className = "dettagli";
        span1.textContent = "Anno";
        var input1 = document.createElement('input');
        input1.type = "text";
        input1.name = "Anno";
        input1.id = "Anno";
        input1.placeholder = "Anno";
        input1.pattern = "\\d{4}";
        input1.required = true;
        input1.setAttribute("onblur", "InserimentoAuto.controlloAnno()");
        var divAvvisiAnno = document.createElement('div');
        divAvvisiAnno.className = "avvisi";
        divAvvisiAnno.id = "avvisiAnno";
        Anno.appendChild(span1);
        Anno.appendChild(input1);
        Anno.appendChild(divAvvisiAnno);
        div2.appendChild(Anno);
    
        var totKm = document.createElement('div');
        totKm.className = "input-box";
        var span2 = document.createElement('span');
        span2.className = "dettagli";
        span2.textContent = "Chilometraggio";
        var input2 = document.createElement('input');
        input2.type = "text";
        input2.name = "totKm";
        input2.id = "totKm";
        input2.placeholder = "km";
        input2.pattern = "\\d*";
        input2.required = true;
        input2.setAttribute("onblur","InserimentoAuto.controllototKm()");
        var divAvvisitotKm = document.createElement('div');
        divAvvisitotKm.className = "avvisi";
        divAvvisitotKm.id = "avvisitotKm";
        totKm.appendChild(span2);
        totKm.appendChild(input2);
        totKm.appendChild(divAvvisitotKm);
        div2.appendChild(totKm);
    
        var Targa = document.createElement('div');
        Targa.className = "input-box";
        var span3 = document.createElement('span');
        span3.className = "dettagli";
        span3.textContent = "Targa";
        var input3 = document.createElement('input');
        input3.type = "text";
        input3.name = "Targa";
        input3.id = "Targa";
        input3.placeholder = "AA000AA";
        input3.pattern = "[A-Z]{2}[0-9]{3}[A-Z]{2}";
        input3.required = true;
        input3.setAttribute("onblur","InserimentoAuto.controlloTarga()");
        var divAvvisiTarga = document.createElement('div');
        divAvvisiTarga.className = "avvisi";
        divAvvisiTarga.id = "avvisiTarga";
        Targa.appendChild(span3);
        Targa.appendChild(input3);
        Targa.appendChild(divAvvisiTarga);
        div2.appendChild(Targa);
    
        var UltimaManutenzione = document.createElement('div');
        UltimaManutenzione.className = "input-box";
        var span4 = document.createElement('span');
        span4.className = "dettagli";
        span4.textContent = "Ultima Manutenzione";
        var input4 = document.createElement('input');
        input4.type = "date";
        input4.name = "UltimaManutenzione";
        input4.id = "UltimaManutenzione";
        input4.required = true;
        input4.setAttribute("onblur", "InserimentoAuto.controlloUltimaManutenzione()");
        var divAvvisiUltimaManutenzione = document.createElement('div');
        divAvvisiUltimaManutenzione.className = "avvisi";
        divAvvisiUltimaManutenzione.id = "avvisiUltimaManutenzione";
        UltimaManutenzione.appendChild(span4);
        UltimaManutenzione.appendChild(input4);
        UltimaManutenzione.appendChild(divAvvisiUltimaManutenzione);
        div2.appendChild(UltimaManutenzione);
    
        var ProprietariPrec = document.createElement('div');
        ProprietariPrec.className = "input-box";
        var span5 = document.createElement('span');
        span5.className = "dettagli";
        span5.textContent = "Proprietari Precedenti";
        var input5 = document.createElement('input');
        input5.type = "text";
        input5.name = "ProprietariPrec";
        input5.id = "ProprietariPrec";
        input5.placeholder = "Proprietari Precedenti";
        input5.pattern = "\\d*";
        input5.required = true;
        input5.setAttribute("onblur","InserimentoAuto.controlloProprietariPrec()");
        var divAvvisiProprietariPrec = document.createElement('div');
        divAvvisiProprietariPrec.className = "avvisi";
        divAvvisiProprietariPrec.id = "avvisiProprietariPrec";
        ProprietariPrec.appendChild(span5);
        ProprietariPrec.appendChild(input5);
        ProprietariPrec.appendChild(divAvvisiProprietariPrec);
        div2.appendChild(ProprietariPrec);
    
    
        document.getElementById("infoUsato").appendChild(sottotitolo);
        document.getElementById("infoUsato").appendChild(div2);
    
    }


InserimentoAuto.mostraNuovo = 
    function(){

        InserimentoAuto.usato = false;
        document.getElementById("avvisi1").innerHTML = "";

        var Usatodiv = document.getElementById("infoUsato");
        
        while(Usatodiv.hasChildNodes()){
            Usatodiv.removeChild(Usatodiv.lastChild);
        }
    
    }

InserimentoAuto.goBack = 
    function(){
        window.history.go(-1);
        return true;
    }


// funzioni di controllo dati in input
InserimentoAuto.controlloNuovoUsato = 
    function(){
        var n = document.getElementById("nuovo");
        var u = document.getElementById("usato");

        if(!n.checked && !u.checked){
            document.getElementById("avvisi1").innerHTML = "Selezionare Nuovo o Usato";
            return false;
        }else{
            return true;
        }
    }
InserimentoAuto.controlloPrezzo =
    function(){
        var value = document.getElementById("prezzo").value;
        if(value == ""){
            document.getElementById("avvisi2").innerHTML = "Inserire il Prezzo";
            document.getElementById("prezzo").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]{4,}$/;
        if(!pattern.test(value)){
            document.getElementById("avvisi2").innerHTML = "Prezzo con minimo 4 cifre";
            document.getElementById("prezzo").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisi2").innerHTML = "";
            document.getElementById("prezzo").style.borderColor = "";
            return true;
        }
    }

InserimentoAuto.controlloNome = 
    function(){
        var value = document.getElementById("NomeModello").value;
        if(value == ""){
            document.getElementById("avvisiNome").innerHTML = "Inserire Nome";
            document.getElementById("NomeModello").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiNome").innerHTML = "";
            document.getElementById("NomeModello").style.borderColor = "";
            return true;
        }
    }

InserimentoAuto.controlloFoto = 
    function(){
        var value = document.getElementById("FotoAuto").value;

        if(value == ""){
            document.getElementById("avvisiFoto").innerHTML = "Inserire Foto";
            document.getElementById("FotoAuto").style.borderColor = "red";
            return false;
        }

        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(value)) {
            document.getElementById("avvisiFoto").innerHTML = "Tipo del file non valido";
            document.getElementById("FotoAuto").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiFoto").innerHTML = "";
            document.getElementById("FotoAuto").style.borderColor = "";
            return true;
        }


    }

InserimentoAuto.controlloCilindrata = 
    function(){
        var value = document.getElementById("Cilindrata").value;

        if(value == ""){
            document.getElementById("avvisiCilindrata").innerHTML = "Inserire la Cilindrata";
            document.getElementById("Cilindrata").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiCilindrata").innerHTML = "Solo numeri ammessi";
            document.getElementById("Cilindrata").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiCilindrata").innerHTML = "";
            document.getElementById("Cilindrata").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloCavalli = 
    function(){
        var value = document.getElementById("Cavalli").value;

        if(value == ""){
            document.getElementById("avvisiCavalli").innerHTML = "Inserire Cavalli";
            document.getElementById("Cavalli").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiCavalli").innerHTML = "Solo numeri ammessi";
            document.getElementById("Cavalli").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiCavalli").innerHTML = "";
            document.getElementById("Cavalli").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloCilindri = 
    function(){
        var value = document.getElementById("Cilindri").value;

        if(value == ""){
            document.getElementById("avvisiCilindri").innerHTML = "Inserire Cilindri";
            document.getElementById("Cilindri").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiCilindri").innerHTML = "Solo numeri ammessi";
            document.getElementById("Cilindri").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiCilindri").innerHTML = "";
            document.getElementById("Cilindri").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloMarce = 
    function(){
        var value = document.getElementById("Marce").value;

        if(value == ""){
            document.getElementById("avvisiMarce").innerHTML = "Inserire Marce";
            document.getElementById("Marce").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiMarce").innerHTML = "Solo numeri ammessi";
            document.getElementById("Marce").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiMarce").innerHTML = "";
            document.getElementById("Marce").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloPosti = 
    function(){
        var value = document.getElementById("Posti").value;

        if(value == ""){
            document.getElementById("avvisiPosti").innerHTML = "Inserire numero posti";
            document.getElementById("Posti").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiPosti").innerHTML = "Solo numeri ammessi";
            document.getElementById("Posti").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiPosti").innerHTML = "";
            document.getElementById("Posti").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloPorte = 
    function(){
        var value = document.getElementById("Porte").value;

        if(value == ""){
            document.getElementById("avvisiPorte").innerHTML = "Inserire numero porte";
            document.getElementById("Porte").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiPorte").innerHTML = "Solo numeri ammessi";
            document.getElementById("Porte").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiPorte").innerHTML = "";
            document.getElementById("Porte").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloBagagliaio = 
    function(){
        var value = document.getElementById("Bagagliaio").value;

        if(value == ""){
            document.getElementById("avvisiBagagliaio").innerHTML = "Inserire litri bagagliaio";
            document.getElementById("Bagagliaio").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiBagagliaio").innerHTML = "Solo numeri ammessi";
            document.getElementById("Bagagliaio").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiBagagliaio").innerHTML = "";
            document.getElementById("Bagagliaio").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloPeso = 
    function(){
        var value = document.getElementById("Peso").value;

        if(value == ""){
            document.getElementById("avvisiPeso").innerHTML = "Inserire Peso";
            document.getElementById("Peso").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiPeso").innerHTML = "Solo numeri ammessi";
            document.getElementById("Peso").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiPeso").innerHTML = "";
            document.getElementById("Peso").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloLunghezza = 
    function(){
        var value = document.getElementById("Lunghezza").value;

        if(value == ""){
            document.getElementById("avvisiLunghezza").innerHTML = "Inserire Lunghezza";
            document.getElementById("Lunghezza").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiLunghezza").innerHTML = "Solo numeri ammessi";
            document.getElementById("Lunghezza").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiLunghezza").innerHTML = "";
            document.getElementById("Lunghezza").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloLarghezza = 
    function(){
        var value = document.getElementById("Larghezza").value;

        if(value == ""){
            document.getElementById("avvisiLarghezza").innerHTML = "Inserire Larghezza";
            document.getElementById("Larghezza").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiLarghezza").innerHTML = "Solo numeri ammessi";
            document.getElementById("Larghezza").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiLarghezza").innerHTML = "";
            document.getElementById("Larghezza").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloAltezza = 
    function(){
        var value = document.getElementById("Altezza").value;

        if(value == ""){
            document.getElementById("avvisiAltezza").innerHTML = "Inserire Altezza";
            document.getElementById("Altezza").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiAltezza").innerHTML = "Solo numeri ammessi";
            document.getElementById("Altezza").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiAltezza").innerHTML = "";
            document.getElementById("Altezza").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloSerbatoio = 
    function(){
        var value = document.getElementById("Serbatoio").value;

        if(value == ""){
            document.getElementById("avvisiSerbatoio").innerHTML = "Inserire litri Serbatoio";
            document.getElementById("Serbatoio").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiSerbatoio").innerHTML = "Solo numeri ammessi";
            document.getElementById("Serbatoio").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiSerbatoio").innerHTML = "";
            document.getElementById("Serbatoio").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloVelocita = 
    function(){
        var value = document.getElementById("Velocita").value;

        if(value == ""){
            document.getElementById("avvisiVelocita").innerHTML = "Inserire Velocita";
            document.getElementById("Velocita").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiVelocita").innerHTML = "Solo numeri ammessi";
            document.getElementById("Velocita").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiVelocita").innerHTML = "";
            document.getElementById("Velocita").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloConsumoUrbano = 
    function(){
        var value = document.getElementById("ConsumoUrbano").value;

        if(value == ""){
            document.getElementById("avvisiConsumoUrbano").innerHTML = "Inserire Consumo";
            document.getElementById("ConsumoUrbano").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+[.]?[0-9]?$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiConsumoUrbano").innerHTML = "Rispettare il formato";
            document.getElementById("ConsumoUrbano").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiConsumoUrbano").innerHTML = "";
            document.getElementById("ConsumoUrbano").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloConsumoExtraurbano = 
    function(){
        var value = document.getElementById("ConsumoExtraurbano").value;

        if(value == ""){
            document.getElementById("avvisiConsumoExtraurbano").innerHTML = "Inserire Consumo";
            document.getElementById("ConsumoExtraurbano").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+[.]?[0-9]?$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiConsumoExtraurbano").innerHTML = "Rispettare il formato";
            document.getElementById("ConsumoExtraurbano").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiConsumoExtraurbano").innerHTML = "";
            document.getElementById("ConsumoExtraurbano").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloConsumoMisto = 
    function(){
        var value = document.getElementById("ConsumoMisto").value;

        if(value == ""){
            document.getElementById("avvisiConsumoMisto").innerHTML = "Inserire Consumo";
            document.getElementById("ConsumoMisto").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+[.]?[0-9]?$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiConsumoMisto").innerHTML = "Rispettare il formato";
            document.getElementById("ConsumoMisto").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiConsumoMisto").innerHTML = "";
            document.getElementById("ConsumoMisto").style.borderColor = "";
            return true;
        }
    }

InserimentoAuto.controlloEmissione = 
    function(){
        var value = document.getElementById("Emissione").value;
        if(value == ""){
            document.getElementById("avvisiEmissione").innerHTML = "Inserire Classe Emissione";
            document.getElementById("Emissione").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiEmissione").innerHTML = "";
            document.getElementById("Emissione").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloPaeseOrigine = 
    function(){
        var value = document.getElementById("PaeseOrigine").value;
        if(value == ""){
            document.getElementById("avvisiPaeseOrigine").innerHTML = "Inserire il Paese di Origine";
            document.getElementById("PaeseOrigine").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiPaeseOrigine").innerHTML = "";
            document.getElementById("PaeseOrigine").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloAnno = 
    function(){
        var value = document.getElementById("Anno").value;

        if(value == ""){
            document.getElementById("avvisiAnno").innerHTML = "Inserire Anno";
            document.getElementById("Anno").style.borderColor = "red";
            return false;
        }

        var pattern = /^\d{4}$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiAnno").innerHTML = "Rispettare il formato";
            document.getElementById("Anno").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiAnno").innerHTML = "";
            document.getElementById("Anno").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controllototKm = 
    function(){
        var value = document.getElementById("totKm").value;

        if(value == ""){
            document.getElementById("avvisitotKm").innerHTML = "Inserire i Km";
            document.getElementById("totKm").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisitotKm").innerHTML = "Rispettare il formato";
            document.getElementById("totKm").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisitotKm").innerHTML = "";
            document.getElementById("totKm").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloTarga = 
    function(){
        var value = document.getElementById("Targa").value;

        if(value == ""){
            document.getElementById("avvisiTarga").innerHTML = "Inserire Targa";
            document.getElementById("Targa").style.borderColor = "red";
            return false;
        }

        var pattern = /^[A-Z]{2}[0-9]{3}[A-Z]{2}$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiTarga").innerHTML = "Rispettare il formato";
            document.getElementById("Targa").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiTarga").innerHTML = "";
            document.getElementById("Targa").style.borderColor = "";
            return true;
        }
    }
InserimentoAuto.controlloUltimaManutenzione = 
    function(){
        var value = document.getElementById("UltimaManutenzione").value;

        if(value == ""){
            document.getElementById("avvisiUltimaManutenzione").innerHTML = "Inserire Data";
            document.getElementById("UltimaManutenzione").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiUltimaManutenzione").innerHTML = "";
            document.getElementById("UltimaManutenzione").style.borderColor = "";
            return true;
        }
    }

InserimentoAuto.controlloProprietariPrec = 
    function(){
        var value = document.getElementById("ProprietariPrec").value;

        if(value == ""){
            document.getElementById("avvisiProprietariPrec").innerHTML = "Inserire Numero";
            document.getElementById("ProprietariPrec").style.borderColor = "red";
            return false;
        }

        var pattern = /^[0-9]+$/;
        if(!pattern.test(value)){
            document.getElementById("avvisiProprietariPrec").innerHTML = "Rispettare il formato";
            document.getElementById("ProprietariPrec").style.borderColor = "red";
            return false;
        }else{
            document.getElementById("avvisiProprietariPrec").innerHTML = "";
            document.getElementById("ProprietariPrec").style.borderColor = "";
            return true;
        }
    }

InserimentoAuto.trySubmit = 
    function(){
        if(InserimentoAuto.controlloNuovoUsato() && InserimentoAuto.controlloPrezzo() && InserimentoAuto.controlloNome() 
        && InserimentoAuto.controlloFoto() && InserimentoAuto.controlloCilindrata() && InserimentoAuto.controlloCavalli()
        && InserimentoAuto.controlloCilindri() && InserimentoAuto.controlloMarce() && InserimentoAuto.controlloPosti()
        && InserimentoAuto.controlloPorte() && InserimentoAuto.controlloBagagliaio() && InserimentoAuto.controlloPeso()
        && InserimentoAuto.controlloLunghezza() && InserimentoAuto.controlloLarghezza() && InserimentoAuto.controlloAltezza()
        && InserimentoAuto.controlloSerbatoio() && InserimentoAuto.controlloVelocita() && InserimentoAuto.controlloConsumoUrbano()
        && InserimentoAuto.controlloConsumoExtraurbano() && InserimentoAuto.controlloConsumoMisto() && InserimentoAuto.controlloEmissione()){
            
            if(InserimentoAuto.usato){
                if(InserimentoAuto.controlloPaeseOrigine() && InserimentoAuto.controlloAnno() && InserimentoAuto.controllototKm()
                && InserimentoAuto.controlloTarga() && InserimentoAuto.controlloUltimaManutenzione() && InserimentoAuto.controlloProprietariPrec() ){
                    InserimentoAuto.aggiungi();
                }
            }else{
                InserimentoAuto.aggiungi();
            }   
            
        }
    }