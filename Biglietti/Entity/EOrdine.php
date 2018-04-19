<?php


class EOrdine {
    
    //attributi
    private $id;
    private $utente;
    private $lista_bigl; //array
    private $data; //DataTime
    private $pagato; //bool
    
    //metodi
    public function __construct($id, $utente, $lista_bigl, $data, $pagato) {
        $this->id = $id;
        $this->utente = $utente;
        $this->lista_bigl = $lista_bigl;
        $this->data = $data;
        $this->pagato = $pagato;
    }
    
    public function addBigl(EBiglietti_Zona $ebz) {
        $this->lista_bigl[] = $ebz;
    }
    
    public function removeBigl(EBiglietti_Zona $ebz) {
        $key = array_search($ebz, $this->lista_bigl);
        array_splice($this->lista_bigl, $key, 1);
    }
    
    public function calcolaPrezzo($lista) {
        for($i=0; $i<count($lista); $i++) {
            $tot = $tot + $lista[i]->getPrezzo();
        }
        return $tot;
    }
    
    public function scegliZona(EEvento $evento) {
        
    }
            
    public function creaBiglietto() {   //$user ?? 
        
    }
    
    public function getId() {
        return $this->id;
    }

    public function getUtente() {
        return $this->utente;
    }

    public function getLista_bigl() {
        return $this->lista_bigl;
    }

    public function getData() {
        return $this->data;
    }

    public function getPagato() {
        return $this->pagato;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUtente($utente) {
        $this->utente = $utente;
    }

    public function setLista_bigl($setLista_bigl) {
        $this->lista_bigl = $setLista_bigl;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function setPagato($pagato) {
        $this->pagato = $pagato;
    }


}
