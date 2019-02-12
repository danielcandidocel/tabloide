<?php

class homeController extends controller {
    public function index() {
        $dados = array();
        if(isset($_SESSION['xmlLogin']) && !empty($_SESSION['xmlLogin'])){
        global $config;
        
        $ip = $_SERVER['REMOTE_ADDR'];
        //função para derrubar o usuario logado em outra maquina
        // if($u->getIpUser($ip, $_SESSION['xmlLogin'])){
        //     unset($_SESSION['xmlLogin']);
        //     header("Location: ".BASE_URL); 
        // }
        
        
        $this->loadTemplate('painel', $dados);
        
        } else {
            $this->loadTemplate('login', $dados);
        }
    } 
    
   
    }


