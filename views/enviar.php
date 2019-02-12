<div class="login">
    <div class="login-all">
        <div class="login-logo">
            <!-- <img src="<?php echo BASE_URL;?>assets/images/logo_inoveh_branco.png" id="lar"/> -->
        </div>
        <div class="login-form3">
        	<div>
        	<label>Arquivos Enviados</label><br>	
        	</div>
        	<div>
        		<?php if(isset($arquivos) && !empty($arquivos)){
					if(isset($XML) && !empty($XML)){
						echo $XML.' arquivos XML enviados';
						echo '<BR>';
					}
					if(isset($naoXML) && !empty($naoXML)){
						echo $naoXML.' arquivo(s) não é(são) XML';
						}
					}
					if(isset($totalArquivos) && !empty($totalArquivos)){
						echo 'Você tem '.$totalArquivos.' arquivo(s) a ser(em) processados';
					}
				
			 ?>		
        	</div>
        <div>
        	<button class="btn-primary">
				<a href="<?php echo BASE_URL;?>home/processo" style="float: right">Processar</a>
			</button>
			<button class="btn-info">
				<a href="<?php echo BASE_URL;?>" style="float: right">Enviar Mais Arquivos</a>
			</button>
			<button class="btn-success">
				<a href="<?php echo BASE_URL;?>usuarios/logout" style="float: right">Logout</a>
			</button>	
        </div>
		
		
        
        </div>
        
    </div>
</div>

