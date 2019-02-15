<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=0" />
        
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" type="text/css" />
        
        <!-- Favicon -->
        <!-- 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
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

<!--Modal Evento-->
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
                            <select name="qtde" id="qtde" onchange="javascript:qtde(this);">
                                <option value="0"></option>
                                <option value="6">6</option>
                                <option value="8">8</option>
                                <option value="10">10</option>
                                <option value="12">12</option>
                                <option value="16">16</option>
                                <option value="20">20</option>
                            </select>    
                        </div>
                    </div><br/> <br/> <br/>
                    <div class="form-group" id="add_produtos">
                        <div class="col-md-5"></div>
                        <div class="col-md-7">
                            <button class="btn btn-success" onclick="teste()">Adicionar Produtos</button>
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