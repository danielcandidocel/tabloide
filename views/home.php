<div class="login">
    <div class="login-all">
        <div class="login-logo">
            <!-- <img src="<?php echo BASE_URL;?>assets/images/logo_inoveh_branco.png" id="lar"/> -->
        </div>
        <div class="login-form3">
        	<div>
        	<label>Processo dos Arquivos</label><br>	
        	</div>
        	<div>
        		<?php if(isset($retorno) && !empty($retorno)){
					echo $retorno;
					}
				
			 ?>		
        	</div>
        <div>        	
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