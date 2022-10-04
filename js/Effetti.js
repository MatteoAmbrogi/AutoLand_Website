// funzione per mostrare il numero di telefono quando premo il bottone
function mostraNumero(){
    document.getElementById("Mostra_Numero").style.display = "none";
    document.getElementById("Numero").style.display = "block";
}

// funzioni del login in index.php
function SelezionaUtente(){

    // modifica dello stile della pagina e dei vari elementi di testo
    var buttonUtente = document.getElementById("Utente");
    buttonUtente.className = "utente_pressed";

    var buttonConcessionaria = document.getElementById("Concessionaria");
    buttonConcessionaria.className = "unpressed";

    var contenitore = document.getElementById("contenitore");
    contenitore.style.background = "white";

    var registrazione = document.getElementById("registrazione");
    registrazione.textContent = "Registrati";
    registrazione.href = "./php/registrazione/registrazione_utente.php";

    var tipoAccesso = document.getElementById("tipoAccesso");
    tipoAccesso.value = "utente";
}

function SelezionaConcessionario(){

    // modifica dello stile della pagina e dei vari elementi di testo
    var buttonUtente = document.getElementById("Utente");
    buttonUtente.className = "unpressed";

    var buttonConcessionaria = document.getElementById("Concessionaria");
    buttonConcessionaria.className = "concessionaria_pressed";

    var contenitore = document.getElementById("contenitore");
    contenitore.style.background = "rgba(255, 251, 211, 0.918)";

    var registrazione = document.getElementById("registrazione");
    registrazione.textContent = "Registra la tua concessionaria";
    registrazione.href = "./php/registrazione/registrazione_concessionaria.php";

    var tipoAccesso = document.getElementById("tipoAccesso");
    tipoAccesso.value = "concessionaria";
}