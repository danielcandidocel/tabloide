<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=0" />
        
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" type="text/css" />
        
        <!-- Favicon -->
        
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script> 
        <!--        FontAwesome-->
        <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet" />
        
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style-painel.css" />
        
        <title>XML</title>
    </head>
<body>
    <header>

    </header>
<div id="inteiro">
    <div id="horizontal">
 </div>
 <div id ="lateral">
    <button class="botaoCadastro" > <a href="<?php echo BASE_URL; ?>home/cadastroProduto">Cadastrar Produtos</a></button>

    <button class="btn-default botaoLayout" > <a href="<?php echo BASE_URL; ?>home/escolherLayout">Escolher Layout</a></button>

    <button class="btn-default botaoProdutos" > <a href="<?php echo BASE_URL; ?>home/adicionarProdutos">Adicionar Produtos</a></button>

    <button class="btn-default botaoImprimir" > <a href="<?php echo BASE_URL; ?>home/visualizarImprimir">Visualizar e Imprimir</a></button>

    </input>
 </div>
 

</div>
<?php $this->loadViewinTemplate($viewName, $viewData); ?>
    <footer>

    </footer>
    <script type="text/javascript">
        var BASE_URL = '<?php echo BASE_URL; ?>';
    </script>    
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/script.js" type="text/javascript"></script>    

</body>
</html>