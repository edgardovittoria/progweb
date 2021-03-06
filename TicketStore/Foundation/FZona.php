<?php


class FZona extends FDBmanager {
    
    public function storeZona(ELuogo $luogo, $i = 0) {
    $indirizzo = $luogo->getCitta().", ".$luogo->getStruttura();
    $sql = "INSERT INTO zona VALUES (?,?,?)";
    $statement = $this->connection->prepare($sql);
    
    $statement->bindParam(1, $nome);
    $statement->bindParam(2, $indirizzo);
    $statement->bindParam(3, $capacita);
    
    $nome = $luogo->getZonaSingola($i)->getNome();
    $capacita = $luogo->getZonaSingola($i)->getCapacita();
    

    $stored = $statement->execute();

    return $stored;
    
    }
    public function existZona(ELuogo $luogo,$i=0) {
    $indirizzo = $luogo->getCitta().", ".$luogo->getStruttura();    
    $nome = $luogo->getZonaSingola($i)->getNome();
    
    $sql = "SELECT nome FROM zona WHERE nome = ? AND indirizzo = ? ";
    $statement = $this->connection->prepare($sql);
    $statement->bindParam(1, $nome);
    $statement->bindParam(2, $indirizzo);
    $statement->execute();
    $result = $statement->fetchAll();
    return count($result) > 0;
}

}
