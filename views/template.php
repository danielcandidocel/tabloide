<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=0" />
        
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" type="text/css" />
        
        <!-- Favicon -->
        <!-- 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
        <!-- <script src="<?php echo BASE_URL; ?>assets/js/script.js" type="text/javascript"></script>   -->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script> 
        <!--        FontAwesome-->
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style-painel.css" />
        
        <title>Tabloide</title>
    </head>
<body>
    <header>

    </header>
    <div id="horizontal">
        <center>
        <h1>
            Tabloide Online
        </h1>
        </center>
 </div>
 <div id="inteiro">

<div id="lateral3">
 <div id ="lateral">
    <button class="botaoListar"> <a href="<?php echo BASE_URL; ?>produtos/listar"><span class="glyphicon glyphicon-th-list"></span>
Listar Produtos</a></button>

    <button class="botaoLayout " onclick="criarTabloide()"> <span class="glyphicon glyphicon-th
"></span> Criar Tabloide</button>
    
    <button class="botaoLayout2" > <a href="<?php echo BASE_URL; ?>tabloide/meustabloides"><span class="glyphicon glyphicon-file
"></span> Meus Tabloides</a></button>

    <left><button class="botaoPerfil" > <a href="<?php echo BASE_URL; ?>usuarios/perfil"><span class="glyphicon glyphicon-user    
 
"></span> Perfil</a></button>
</div>
    <div id="lateral2">
           <center> <button class="botaoSair" > <a href="<?php echo BASE_URL; ?>usuarios/logout"><span class="glyphicon glyphicon-off 
"></span>   Sair</a></button></center>
    </div>
 </div>
 <div id="pagina">
<?php $this->loadViewinTemplate($viewName, $viewData); ?>
</div>

</div>

    <footer>

    </footer>
    <script type="text/javascript">
        var BASE_URL = '<?php echo BASE_URL; ?>';
    </script>       
    <script src="<?php echo BASE_URL; ?>assets/js/script.js" type="text/javascript"></script>    
    <script src="<?php echo BASE_URL; ?>assets/js/pluginMask.js" type="text/javascript"></script>  
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
</body>
</html>

<!--Modal Criar Tabloide-->
<div class="modal fade" role='dialog' id='escolherLayout'>
<div class="modal-dialog">

    <div class="modal-content" style="height:auto; width:800px">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Criar Tabloide</h4>
      </div>
        <div class="modal-body" style="min-height: 150px">
            <div class="col-md-12">
                <div class="col-md-10">                                              
                    <div class="form-group">
                        <label class="col-md-5">Selecione a Layout:</label>
                        <div class="col-md-7">
                            <select name="templates" id="templates" onchange="javascript:layout(this);">

                            </select>    
                        </div>
                    </div><br/> <br/> 
                    </div>      
                    <div class="form-group" id="qtde_produtos">
                        <label class="col-md-5">Selecione a Quantidade de Produtos:</label>
                        <div class="col-md-7">
                            <select name="qt" id="qt" onchange="javascript:qtde(this);">
                                <option value="0"></option>
                                <option value="15">15</option>
                                <!-- <option value="8">8</option>
                                <option value="10">10</option>
                                <option value="12">12</option>
                                <option value="16">16</option>
                                <option value="20">20</option> -->
                            </select>    
                        </div>
                    </div><br/> <br/> <br/>
                    <div class="form-group" id="add_produtos">
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                            <span class="btn btn-success" onclick="addProdutos()">Adicionar Produtos</span>
                        </div>
                    </div>
                </div>                 
        </div>
                
        </div>
    <div class="modal-footer">
       
    </div>
    </div>

  </div>
</div>

<!--Modal Incluir Produtos-->
<div class="modal fade" role='dialog' id='adicionarProdutos'>
<div class="modal-dialog" style="height:90%;">

    <div class="modal-content" id="layout_adicionar_produtos" style=" width:1000px; margin-left: -100px">
     <!--  <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Escolher Produtos</h4>
      </div> -->
      <div class="produtos_adicionados">
            <h3>Produtos Adicionados <span id="qtAdd"></span></h3>   
            <div class="relacao">
               
            </div>
            <p class="btn btn-success" onclick="gerarTabloide()">Criar Tabloide</p>     
      </div>
      <div class="produtos_adicionar">
        <div class="modal-body" style="height: 100%; overflow: auto"> 
           <div class="container" style="max-width: 100%;">
              <h2>Adicionar Produtos</h2>               
              <input class="form-control" id="myInput" type="text" placeholder="Pesquisar..">
              <br>
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id="myTable">
                  
                </tbody>
              </table>
             
            </div>                
        </div>
    </div>
        </div>
    <div class="modal-footer">
       
    </div>
    </div>

  </div>
</div>
<!--Modal -->
<div class="modal fade" role='dialog' id='alerta' >
<div class="modal-dialog">    
    <div class="modal-body">    
        <button type="button" class="close" data-dismiss="modal">&times;</button>          
        <div class="alert alert-danger" id="alertas">                    
        
        </div>            
    </div>    
  </div>
</div>