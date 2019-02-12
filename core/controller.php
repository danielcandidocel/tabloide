<?php

class controller {
    public function loadView($viewName, $viewData = array()) {
        
        extract($viewData);//extract transforma o item do array(ex $dados['modelo']) em uma variavel {$modelo}, assim pode usar o nome da variavel no view
        require 'views/'.$viewName.'.php';
    }   
    
    public function loadTemplate($viewName, $viewData = array()){
        require 'views/template.php';//carrega o template onde fica o head e footer do site.
    }
    
    public function loadViewinTemplate($viewName, $viewData = array()){
        extract($viewData);
        require 'views/'.$viewName.'.php';//carrega o view dentro do tamplate
    }
}
