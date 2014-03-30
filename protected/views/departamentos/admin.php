<?php
/* @var $this DepartamentosController */
/* @var $model Departamentos */

$this->breadcrumbs=array(
	'Departamentoses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Departamentos', 'url'=>array('index')),
	array('label'=>'/'),
	array('label'=>'Create Departamentos', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#departamentos-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Departamentos</h1>

<p>
ingresar opcionalmente un operador de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de busqueda para especificar como se puede realizar la comparacion.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'departamentos-grid',
	'dataProvider'=>$model->search(),
		'filter'=>$model,
	'columns'=>array(
		'id_departamento',
		'descripcion',
		'detalle',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

