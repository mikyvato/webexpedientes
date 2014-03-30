<?php
/* @var $this ObservacionesController */
/* @var $data Observaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_observacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_observacion), array('view', 'id'=>$data->id_observacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle_observacion')); ?>:</b>
	<?php echo CHtml::encode($data->detalle_observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expedientes_id_exp')); ?>:</b>
	<?php echo CHtml::encode($data->expedientes_id_exp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tramitaciones_id_tramite')); ?>:</b>
	<?php echo CHtml::encode($data->tramitaciones_id_tramite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oficinas_id_oficina')); ?>:</b>
	<?php echo CHtml::encode($data->oficinas_id_oficina); ?>
	<br />


</div>