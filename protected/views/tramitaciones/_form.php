<?php
/* @var $this TramitacionesController */
/* @var $model Tramitaciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tramitaciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos <span class="required">*</span> Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?>
		<?php echo $form->textArea($model,'observacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_folios'); ?>
		<?php echo $form->textField($model,'cantidad_folios'); ?>
		<?php echo $form->error($model,'cantidad_folios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oficinas_id_oficina'); ?>
		<?php echo $form->dropDownList($model,'oficinas_id_oficina', Oficinas::getList(),array('empty'=>'Seleccione una Opcion') ); ?>
		<?php echo $form->error($model,'oficinas_id_oficina'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado_tramite'); ?>
		<?php echo $form->dropDownList($model,'estado_tramite',$model->getEstado()); ?>
		<?php echo $form->error($model,'estado_tramite'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->