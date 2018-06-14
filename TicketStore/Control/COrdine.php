<?php


class COrdine {
    
    public function getOrdine($param) {
        $sessione = USingleton::getInstance('USession');
        $ordine = $sessione->recupera_valore('ordine');
        $posti = $sessione->recupera_valore('posti');
        $ordine->rimuoviElemento($param);
        array_splice($posti, $param, 1);
        
        $sessione->imposta_valore('posti',$posti);        
        $sessione->imposta_valore('ordine',$ordine);
        $control = USingleton::getInstance('CJson');
        $control->getJson('ordine');
    }
    
    public function postOrdine($id_e, $id_esp, $id_part) {
        $sessione = USingleton::getInstance('USession');
        $db = USingleton::getInstance('FDBmanager');
        $ordine = $sessione->recupera_valore('ordine');
        
        $evento_sp = $db->load($id_e, $id_esp);
        $part = $evento_sp->selezionePartecipazione($id_part);
        $num = $_POST['num_bigl'];
                
        $ordine->addElementi($part, $num);
        
        $posti = $part->getPostiAssegnati($num);
        $sessione->imposta_valore('posti',$posti);
        
        $sessione->imposta_valore('ordine',$ordine);
        $view = USingleton::getInstance('VOrdine');
        $view->set_html();
    }
}
