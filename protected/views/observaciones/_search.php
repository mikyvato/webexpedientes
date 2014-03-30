<?php
/* @var $this ObservacionesController */
/* @var $model Observaciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_observacion'); ?>
		<?php echo $form->textField($model,'id_observacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'detalle_observacion'); ?>
		<?php echo $form->textField($model,'detalle_observacion',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expedientes_id_exp'); ?>
		<?php echo $form->textField($model,'expedientes_id_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tramitaciones_id_tramite'); ?>
		<?php echo $form->textField($model,'tramitaciones_id_tramite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oficinas_id_oficina'); ?>
		<?php echo $form->textField($model,'oficinas_id_oficina'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->