
<?php

class produtosController extends controller {
    public function listar() {
        $dados = array();
        
        $this->loadTemplate('produtos', $dados);
        
    } 
    
   
    }