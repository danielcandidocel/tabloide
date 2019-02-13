<div class="container">
	<button onclick="cadastroProduto()">Cadastrar Produto</button>
  <h2>Lista de Produtos Cadastrados</h2>             
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Produto</th>
        <th>Nome</th>
        <th>Valor</th>
        <th>Quantidade</th>
        <th>Limite</th>
        <th>Unidade</th>
      </tr>
    </thead>
    <tbody>
      <?php if (isset($produtos) && !empty($produtos)):
      	foreach ($produtos as $prod):?>      		
      <tr>
        <td><?php echo $prod['imagem'];?></td>
        <td><?php echo $prod['nome'];?></td>
        <td><?php echo $prod['valor'];?></td>
        <td><?php echo $prod['qtde'];?></td>
        <td><?php echo $prod['limite'];?></td>
        <td><?php echo $prod['unidade'];?></td>
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
          <form id="formFotoPerfil" method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL;?>produtos/cadastrar">
         	<div class="form-group">
         		<div class="col-md-12">
         			<div class="col-md-12">
		         	<label>Imagem do Produto</label><br>
		          	<img src="<?php echo BASE_URL; ?>assets/images/produtos/produto.png" name="fotoProduto" id="fotoProduto" alt="clique para trocar a imagem"/>
		         	<input type="file" name="imagemProduto" id="imagemProduto" onchange="previewImagem()" style="display:none" />
		         </div>
	         	</div>
          	</div>
      	 	<div class="form-group">
      	 		<div class="col-md-12">
      	 			<div class="col-md-12">
	          		<label>Nome do Produto</label>
	          		<input type="text" name="" class="form-control">
	          		</div>
          		</div>
          	</div>
          	<div class="form-group">
          		<div class="col-md-6">
          		<div class="col-md-12">
          			<label>Valor do Produto</label>
          		</div>
          		<div class="col-md-8">
          			<input type="text" name="" class="form-control" id="valor1">
          		</div>
          		</div>
          		<div class="col-md-6">
      			<div class="col-md-12">
          			<label>Quantidade</label>
          		</div>
          		<div class="col-md-8">
          			<input type="number" name="" class="form-control">
          		</div>
          		</div>
          	</div>
          	<div class="form-group">
          		<div class="col-md-6">
          		<div class="col-md-12">
          			<label>Limite</label>
          		</div>
          		<div class="col-md-8">
          			<input type="text" name="" class="form-control" id="valor1">
          		</div>
          		</div>
          		<div class="col-md-6">
      			<div class="col-md-12">
          			<label>Unidade</label>
          		</div>
          		<div class="col-md-8">
          			<input type="number" name="" class="form-control">
          		</div>
          		</div>
          	</div>
          	
      </div>
      <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Salvar" /></form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </div>

  </div>
</div>
