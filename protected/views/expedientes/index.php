<?php
/* @var $this ExpedientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Expedientes',
);

$this->menu=array(
	array('label'=>'Create Expedientes', 'url'=>array('create')),
	array('label'=>'Manage Expedientes', 'url'=>array('admin')),
);
?>

<h1>Expedientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
