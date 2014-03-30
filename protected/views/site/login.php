<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array('Login',);
?>
<div class="span3">&nbsp</div>
<div class="span4">
<h1>Login</h1>
<p>Ingrese sus datos:</p>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
													'id'=>'login-form',
													'enableClientValidation'=>true,
													'clientOptions'=>array('validateOnSubmit'=>true,),
													)); ?>
   <!--p class="note"> Campos <span class="required">*</span> obligatorios.</p-->
   <div class="well">
		<?php echo $form->labelEx($model,'Usuario'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
		<br>
		<?php echo $form->labelEx($model,'Contrase&ntilde;a'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<br>
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'Recordarme'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	<!--div class="row buttons"-->
		<?php echo CHtml::submitButton('Login', array('class'=>"btn btn-danger btn-large")); ?>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->
