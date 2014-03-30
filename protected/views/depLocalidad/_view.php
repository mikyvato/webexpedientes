<?php
/* @var $this DepLocalidadController */
/* @var $data DepLocalidad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_dep_localidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_dep_localidad), array('view', 'id'=>$data->id_dep_localidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


</div>