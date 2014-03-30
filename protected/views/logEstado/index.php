<?php
/* @var $this LogEstadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Log Estados',
);

$this->menu=array(
	array('label'=>'Create LogEstado', 'url'=>array('create')),
	array('label'=>'Manage LogEstado', 'url'=>array('admin')),
);
?>

<h1>Log Estados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
