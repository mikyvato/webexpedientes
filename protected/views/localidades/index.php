<?php
/* @var $this LocalidadesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Localidades',
);

$this->menu=array(
	array('label'=>'Nueva Localidad', 'url'=>array('create')),
	array('label'=>'Administrar Localidades', 'url'=>array('admin')),
);
?>

<h1>Localidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
