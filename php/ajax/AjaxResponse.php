<?php

    // classe usata per la risposta da ajax
    class AjaxResponse{
        public $responseCode; // 0 ok / 1  error / -1 avvisi 
        public $message;
        public $isConcessionaria;
        public $data;
        
        
        function AjaxResponse($responseCode = 1, 
                                $message = "Somenthing went wrong! Please try later.",
                                $isConcessionaria = null,
                                $data = null){
            $this->responseCode = $responseCode;
            $this->message = $message;
            $this->isConcessionaria = $isConcessionaria;
            $this->data = null;
        }

    }

    // classe con le informazioni dell'auto
    Class Auto{
        public $codAuto;
        public $nomeModello;
        public $casaProduttrice;
        public $nomeConcessionaria;
        public $isNew;
        public $posterUrl;
        public $tipoCarburante;
        public $cavalli;
        public $cambio;
        public $marce;
        public $anno;
        public $totKm;
        public $numPorte;
        public $classeEmissione;
        public $codConcessionaria;
        public $prezzo;
        public $ultimaManutenzione;
        public $numProprietariPrecedenti;
        public $isPreferito;

        function Auto(  $codAuto = null, 
                        $nomeModello = null,
                        $casaProduttrice =null,
                        $nomeConcessionaria =null,
                        $isNew =null,
                        $posterUrl = null,
                        $tipoCarburante = null,
                        $cavalli = null,
                        $cambio = null,
                        $marce = null,
                        $anno = null,
                        $totKm = null,
                        $numPorte = null,
                        $classeEmissione = null,
                        $codConcessionaria = null,
                        $prezzo = null,
                        $ultimaManutenzione = null,
                        $numProprietariPrecedenti = null,
                        $isPreferito = null
                    ){
            $this->codAuto = $codAuto;
            $this->nomeModello = $nomeModello;
            $this->casaProduttrice = $casaProduttrice;
            $this->nomeConcessionaria = $nomeConcessionaria;
            $this->isNew = $isNew;
            $this->posterUrl = $posterUrl;
            $this->tipoCarburante = $tipoCarburante;
            $this->cavalli = $cavalli;
            $this->cambio = $cambio;
            $this->marce = $marce;
            $this->anno = $anno;
            $this->totKm = $totKm;
            $this->numPorte = $numPorte;
            $this->classeEmissione = $classeEmissione;
            $this->codConcessionaria = $codConcessionaria;
            $this->prezzo = $prezzo;
            $this->ultimaManutenzione = $ultimaManutenzione;
            $this->numProprietariPrecedenti = $numProprietariPrecedenti;
            $this->isPreferito = $isPreferito;
        }
    }

?>