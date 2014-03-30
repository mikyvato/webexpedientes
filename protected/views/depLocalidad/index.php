<?php
/* @var $this DepLocalidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dep Localidads',
);

$this->menu=array(
	array('label'=>'Create DepLocalidad', 'url'=>array('create')),
	array('label'=>'Manage DepLocalidad', 'url'=>array('admin')),
);
?>

<h1>Dep Localidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
