function CarDashboard(){}

// funzione per eliminare il contenuto
CarDashboard.removeContent = 
	function(){
		var dashboardElement = document.getElementById("carDashboard");
		if (dashboardElement === null)
			return;
		
		var firstChild = dashboardElement.firstChild;
		// elimino l'elemento <ul>
		if (firstChild !== null)
			dashboardElement.removeChild(firstChild);

	}

// funzioni per l'aggiornamento delle frecce di navigazione 
CarDashboard.updatePage =
	function(currentPage, endPage){
		var currentPageElem = document.getElementById("currentPage");
		currentPageElem.textContent = currentPage;

		var previus = document.getElementById("previus");
		if(currentPage == 1){
			previus.disabled = true;
		}else{
			previus.disabled = false;
		}

		var next = document.getElementById("next");
		if(endPage){
			next.disabled = true;
		}else{
			next.disabled = false;
		}
	}

// caso in cui l'utente non ha auto preferite
CarDashboard.setEmptyDashboardPreferiti = 
	function(){
		CarDashboard.removeContent();
		var warningDivElem = document.createElement("div");
		warningDivElem.setAttribute("class", "warningPreferiti");
		var warningSpanElem = document.createElement("span");
		warningSpanElem.textContent = "Non ci sono auto preferite";
		
		warningDivElem.appendChild(warningSpanElem);
		document.getElementById("carDashboard").appendChild(warningDivElem);
		
	}

// caso in cuoi non vengono trovate auto nel database
CarDashboard.setEmptyDashboard = 
	function(){
		CarDashboard.removeContent();
		var warningDivElem = document.createElement("div");
		warningDivElem.setAttribute("class", "warning");
		var warningSpanElem = document.createElement("span");
		warningSpanElem.textContent = "Non ci sono auto da caricare!";
		
		warningDivElem.appendChild(warningSpanElem);
		document.getElementById("carDashboard").appendChild(warningDivElem);
		
	}



// funzione che crea i riquadri delle auto
CarDashboard.refreshData =
	function(data, type, isConcessionaria){
		CarDashboard.removeContent();
		
		// crea la lista (tag <ul></ul>)
		var newCarListElem = CarDashboard.createCarListElement();
		
		// crea gli elementi (tag '<li></li>')
		for (var i = 0; i < data.length; i++){
			var carItemElem = CarDashboard.createCarItemElement(data[i], type, isConcessionaria);
			newCarListElem.appendChild(carItemElem);
		}		
		
		document.getElementById("carDashboard").appendChild(newCarListElem);
			
	}

// creazione della lista <ul>
CarDashboard.createCarListElement = 
	function(){
		var carListElem = document.createElement("ul");
		carListElem.setAttribute("id", "posterCarList");
		carListElem.setAttribute("class", "poster_Cars_list");
		
		return carListElem;
	}

// creazione dell'elemento <li>
CarDashboard.createCarItemElement = 	
	function(currentData, type, isConcessionaria){
		var carItemLi = document.createElement("li");
		
		carItemLi.setAttribute("id", "car_item_" + currentData.codAuto);
		carItemLi.setAttribute("class", "main item");
		
		carItemLi.appendChild(CarDashboard.createPosterElement(currentData, type, isConcessionaria));
		carItemLi.appendChild(CarDashboard.createInfoCarElement(currentData,type,isConcessionaria));
		
		return carItemLi; 
	}

// creazione della div contenente la foto
CarDashboard.createPosterElement = 
	function(currentData, type, isConcessionaria){

		var posterDivElem = document.createElement("div");
		posterDivElem.setAttribute("class", "poster_car_item");

		var posterLinkElem = document.createElement("a");
		posterLinkElem.setAttribute("href" , "./dettagliAuto.php?codAuto=" + currentData.codAuto);

		var posterImgElem = new Image();
		posterImgElem.alt = "poster";
		posterImgElem.src = currentData.posterUrl;
		
		posterLinkElem.appendChild(posterImgElem);
		
		// creazione del bottone preferiti
		var button = document.createElement('button');
		button.className = "bottonePreferiti"+" _"+currentData.isPreferito;
		button.id = "buttonCar"+currentData.codAuto;
		button.setAttribute('onclick', "prefetitiHandler.prefer("+currentData.codAuto+","+type+")");
		var immaginePreferiti = new Image();
		immaginePreferiti.alt = "preferiti";
		immaginePreferiti.id = "buttonCarImg"+currentData.codAuto;
		immaginePreferiti.src = "./../css/img/stella" + currentData.isPreferito + ".svg";
		
		
		button.appendChild(immaginePreferiti);
		
		// se ho fatto l'accesso come utente mostro il bottone preferiti
		if(isConcessionaria == "false"){
			posterDivElem.appendChild(button);
		}

		posterDivElem.appendChild(posterLinkElem);
		
		return posterDivElem;

	}


// creazione della div contenente le informazioni dell'auto
CarDashboard.createInfoCarElement = 
	function(currentData,type,isConcessionaria){
		
		var infoCarDivElem = document.createElement("div");
		infoCarDivElem.setAttribute("class", "div_info_car_item");


		infoCarDivElem.appendChild(CarDashboard.createTitleCarElement(currentData));
		infoCarDivElem.appendChild(CarDashboard.createSubtitleCarElement(currentData));
		infoCarDivElem.appendChild(CarDashboard.createDetailsCarElement(currentData));

		// se ho fatto l'accesso come concessionaria e sono nella pagina dell'account allora creo i bottoni di modifica e eliminazione
		if(isConcessionaria == "true" && type == 1){
			infoCarDivElem.appendChild(CarDashboard.createButton(currentData));
		}

		return infoCarDivElem;
	
	}

