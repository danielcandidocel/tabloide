
<?php

class templateController extends controller {
    public function getLayout() {
        $f = new funcao();
       
        $dados = $f->getNomeLayout();
        echo json_encode($dados);
        
        exit;
    }       
}