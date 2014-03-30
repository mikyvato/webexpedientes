<?php
/* @var $this OficinasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Oficinases',
);

$this->menu=array(
	array('label'=>'Nueva Oficina', 'url'=>array('create')),
	array('label'=>'/'),
	array('label'=>'Administrar Oficinas', 'url'=>array('admin')),
);
?>

<h1>Oficinases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
