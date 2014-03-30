<?php
/* @var $this TramitacionesController */
/* @var $model Tramitaciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tramite'); ?>
		<?php echo $form->textField($model,'id_tramite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expedientes_id_exp'); ?>
		<?php echo $form->textField($model,'expedientes_id_exp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_tramite'); ?>
		<?php echo $form->textField($model,'fecha_tramite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion'); ?>
		<?php echo $form->textArea($model,'observacion',array('rows'=>6, 'cols'=>50)); ?>
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
		<?php echo $form->label($model,'oficinas_id_oficina'); ?>
		<?php echo $form->textField($model,'oficinas_id_oficina'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oficina_origen'); ?>
		<?php echo $form->textField($model,'oficina_origen',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado_tramite'); ?>
		<?php echo $form->textField($model,'estado_tramite',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->