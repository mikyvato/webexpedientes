<?php
/* @var $this ObservacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Observaciones',
);

$this->menu=array(
	array('label'=>'Create Observaciones', 'url'=>array('create')),
	array('label'=>'Manage Observaciones', 'url'=>array('admin')),
);
?>

<h1>Observaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
