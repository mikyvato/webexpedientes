<?php
/* @var $this LogEstadoController */
/* @var $model LogEstado */

$this->breadcrumbs=array(
	'Log Estados'=>array('index'),
	$model->id_log_estado=>array('view','id'=>$model->id_log_estado),
	'Update',
);

$this->menu=array(
	array('label'=>'List LogEstado', 'url'=>array('index')),
	array('label'=>'Create LogEstado', 'url'=>array('create')),
	array('label'=>'View LogEstado', 'url'=>array('view', 'id'=>$model->id_log_estado)),
	array('label'=>'Manage LogEstado', 'url'=>array('admin')),
);
?>

<h1>Update LogEstado <?php echo $model->id_log_estado; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>