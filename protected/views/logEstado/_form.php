<?php
/* @var $this LogEstadoController */
/* @var $model LogEstado */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'log-estado-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_log_estado'); ?>
		<?php echo $form->textField($model,'id_log_estado'); ?>
		<?php echo $form->error($model,'id_log_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle_estado'); ?>
		<?php echo $form->textField($model,'detalle_estado',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'detalle_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tramitaciones_id_tramite'); ?>
		<?php echo $form->textField($model,'tramitaciones_id_tramite'); ?>
		<?php echo $form->error($model,'tramitaciones_id_tramite'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oficinas_id_oficina'); ?>
		<?php echo $form->textField($model,'oficinas_id_oficina'); ?>
		<?php echo $form->error($model,'oficinas_id_oficina'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->