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
        
        <title>Tabloide</title>
    </head>
<body>
    <header>

    </header>
    <div id="horizontal">
 </div>
 <div id="inteiro">

 <div id ="lateral">
    <button class="botaoListar" > <a href="<?php echo BASE_URL; ?>produtos/listar"><span class="glyphicon glyphicon-print"></span>
Listar Produtos</a></button>

    <button class="botaoLayout " > <a href="<?php echo BASE_URL; ?>tabloide/criar">Criar Tabloide</a></button>

    <button class="botaoImprimir" > <a href="<?php echo BASE_URL; ?>usuarios/perfil">Perfil</a></button>

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
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/script.js" type="text/javascript"></script>    
    <script src="<?php echo BASE_URL; ?>assets/js/pluginMask.js" type="text/javascript"></script>  
</body>
</html>