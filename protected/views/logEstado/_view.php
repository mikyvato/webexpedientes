<?php
/* @var $this LogEstadoController */
/* @var $data LogEstado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_log_estado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_log_estado), array('view', 'id'=>$data->id_log_estado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle_estado')); ?>:</b>
	<?php echo CHtml::encode($data->detalle_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tramitaciones_id_tramite')); ?>:</b>
	<?php echo CHtml::encode($data->tramitaciones_id_tramite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oficinas_id_oficina')); ?>:</b>
	<?php echo CHtml::encode($data->oficinas_id_oficina); ?>
	<br />


</div>