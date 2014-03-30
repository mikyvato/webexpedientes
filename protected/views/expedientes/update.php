<?php
/* @var $this ExpedientesController */
/* @var $model Expedientes */

$this->breadcrumbs=array(
	'Expedientes'=>array('index'),
	$model->id_exp=>array('view','id'=>$model->id_exp),
	'Update',
);

$this->menu=array(
	array('label'=>'List Expedientes', 'url'=>array('index')),
	array('label'=>'Create Expedientes', 'url'=>array('create')),
	array('label'=>'View Expedientes', 'url'=>array('view', 'id'=>$model->id_exp)),
	array('label'=>'Manage Expedientes', 'url'=>array('admin')),
);
?>

<h1>Update Expedientes <?php echo $model->id_exp; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>