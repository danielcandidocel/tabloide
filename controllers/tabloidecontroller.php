<?php

class tabloideController extends controller {
    public function criar() {
        $dados = array();

        $this->loadTemplate('tabloide', $dados);
 }

    public function meustabloides() {
        $dados = array();

        $this->loadTemplate('tabloide', $dados);
 }
 	public function imprimirTabloide($layout){
 		$dados = array();

        $this->loadTemplate('imprimirTabloide', $dados);		
 	}
}