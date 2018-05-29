<?php


class EUtente_Reg extends EUtente{
    
    //attributi
    private $mail;
    private $password;
    
    //metodi
    public function __construct($nome, $cognome, $mail, $password) {
        parent::__construct($nome, $cognome);
        $this->mail = $mail;
        $this->password = $password;
        }
    
    public function getMail() {
        return $this->mail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function pagaOrdine() { //assumiamo che abbia i soldi...
        $ordine = USingleton::getInstance('EOrdine');
        $db = USingleton::getInstance('FDBmanager');
        //facciamo lo store dell'ordine nel db
        $db->store($ordine);
        $ordine->setPagato();       
    }
}