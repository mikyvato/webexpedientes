<?php
/* @var $this ExpedientesController */
/* @var $data Expedientes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_expediente')); ?>:</b>
	<?php echo CHtml::encode($data->num_expediente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_pedido')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_pedido); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ref_exp')); ?>:</b>
	<?php echo CHtml::encode($data->ref_exp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agregado_exp')); ?>:</b>
	<?php echo CHtml::encode($data->agregado_exp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dirigido_a')); ?>:</b>
	<?php echo CHtml::encode($data->dirigido_a); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('causante')); ?>:</b>
	<?php echo CHtml::encode($data->causante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asunto')); ?>:</b>
	<?php echo CHtml::encode($data->asunto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_folios')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_folios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuarios_id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('localidades_id_localidad')); ?>:</b>
	<?php echo CHtml::encode($data->localidades_id_localidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number1')); ?>:</b>
	<?php echo CHtml::encode($data->number1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('number2')); ?>:</b>
	<?php echo CHtml::encode($data->number2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('letra')); ?>:</b>
	<?php echo CHtml::encode($data->letra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('importancia')); ?>:</b>
	<?php echo CHtml::encode($data->importancia); ?>
	<br />

	*/ ?>

</div>