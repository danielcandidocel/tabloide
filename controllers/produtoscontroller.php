
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

			    			
			$valor = $_POST['produto-valor'];
          	$t1 = str_replace('.', '', $valor);
          	$produtoValor = str_replace(',', '.', $t1);
			

			$produtoQt = $_POST['produto-qt'];
			$produtoLimite = $_POST['produto-limite'];
			$produtoUnidade = $_POST['produto-unidade'];

			$id = $f->cadastrarProsutos($produtoNome, $produtoValor, $produtoQt, $produtoLimite, $produtoUnidade);
    		    		
    		move_uploaded_file($_FILES['imagemProduto']['tmp_name'], 'assets/images/produtos/'.$id.'.png');    		
   		} 			   
        header("Location: ".BASE_URL."produtos/listar");  
        // $this->loadTemplate('produtos', $dados);
    }
    public function excluir(){
    	$f = new funcao();
    	$id = $_POST['id'];
    	$f->excluirProduto($id);
    	return true;
    }
}