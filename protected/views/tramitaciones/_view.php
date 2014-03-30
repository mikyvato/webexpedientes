<?php
/* @var $this TramitacionesController */
/* @var $data Tramitaciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tramite')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tramite), array('view', 'id'=>$data->id_tramite)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expedientes_id_exp')); ?>:</b>
	<?php echo CHtml::encode($data->expedientes_id_exp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_tramite')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_tramite); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad_folios')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad_folios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->usuarios_id_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oficinas_id_oficina')); ?>:</b>
	<?php echo CHtml::encode($data->oficinas_id_oficina); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('oficina_origen')); ?>:</b>
	<?php echo CHtml::encode($data->oficina_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estado_tramite')); ?>:</b>
	<?php echo CHtml::encode($data->estado_tramite); ?>
	<br />

	*/ ?>

</div>