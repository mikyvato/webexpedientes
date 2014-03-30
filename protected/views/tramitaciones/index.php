<?php
/* @var $this TramitacionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tramitaciones',
);

$this->menu=array(
	array('label'=>'Create Tramitaciones', 'url'=>array('create')),
	array('label'=>'Manage Tramitaciones', 'url'=>array('admin')),
);
?>

<h1>Tramitaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
