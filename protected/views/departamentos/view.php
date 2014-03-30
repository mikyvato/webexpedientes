<?php
/* @var $this DepartamentosController */
/* @var $model Departamentos */

$this->breadcrumbs=array(
	'Departamentoses'=>array('index'),
	$model->id_departamento,
);

$this->menu=array(
	array('label'=>'List Departamentos', 'url'=>array('index')),
	array('label'=>'/'),
	array('label'=>'Create Departamentos', 'url'=>array('create')),
	array('label'=>'/'),
	array('label'=>'Update Departamentos', 'url'=>array('update', 'id'=>$model->id_departamento)),
	array('label'=>'/'),
	array('label'=>'Delete Departamentos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_departamento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'/'),
	array('label'=>'Manage Departamentos', 'url'=>array('admin')),
);
?>
<div class="span3">&nbsp</div>
<div class="span7">
		<h1>View Departamentos #<?php echo $model->id_departamento; ?></h1>
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'htmlOptions'=>array('class'=>'table table-bordered table-striped'),
			'attributes'=>array(
				'id_departamento',
				'descripcion',
				'detalle',
			),
		)); ?>
</div>
