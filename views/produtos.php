<div class="container">
	<div class="titulo-produtos">
  		<h2>Lista de Produtos Cadastrados</h2>     
  		<button onclick="cadastroProduto()" class="btn btn-primary botoes">Cadastrar Produto</button>   
  	</div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Produto</th>
        <th>Nome</th>
        <th>Valor</th>
        <th>Quantidade</th>
        <th>Limite</th>
        <th>Unidade</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($produtos) && !empty($produtos)):
      	foreach ($produtos as $prod):?>      		
      <tr class="tabela-produtos">
        <td><img src="<?php echo BASE_URL.'assets/images/produtos/'.$prod['id'].'.png';?>"></td>
        <td><?php echo $prod['nome'];?></td>
        <td><?php echo 'R$ '.number_format($prod['valor'], 2, ',', '.');?></td>
        <td><?php echo $prod['qt'];?></td>
        <td><?php echo $prod['limite'];?></td>
        <td><?php echo $prod['unidade'];?></td>
        <td><button class="btn btn-danger" onclick="produtoExcluir(<?php echo $prod['id'];?>)">Excluir</button></td>
      </tr>
  <?php endforeach; 
endif;?>
    </tbody>
  </table>
</div>



<!--Modal Cadastro de Produtos-->
<div class="modal fade" role='dialog' id='cadastro' >
<div class="modal-dialog">

    <div class="modal-content" id="modalFotoPerfil">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar Foto do Perfil</h4>
      </div>
      <div class="modal-body">          
          <form id="formProduto" name="formProduto" method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL;?>produtos/cadastrar">
         	<div class="form-group">
         		<div class="col-md-12">
         			<div class="col-md-12">
		         	<label>Imagem do Produto*</label><br>
		          	<img src="<?php echo BASE_URL; ?>assets/images/produtos/produto.png" name="fotoProduto" id="fotoProduto" alt="clique para trocar a imagem"/>
		         	<input type="file" name="imagemProduto" id="imagemProduto" onchange="previewImagem()" style="display:none" />
		         </div>
	         	</div>
          	</div>
      	 	<div class="form-group">
      	 		<div class="col-md-12">
      	 			<div class="col-md-12">
	          		<label>Nome do Produto*</label>
	          		<input type="text" name="produto-nome" class="form-control">
	          		</div>
          		</div>
          	</div>
          	<div class="form-group">
          		<div class="col-md-6">
          		<div class="col-md-12">
          			<label>Valor do Produto*</label>
          		</div>
          		<div class="col-md-8">
          			<input type="text" name="produto-valor" class="form-control" id="valor1">
          		</div>
          		</div>
          		<div class="col-md-6">
      			<div class="col-md-12">
          			<label>Quantidade</label>
          		</div>
          		<div class="col-md-8">
          			<input type="number" name="produto-qt" class="form-control">
          		</div>
          		</div>
          	</div>
          	<div class="form-group">
          		<div class="col-md-6">
          		<div class="col-md-12">
          			<label>Limite</label>
          		</div>
          		<div class="col-md-8">
          			<input type="number" name="produto-limite" class="form-control" id="valor1">
          		</div>
          		</div>
          		<div class="col-md-6">
      			<div class="col-md-12">
          			<label>Unidade</label>
          		</div>
          		<div class="col-md-8">
          			<input type="text" name="produto-unidade" class="form-control">
          		</div>
          		</div>
          	</div>
          	
      </div>
      <div class="modal-footer">
      	<button class="btn btn-primary" onclick="cadastrarProdutos()">Salvar</button>
          <!-- <input type="submit" class="btn btn-primary" value="Salvar" /></form> -->
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </div>

  </div>
</div>
<!--Modal Cadastro de Produtos-->
<div class="modal fade" role='dialog' id='campos' >
<div class="modal-dialog">

    <!-- <div class="modal-content" id="modalFotoPerfil">
      <div class="modal-header">
        
        
      </div> -->
      <div class="modal-body">   

           
	<div class="alert alert-danger">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>       
    	<strong>Alerta!</strong> <br/>
    	<strong id="txtCampos">Preencha Todos os Campos Obrigatórios!</strong>
    	<strong id="imgCampos">Favor Escolha uma Imagem para o Produto.</strong> 
  	</div>

          	
      </div>
      <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div> -->
    <!-- </div> -->

  </div>
</div>
<!--Modal Excluir Produtos-->
<div class="modal fade" role='dialog' id='excluir' >
<div class="modal-dialog">

    <!-- <div class="modal-content" id="modalFotoPerfil">
      <div class="modal-header">
        
        
      </div> -->
      <div class="modal-body">   

           
	<div class="alert alert-warning" id="modalAlert">		             
    	
  	</div>

          	
      </div>
      <!-- <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div> -->
    <!-- </div> -->

  </div>
</div>