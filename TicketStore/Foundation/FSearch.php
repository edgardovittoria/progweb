<?php


class FSearch extends FDBmanager {
    
    public function searchNome($nome_cercato) {
        $nome_cercato = $nome_cercato."%";
       
        $sql = "SELECT * FROM evento_spec_mirror WHERE nome LIKE  ?";
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(1, $nome_cercato);
        $statement->execute();
        
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
        
    }
    
public function loadconcspettsport($tipo) {
        $sql = "SELECT * FROM evento_spec WHERE tipo = ?";
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(1, $tipo);
        $statement->execute();
        
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $rows;
        
        
    }
}
