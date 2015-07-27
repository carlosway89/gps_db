
<script type="text/javascript">
	$(document).ready(function() {
	    $('select').material_select();
	  });
</script>
<div class="row">
	<div class="col s10 offset-s1">
		<div class="panel">
			<h4 class="center-align"><small>Lista de Transmisiones</small></h4>
			<br>
			<?php
				if (isset($mensaje)) {
					echo "<h5 class='green-text light-green lighten-4 center-align alert'>$mensaje</h5><br>";
				}
			?>
			<form method="get" id="form_report">
				<div class="row">
					<div class="input-field col s3 offset-s2">
						<select name="Reporte[file]">
						  <option value="" disabled selected>Eligir un Log</option>
						  <?php foreach ($files as $key => $value) {
								?>
						  <option value="<?php echo $value;?>"><?php echo $value;?></option>
						  <?php 
								}
						  ?>
						</select>
						<label>Fechas de Transmision</label>
					</div>
					<div class="input-field col s3 ">
						<select name="Reporte[placa]">
						  <option value="" disabled selected>Eligir una Placa</option>
						  <?php foreach ($vehicle as $value) {
								?>
								<option value="<?php echo $value['placa'];?>"><?php echo $value['placa'];?></option>
								
						  <?php 
								}
						  ?>
						  
						  
						</select>
						<label>Placa del Auto</label>
					</div>
					<div class="col s4">
						<br>
						<button class="btn waves-effect waves-light" type="submit" name="action">Generar</button>
					</div>
				</div>
				<br>
			</form>
			<?php if (isset($_GET['Reporte'])) {
				?>
			
			<div class="row">
				<div class="col s5">
					<form method="get" id="form_email">
						<div class="row">
							<h5>Enviar por Email</h5>
							<div class="input-field col s12">
					          <input placeholder="Email" id="email_user" name="mail" type="email" class="validate" required>
					          <label for="email_user">Email</label>
					        </div>
							<div class="col s12">
								<br>
								<button class="btn blue" type="submit" name="action">Enviar</button>
								<a class="btn grey" href="<?php echo Yii::app()->request->baseUrl; ?>/reporte">Crear Otro Reporte</a>
							</div>
						</div>
					</form>
				</div>
				<div class="col s7">
					<iframe width="100%" height="600px" src="<?php echo Yii::app()->request->baseUrl; ?>/reporte/pdf?pdf=<?php echo $pdf_file;?>"></iframe>
				</div>
			</div>				
			<?php }?>
			
		</div>
	</div>
</div>
