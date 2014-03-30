<?php
/* @var $this LocalidadesController */
/* @var $model Localidades */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Localidades', 'url'=>array('index')),
	array('label'=>'Create Localidades', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#localidades-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Localidades</h1>

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
	'id'=>'localidades-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_localidad',
		'descripcion',
		//'dep_localidad_id_dep_localidad',
		array(
                    'name' => 'dep_localidad_id_dep_localidad',
                    'header' => 'Departamento',
                    'value' => '$data->depLocalidadIdDepLocalidad->descripcion',
                    'filter' => DepLocalidad::getList(),
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
