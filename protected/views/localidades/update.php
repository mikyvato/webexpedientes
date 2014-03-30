<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	$model->id_localidad=>array('view','id'=>$model->id_localidad),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Localidades', 'url'=>array('index')),
	array('label'=>'Nueva Localidad', 'url'=>array('create')),
	array('label'=>'Ver Localidad', 'url'=>array('view', 'id'=>$model->id_localidad)),
	array('label'=>'Administrar Localidades', 'url'=>array('admin')),
);
?>

<h1>Modificar Localidades <?php echo $model->id_localidad; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>