// div titolo e prezzo
CarDashboard.createTitleCarElement = 
	function(currentData){

		// modifico il prezzo mettendo il punto separatore
		var oldPrezzo = currentData.prezzo;
		oldPrezzo = oldPrezzo.toString();
		var newPrezzo = oldPrezzo.substring(0,oldPrezzo.length-3) + '.' + oldPrezzo.slice(-3);


		var titleCarDivElem = document.createElement("div");
		titleCarDivElem.setAttribute("class", "div_title_car_item");

		var titleCarLinkElem = document.createElement("a");
		titleCarLinkElem.setAttribute("href", "./dettagliAuto.php?codAuto=" + currentData.codAuto);
		titleCarLinkElem.setAttribute("class", "link_title_car_item");
		titleCarLinkElem.textContent = currentData.casaProduttrice + " " + currentData.nomeModello;

		var prezzoCar = document.createElement("div");
		prezzoCar.setAttribute("class", "prezzo_car_item");
		prezzoCar.textContent = newPrezzo + " 	€";
		
		
		titleCarDivElem.appendChild(titleCarLinkElem);
		titleCarDivElem.appendChild(prezzoCar);

		return titleCarDivElem;

	}

// nome concessionaria e div nuovo/usato
CarDashboard.createSubtitleCarElement = 
	function(currentData){

		var subtitleCarDivElem = document.createElement("div");
		subtitleCarDivElem.setAttribute("class", "div_subtitle_car_item");

		var subtitleCarLinkElem = document.createElement("a");
		subtitleCarLinkElem.setAttribute("href", "./dettagliConcessionaria.php?codConcessionaria=" + currentData.codConcessionaria);
		subtitleCarLinkElem.setAttribute("class", "link_subtitle_car_item");
		subtitleCarLinkElem.textContent = currentData.nomeConcessionaria;

		var nuovo_usatoElem = document.createElement("div");
		nuovo_usatoElem.setAttribute("class", "nuovo_usato_car_item");
		if(currentData.isNew == 1){
			nuovo_usatoElem.textContent = "Nuovo";
		} else if(currentData.isNew == 0){
			nuovo_usatoElem.textContent = "Usato";
		}


		subtitleCarDivElem.appendChild(subtitleCarLinkElem);
		subtitleCarDivElem.appendChild(nuovo_usatoElem);

		return subtitleCarDivElem;
	}

// div dettagli auto
CarDashboard.createDetailsCarElement = 
	function(currentData){


		var detailsCarDivElem = document.createElement("div");
		detailsCarDivElem.setAttribute("class", "details_car_item");

		var dettagli;

		if(currentData.isNew == 1){

			dettagli = currentData.tipoCarburante + " • " + currentData.cavalli + 
			" CV" + " • " + "Cambio " + currentData.cambio + " " + currentData.marce + 
			" • " + currentData.numPorte + " Porte" + " • " + currentData.classeEmissione;

		}else if(currentData.isNew == 0){

			// modifico i km mettendo il punto separatore
			var oldKm = currentData.totKm;
			if(oldKm.length > 3){
				oldKm = oldKm.toString();
			var newKm = oldKm.substring(0,oldKm.length-3) + '.' + oldKm.slice(-3);
			}else{
				var newKm = oldKm;
			}
			
			
			dettagli = currentData.anno + " • " + newKm + " km" + 
			" • " + currentData.tipoCarburante + " • " + currentData.cavalli + 
			" CV" + " • " + "Cambio " + currentData.cambio + " " + currentData.marce;

		}

		detailsCarDivElem.textContent = dettagli;

		return detailsCarDivElem;
	}

// bottone elimina e modifica auto
CarDashboard.createButton =
	function(currentData){

		var divButton = document.createElement('div');
		divButton.className = "BottoniModifica";

		var BottoneElimina = document.createElement('button');
		BottoneElimina.className = "bottone elimina_auto";
		BottoneElimina.innerHTML = "Elimina";
		BottoneElimina.onclick = function() {EliminaAuto.elimina(currentData.codAuto,currentData.codConcessionaria)};

		var BottoneModifica = document.createElement('button');
		BottoneModifica.className = "bottone modifica_auto";
		BottoneModifica.innerHTML = "Modifica";
		BottoneModifica.onclick = function() {creaPopUp("ModificaAuto", currentData.codAuto,currentData)};

		divButton.appendChild(BottoneElimina);
		divButton.appendChild(BottoneModifica);

		return divButton;

	}


// funzione per aggiornare dinamicamente con ajax il bottone preferiti
CarDashboard.updatePreferiti = 
	function(data){
		if(document.getElementById("buttonCar" + data.codAuto) === null){
			return;
		}

		var buttonCar = document.getElementById("buttonCar" + data.codAuto);
		buttonCar.className = "bottonePreferiti"+" _"+data.isPreferito;

		var immaginePreferiti = document.getElementById("buttonCarImg"+data.codAuto);
		immaginePreferiti.src = "./../css/img/stella" + data.isPreferito + ".svg";

	}