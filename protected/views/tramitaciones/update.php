<?php
/* @var $this TramitacionesController */
/* @var $model Tramitaciones */

$this->breadcrumbs=array(
	'Tramitaciones'=>array('index'),
	$model->id_tramite=>array('view','id'=>$model->id_tramite),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tramitaciones', 'url'=>array('index')),
	array('label'=>'Create Tramitaciones', 'url'=>array('create')),
	array('label'=>'View Tramitaciones', 'url'=>array('view', 'id'=>$model->id_tramite)),
	array('label'=>'Manage Tramitaciones', 'url'=>array('admin')),
);
?>

<h1>Update Tramitaciones <?php echo $model->id_tramite; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>