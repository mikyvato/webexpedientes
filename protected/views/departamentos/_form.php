<?php
/* @var $this DepartamentosController */
/* @var $model Departamentos */
/* @var $form CActiveForm */
?>

<div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'departamentos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,null,null,array('class'=>'alert alert-error')); ?>

	<div class="well">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<div class="push-right">
		<?php echo $form->textField($model,'descripcion',array('size'=>45,'maxlength'=>45)); ?>
		</div>
		<?php echo $form->error($model,'descripcion'); ?>
	
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textField($model,'detalle',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'detalle'); ?>

		
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>"btn btn-danger btn-large pull-right")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->