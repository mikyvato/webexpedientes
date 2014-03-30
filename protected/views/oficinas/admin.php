<?php
/* @var $this OficinasController */
/* @var $model Oficinas */

$this->breadcrumbs=array(
	'Oficinases'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Oficinas', 'url'=>array('index')),
	array('label'=>'Nueva Oficina', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#oficinas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Oficinas</h1>

<p>
Ingresar opcionalmente un operador de comparacion (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al comienzo de cada uno de los valores de busqueda para especificar como se puede realizar la comparacion.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'oficinas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_oficina',
		'descripcion',
		'detalle',
		//'departamentos_id_departamento',
		array(
            'name' => 'departamentos_id_departamento',
            'header' => 'Departamento',
            'value' => '$data->departamentosIdDepartamento->descripcion',
            'filter' => Departamentos::getList(),
            ),	
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
