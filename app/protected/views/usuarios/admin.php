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
						'class'=>'CButtonColumn'
					),
				),
			)); ?>
		</div>
	</div>
</div>




