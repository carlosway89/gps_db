<?php
$placa=isset($_GET['placa'])?$_GET['placa']:"";
?>
<br>
<!-- <h1>Panel<small> administracion</small></h1> -->
<div class="row">
	<div class="col s10 offset-s1">
		<div class="panel">
			<!-- <h4 class="center-align"><small>Panel de Control</small></h4>
			<br>
			<div class="row">
				<div class="col s12">
					<div class="col s3 offset-s2 center-align">
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/user/update/1"><i class="material-icons large blue-text">settings</i></a>						
						<h5>Mi Cuenta</h5>
					</div>
					<div class="col s3 offset-s2 center-align red-text">
						<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout"><i class="material-icons large red-text">input</i></a>
						<h5>Cerrar Sesion</h5>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col s12">
					<br><br>
					<a class="large btn " href="<?php echo Yii::app()->request->baseUrl; ?>/vehiculo">Filtrar por Placa</a>
					<a class="large btn grey" href="<?php echo Yii::app()->request->baseUrl; ?>/panel">Mostrar Todo</a>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<br>
					<h5 class="center-align blue-text"><i class="material-icons green-text">settings_input_antenna</i> Transmicion en Vivo <?php echo $placa!=""?"<small>Placa $placa</small>":"Total"; ?></h5>
					<div id="data_transmition">
						<?php
							$this->actionTransmition($sentence); 
							// echo $this->renderPartial('transmition', array('model'=>$model)); 
						?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php


Yii::app()->clientScript->registerScript('maintainer', "

    $.addBeat('transmition-check',function(){
	     // console.log('transmitiendo');
	    $.ajax({
            type: 'GET',
            url: '".Yii::app()->request->baseUrl."/panel/transmition',
            data: {                
                placa: '".$placa."' 
            },
            error:function(req, status, error) {
                // console.log(req.responseText);
            },
            success: function (data) {
                $('#data_transmition').html(data);         
            }
        });

	},6000);


    
    ");


?>

        
            
