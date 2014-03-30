<?php
/* @var $this DepartamentosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Departamentos',
);

$this->menu=array(
	array('label'=>'Create Departamentos', 'url'=>array('create')),
	array('label'=>'/'),
	array('label'=>'Manage Departamentos', 'url'=>array('admin')),
);
?>

<h1>Departamentoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
