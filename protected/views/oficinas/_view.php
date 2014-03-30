<?php
/* @var $this OficinasController */
/* @var $data Oficinas */
?>

<div class="well well-small">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_oficina')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_oficina), array('view', 'id'=>$data->id_oficina)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('departamentos_id_departamento')); ?>:</b>
	<?php echo CHtml::encode($data->departamentos_id_departamento); ?>
	<br />


</div>