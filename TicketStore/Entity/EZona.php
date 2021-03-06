<?php

class EZona {

	//attributi
	public $nome;
	public $capacita;
	public $posti = []; //array(Posto) 

	//metodi
        public function __construct($nome,$capacita) {
            $this->nome = $nome;
            $this->capacita = $capacita;
            $k = 1;
            $fila = 1;
            while($k < $capacita) {
                for ($i = 1; $i <= 5 && $i<= $capacita; $i++) {
                    $posto = new EPosto($fila,$i);
                    $this->posti[] = $posto;
                    $k++;
                }
                $fila++;
            }
        }
        public function assegnaPosti(EOrdine $ordine, $num) { 
            $db = USingleton::getInstance('FDBmanager');            
            if($num != 0) {
                $result = $db->load($ordine,'posti');
                if(isset($result[0]['fila'])) {
                    $fila = (int) $result[0]['fila'];                
                    $posto = (int) $result[0]['posto'];
                    $assegnati = (($fila - 1) * 5) + $posto;
                    for ($i = 0; $i < $num; $i++) {               
                        $posti[$i] = $this->posti[$assegnati + $i];
                    }
                }else{
                    for ($i = 0; $i < $num; $i++) {               
                        $posti[$i] = $this->posti[$i];
                    }
                }
            }else{
                $posti = array();
            }
            var_dump($posti);
            return $posti;
        }
        
        public function getPostiDisp() {
            $postiDisp = count($this->posti);
            return $postiDisp;
        }
        
        public function confermaPosto() {
            $posto = array_pop($this->posti);
            //roba di database
        }
        
        public function getNome() {
            return $this->nome;
        }
        
        public function getCapacita() {
            return $this->capacita;
        }
}