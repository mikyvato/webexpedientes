<?php
/* @var $this OficinasController */
/* @var $model Oficinas */

$this->breadcrumbs=array(
	'Oficinases'=>array('index'),
	$model->id_oficina,
);

$this->menu=array(
	array('label'=>'Listar Oficinas', 'url'=>array('index')),
	array('label'=>'/'),
	array('label'=>'Nueva Oficina', 'url'=>array('create')),
	array('label'=>'/'),
	array('label'=>'Modificar Oficina', 'url'=>array('update', 'id'=>$model->id_oficina)),
	array('label'=>'/'),
	array('label'=>'Eliminar Oficina', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_oficina),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'/'),
	array('label'=>'Administrar Oficinas', 'url'=>array('admin')),
);
?>
<div class="span3">&nbsp</div>
<div class="span7">
<h1>Oficina N&deg;<?php echo $model->id_oficina; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_oficina',
		'descripcion',
		'detalle',
		'departamentos_id_departamento',
	),
)); ?>
