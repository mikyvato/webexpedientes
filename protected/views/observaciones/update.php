<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */

$this->breadcrumbs=array(
	'Observaciones'=>array('index'),
	$model->id_observacion=>array('view','id'=>$model->id_observacion),
	'Update',
);

$this->menu=array(
	array('label'=>'List Observaciones', 'url'=>array('index')),
	array('label'=>'Create Observaciones', 'url'=>array('create')),
	array('label'=>'View Observaciones', 'url'=>array('view', 'id'=>$model->id_observacion)),
	array('label'=>'Manage Observaciones', 'url'=>array('admin')),
);
?>

<h1>Update Observaciones <?php echo $model->id_observacion; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>