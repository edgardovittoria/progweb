<?php


class EOrdine {
    
    //attributi
    public $id; //id dell'ordine
    public $code; //string code
    public $nomeEvento; //string 
    public $evento; //EEventoSpecifico
    public $dataAcquisto; //DataTime
    public $utente; //Utente
    public $items = []; //array(Partecipazione)
    public $prezzo_tot;
    public $pagato = false; //bool
    
    //metodi
    public function __construct() {
        
    }
    
    function setPagato($bool) {
        $this->pagato = $bool;
    }
    
    public function addElementi(EPartecipazione $item, $num) {
        for ($i = 0; $i < $num; $i++) {
            $this->items[$i] = $item;
        }
    }
    
    public function rimuoviElemento($p) {
        array_splice($this->items,$p,1);
    }
    
    function getId() {
        return $this->id;
    }
    
    function getCode() {
        return $this->code;
    }
    
    function getEvento() {
        return $this->evento;
    }

    function getData() {
        $result = date_format($this->dataAcquisto, 'Y-m-d H:i:sP');
        return $result;
    }

    function getUtente() {
        return $this->utente;
    }

    function getItems() {
        return $this->items;
    }
    
    function getPrezzo() {
        return $this->prezzo_tot;
    }

    function getPagato() {
        return $this->pagato;
    }
    
    function setId($id) {
        $this->id = $id;
    }

    function setCode($id) {
        $this->code = $id;
    }
    
    function setNomeEvento($nome) {
        $this->nomeEvento = $nome;
    }
    
    function setEvento(EEventoSpecifico $evento) {
        $this->evento = $evento;
    }
    
    function setData() {
        $data = new DateTime(null, new DateTimeZone('Europe/Rome'));
        $this->dataAcquisto = $data;
    }

    function setUtente($utente) {
        $this->utente = $utente;
    }

    function setItems($items) {
        $this->items = $items;
    }
    public function calcolaPrezzo() {
        $tot = 0;
        for($i=0; $i<count($this->items); $i++) {
            $tot = $tot + $this->items[$i]->getPrezzo();
        }
        $this->prezzo_tot = $tot;
    }




}
