<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */


Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#usuarios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<br>
<!-- <h1>Panel<small> administracion</small></h1> -->
<div class="row">
	<div class="col s10 offset-s1">
		<div class="panel">
			<h4 class="center-align"><small>Lista de  Usuarios</small></h4>
			<div class="row">
				<div class="col s12 right-align">
					<a class="btn  light-blue darken-1" href="<?php echo Yii::app()->request->baseUrl; ?>/usuarios/create">Crear Nuevo Usuario</a>
				</div>
			</div>
			<?php 
			$this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'usuarios-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'ajaxUrl'=> Yii::app()->request->getUrl(),
				'ajaxUpdate' => TRUE,
				'itemsCssClass' => 'responsive-table striped',
				'pager' => array(
					'header' => '',
			        'hiddenPageCssClass' => 'disabled',
			        'maxButtonCount' => 5,
			        'prevPageLabel' => '<i class="material-icons">chevron_left</i>',
			        'nextPageLabel' => '<i class="material-icons">chevron_right</i>',
			        'firstPageLabel' => 'Primero',
			        'lastPageLabel' => 'Ultimo',
					'htmlOptions'=>array('class'=>'pagination')
					),
				'columns'=>array(
					'id',
					'user',
					'password',
					// 'estado',
					'email',
					array(
						'class'=>'CButtonColumn',
						// 'template'=>'{single}{update}{delete}',
						// 'buttons'=>array
					 //    (
					 //        'single' => array
					 //        (
					 //            'label'=>'[+]',
					 //            // 'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
					 //            // 'url'=>'Yii::app()->createUrl("users/email", array("id"=>$data->id))',
						// 		'url'=>'Yii::app()->createUrl("mensajes/admin?").?Mensajes[placa]=$data->placa',
					 //        ),
					 //        // 'down' => array
					 //        // (
					 //        //     'label'=>'<i class="material-icons">chevron_left</i>',
					 //        //     'url'=>'"#"',
					 //        //     // 'visible'=>'$data->score > 0',
					 //        //     'click'=>'function(){alert("Going down!");}',
					 //        // ),
					 //    ),
					
					),
				),
			)); ?>
		</div>
	</div>
</div>




