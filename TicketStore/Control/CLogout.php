<?php


class CLogout {
    
    public function getLogout() {
        $sessione = USingleton::getInstance('USession');
        $sessione->distruggiSessioneCookie();
        $view = USingleton::getInstance('View');
        $view->set_html_logout();
    }

}
