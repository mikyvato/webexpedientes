<?php
/* @var $this ExpedientesController */
/* @var $model Expedientes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_exp'); ?>
		<?php echo $form->textField($model,'id_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_expediente'); ?>
		<?php echo $form->textField($model,'num_expediente',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_inicio'); ?>
		<?php echo $form->textField($model,'fecha_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_pedido'); ?>
		<?php echo $form->textField($model,'fecha_pedido'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ref_exp'); ?>
		<?php echo $form->textField($model,'ref_exp',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agregado_exp'); ?>
		<?php echo $form->textField($model,'agregado_exp',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dirigido_a'); ?>
		<?php echo $form->textField($model,'dirigido_a',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'causante'); ?>
		<?php echo $form->textField($model,'causante',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asunto'); ?>
		<?php echo $form->textArea($model,'asunto',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad_folios'); ?>
		<?php echo $form->textField($model,'cantidad_folios'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuarios_id_usuario'); ?>
		<?php echo $form->textField($model,'usuarios_id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'localidades_id_localidad'); ?>
		<?php echo $form->textField($model,'localidades_id_localidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number1'); ?>
		<?php echo $form->textField($model,'number1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'number2'); ?>
		<?php echo $form->textField($model,'number2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'letra'); ?>
		<?php echo $form->textField($model,'letra',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'importancia'); ?>
		<?php echo $form->textField($model,'importancia',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->