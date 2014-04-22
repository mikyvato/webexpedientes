<div class="row-fluid">
<div class="span6">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'observaciones-form',
	'htmlOptions'=>array('class'=>'form-horizontal'),
	//'focus'=>array($model,'detalle_observacion'),
	'enableAjaxValidation'=>false,
)); ?>

<fieldset>
	<?php echo $form->errorSummary($model); ?>

	<div class="row span6">
		<?php echo $form->labelEx($model,'detalle_observacion'); ?>
		<?php echo $form->textArea($model,'detalle_observacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle_observacion'); ?>
	</div>
	<?php echo $form->hiddenField($model, 'expedientes_id_exp', array('value'=>$model->expedientes_id_exp)); ?>
	<?php echo $form->hiddenField($model, 'tramitaciones_id_tramite', array('value'=>$model->tramitaciones_id_tramite)); ?>
	<?php echo $form->hiddenField($model, 'oficinas_id_oficina', array('value'=>$model->oficinas_id_oficina)); ?>
	<?php echo $form->hiddenField($model, 'fecha', array('value'=>$model->fecha)); ?>
	
	<div calss="row span6">
		<?php echo CHtml::submitButton('Guardar', array('class'=>'btn btn-large btn-primary')); ?>
	</div>
</fieldset>
<?php $this->endWidget(); ?>
</div>
</div><!-- form -->