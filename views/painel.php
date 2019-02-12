
<div class="login">
    <div class="login-all">
        <div class="login-logo">
            <!-- <img src="<?php echo BASE_URL;?>assets/images/logo_inoveh_branco.png" id="lar"/> -->
        </div>
        <div class="login-form">
        <form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL;?>home/enviar">
			<label>Enviar Arquivos</label>
			<input type="file" name="arquivo[]" multiple style="font-size: 16px;" /><br>
			<div style="width:100%; text-align: center;">
				<input type="submit" class="btn-primary" value="Enviar" style="max-width: 150px; font-size: 22px" />
			</div>
			
		</form>
		<button class="btn-primary">
				<a href="<?php echo BASE_URL;?>home/processo" style="float: right">Processar</a>
			</button>
		<button class="btn-success">
			<a href="<?php echo BASE_URL;?>usuarios/logout" style="float: right">Logout</a>
		</button>
		
        
        </div>
        
    </div>
</div>

