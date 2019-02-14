<?php

class usuariosController extends controller {
    
   public function logout() {
        unset($_SESSION['tbLogin']);
        header("Location: ".BASE_URL);        
    }
    public function login() {   
        $dados = array();
        $f = new funcao();
        
        if(isset($_POST['name']) && !empty ($_POST['name']) && isset($_POST['senha']) && !empty ($_POST['senha'])) {
            $login = addslashes($_POST['name']);
            $senha = addslashes($_POST['senha']);              
                //verifyUser-> verifica o login do usuario
                if($f->verifyUser($login, $senha)) {
                    //getUser -> seleciona o id e nome do usuario após logar
                    $dados['user'] = $f->getUser($login, $senha);
                    $_SESSION['tbLogin'] = $dados['user']['id'];
                    //getDadosUser -> seleciona as informações do usuario
                    $dados['dadosUser'] = $f->getDadosUser($_SESSION['tbLogin']);                
                   
                        
                        $ip = $_SERVER['REMOTE_ADDR'];
                        $f->setIpUser($ip, $_SESSION['tbLogin']);
                        header("Location: ".BASE_URL);  
                    
                   
                    }  else {
                        $dados['erroLogin'] = "Login e/ou Senha Incorretos.";
                        $this->loadTemplateLogin('login', $dados); 
                    }  
                } else {
                 
                    $dados['erroLogin'] = "Preencha Todos os Campos.";
                    $this->loadTemplateLogin('login', $dados);           
                }        
        }
        public function perfil() {
        $dados = array();

        $this->loadTemplate('usuarios', $dados);
 }
}

   