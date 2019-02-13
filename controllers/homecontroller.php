
<?php

class homeController extends controller {
    public function index() {
        $dados = array();
        if(isset($_SESSION['tbLogin']) && !empty($_SESSION['tbLogin'])){
        global $config;
        
        $this->loadTemplate('painel', $dados);
        
        } else {
            $this->loadTemplate('login', $dados);
        }
    } 
    
    public function produto(){
    	$dados = array();
    	$this->loadTemplate('produtos', $dados);
    }
   
   public function jornal(){
        $dados = array();
        $this->loadTemplate('tabloide', $dados);
   }
    }


