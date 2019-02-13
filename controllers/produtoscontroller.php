
<?php

class produtosController extends controller {
    public function listar() {
        $dados = array();
        $f = new funcao();

        $dados['produtos'] = $f->getProdutos();
        $this->loadTemplate('produtos', $dados);
        
    } 
    public function cadastrar(){
    	$dados = array();
    	$f = new funcao();
    	if(isset($_FILES['imagemProduto']['tmp_name']) && !empty($_FILES['imagemProduto']['tmp_name'])){    		
    	$nome = $_FILES['imagemProduto']['name'];
			$t = explode('.', $nome);
			$ext = $t[1];

			$produtoNome = $_POST['produto-nome'];    			
			$produtoValor = $_POST['produto-valor'];
			$produtoQt = $_POST['produto-qt'];
			$produtoLimite = $_POST['produto-limite'];
			$produtoUnidade = $_POST['produto-unidade'];

			$id = $f->cadastrarProsutos($produtoNome, $produtoValor, $produtoQt, $produtoLimite, $produtoUnidade);
    		    		
    		move_uploaded_file($_FILES['imagemProduto']['tmp_name'], 'assets/images/produtos/'.$id.'png');    		
   		} 			   
        
        $this->loadTemplate('produtos', $dados);
    }
}