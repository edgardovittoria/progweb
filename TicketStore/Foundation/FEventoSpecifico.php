<?php

class FEventospecifico extends FDBmanager {
    
    public function __construct() {
        parent::__construct();
        
    }


    public function loadDataLuogoPrezzo(EEvento $evento){
        $sql = "SELECT  *"
          ." FROM evento_spec AS es "
          ." WHERE es.cod_evento = ". $this->connection->quote($evento->getCodev());
        $result = $this->connection->query($sql);
        $rows = $result->fetchAll();
    
        return $rows;
    }
    
    public function loadEventoSp($cod_e,$data) {
        $sql = "SELECT * FROM evento_spec WHERE code=".$this->connection->quote($cod_e).
                " AND data_evento=".$this->connection->quote($data);
        $result = $this->connection->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    
    public function loadEventiSp($cod_e) {
        $sql = "SELECT * FROM evento_spec WHERE code=".$this->connection->quote($cod_e);
                
        $result = $this->connection->query($sql);
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function storeeventospec($codes,$data,$luogo,$tipo,$casa,$ospite,$compagnia,$artista) {
    
    $sql = "INSERT INTO evento_spec VALUES (?,?,?,?,?,?,?,?)"; 
    $statement = $this->connection->prepare($sql);
    
    $statement->bindParam(1,$codes);
    $statement->bindParam(2,$data);
    $statement->bindParam(3,$luogo);
    $statement->bindParam(4,$tipo);
    $statement->bindParam(5,$casa);
    $statement->bindParam(6,$ospite);
    $statement->bindParam(7,$compagnia);
    $statement->bindParam(8,$artista);
    
    $result = $statement->execute();
    
    return $result;
        /*$sql = "INSERT INTO evento_spec VALUES(".$this->connection->quote($codes).","
                .$this->connection->quote($data).","
                .$this->connection->quote($luogo).","
                .$this->connection->quote($tipo).","
                .$this->connection->quote($casa).","
                .$this->connection->quote($ospite).","
                .$this->connection->quote($compagnia).","
                .$this->connection->quote($artista).")";
        echo $sql;
        $result = $this->connection->exec($sql);
        return $result;*/
    }
    public function deleteeventospec($codes,$data) {

        $sql = "DELETE FROM evento_spec WHERE code = ".$codes." AND data_evento = ".$data; 
        $result = $this->connection->exec($sql);
        return $result;
    }
    
    public function updateeventospec($codes,$data,$luogo,$tipo,$casa,$ospite,$compagnia,$artista) {
        $sql = "UPDATE evento_spec SET  indirizzo = ?,"
                . " tipo = ?, casa = ?, ospite = ?, compagnia = ?, artista = ?"
                . "WHERE code = ? AND data_evento = ?";
        $statement = $this->connection->prepare($sql);
        
        $statement->bindparam(1,$luogo);
        $statement->bindparam(2,$tipo);
        $statement->bindparam(3,$casa);
        $statement->bindparam(4,$ospite);
        $statement->bindparam(5,$compagnia);
        $statement->bindparam(6,$artista);
        $statement->bindparam(7,$codes);
        $statement->bindparam(8,$data);
        $result = $statement->execute();
        //echo $data;
        return $result;
        
    }
}