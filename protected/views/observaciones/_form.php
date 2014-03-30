<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'observaciones-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle_observacion'); ?>
		<?php echo $form->textArea($model,'detalle_observacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle_observacion'); ?>
	</div>

	<div class="btn btn-danger">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->