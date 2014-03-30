<?php
/* @var $this DepLocalidadController */
/* @var $model DepLocalidad */

$this->breadcrumbs=array(
	'Dep Localidads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DepLocalidad', 'url'=>array('index')),
	array('label'=>'Create DepLocalidad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#dep-localidad-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Dep Localidades</h1>

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
	'id'=>'dep-localidad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_dep_localidad',
		'descripcion',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
