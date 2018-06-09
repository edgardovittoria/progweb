<?php


class EEvento {
    
    //attributi
    public $id; //string
    public $img; //string
    public $nome; //string
    public $eventi = []; //EEventoSpecifico 

    public function __construct($id,$img,$nome,$eventi) {
        $this->id = $id;
        $this->img = $img;
        $this->nome = $nome;
        $this->eventi = $eventi;
    }
    function getId() {
        return $this->id;
    }
    
    function getImg() {
        return $this->img;
    }

    function getNome() {
        return $this->nome;
    }

    function getEventi() { //oppure si passa l'ordine nell'argomento
        return $this->eventi;
    }
    
    function getEventoSingolo($index) {
        return $this->eventi[$index];
    }
 


}

