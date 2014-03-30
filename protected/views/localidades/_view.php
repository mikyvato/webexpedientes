<?php
/* @var $this LocalidadesController */
/* @var $data Localidades */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_localidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_localidad), array('view', 'id'=>$data->id_localidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dep_localidad_id_dep_localidad')); ?>:</b>
	<?php echo CHtml::encode($data->dep_localidad_id_dep_localidad); ?>
	<br />


</div>