<?php
/* @var $this OficinasController */
/* @var $model Oficinas */

$this->breadcrumbs=array(
	'Oficinases'=>array('index'),
	$model->id_oficina=>array('view','id'=>$model->id_oficina),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Oficinas', 'url'=>array('index')),
	array('label'=>'NUeva Oficina', 'url'=>array('create')),
	array('label'=>'Ver Oficina', 'url'=>array('view', 'id'=>$model->id_oficina)),
	array('label'=>'Administar Oficinas', 'url'=>array('admin')),
);
?>

<h1>Update Oficinas <?php echo $model->id_oficina; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>