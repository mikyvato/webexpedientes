
<?php if(Yii::app()->user->hasFlash('success')):?>
	<script>alert('<?php echo Yii::app()->user->getFlash('success'); ?>');</script>
<?php endif; ?>

	<div class="row-fluid">
	<div class="span12">
	<?php $form=$this->beginWidget('CActiveForm', array(
													'id'=>'expedientes-form',
													'enableAjaxValidation'=>false,
													'action'=>Yii::app()->createUrl('expedientes/create'),
													'focus'=>array($model, 'number1'),
													'htmlOptions'=>array('class'=>'form-horizontal'),
												    )); ?>
	<p class="note">Campos <span class="required">*</span> obligatorios.</p>
	<?php echo $form->errorSummary($model); ?>

	<div class="row-fluid well">
		<div class="span4">
			<?php echo 'N° de Expediente'; ?><br>&nbsp;</br>
			<?php echo $form->textField($model,'number1', array('style'=>'width:50px')); ?> / 
			<?php echo $form->error($model,'number1'); ?>

			<?php echo $form->textField($model,'number2', array('style'=>'width:30px')); ?> -
			<?php echo $form->error($model,'number2'); ?>

			<?php echo $form->textField($model,'letra', array(
															'size'=>3,
															'maxlength'=>3,
															'style'=>'width:30px'
														)
								); 
				?> - <?php echo date('Y');?>
			<br>&nbsp;</br>
			<?php echo $form->error($model,'letra'); ?>
		
			<?php echo $form->labelEx($model,'fecha_pedido'); ?>
			<?php 
				if($model->fecha_pedido !='')
				{
					$model->fecha_pedido=date('d-m-Y',strtotime($model->fecha_pedido));
				}
				$this->widget('zii.widgets.jui.CJuiDatePicker', 
						 		array(
						 		 	'model'=>$model, 
						 	        'attribute'=>'fecha_pedido',
						 		    'language'=> 'es',
						 		    'options'=> array(
						 							'numberOfMonths'=>2,
						 							'dateFormat'=>'d/m/yy',
						 							'changeMonth'=> false,
						 							'duration'=>'fast',
						 							'showAnim'=>'slide',
													'yearRange'=>'2014:2015',
													'minDate'=>-7,
													'maxDate'=>"0",
						 			  			),
							 		'htmlOptions'=>array('style'=>'height:20px;background-color:white;color:black;','required'=>'required', 'class'=>'span3'),
							 	)
						 	);
			?>
			<?php echo $form->error($model,'fecha_pedido'); ?>

			<?php echo $form->labelEx($model,'agregado_exp'); ?>
			<?php echo $form->textField($model,'agregado_exp',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'agregado_exp'); ?>
			<br>&nbsp;</br>
			<?php echo $form->labelEx($model,'dirigido_a'); ?>
			<?php echo $form->textField($model,'dirigido_a', array('value' => "Director", 'size'=>30,'maxlength'=>30)); ?>
			<?php echo $form->error($model,'dirigido_a'); ?>
			<br>&nbsp;</br>
			<?php echo $form->labelEx($model,'causante'); ?>
			<?php echo $form->textField($model,'causante',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'causante'); ?>
		</div>

		<div class="span4">
			<?php echo $form->labelEx($model,'asunto'); ?>
			<?php echo $form->textArea($model,'asunto',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'asunto'); ?>
			<br>&nbsp;</br>
			<?php echo $form->labelEx($model,'cantidad_folios'); ?>
			<?php echo $form->textField($model,'cantidad_folios',array('style'=>'width:30px')); ?>
			<?php echo $form->error($model,'cantidad_folios'); ?>
			<br>&nbsp;</br>
			<?php echo $form->labelEx($model,'Localidad'); ?>
			<?php echo $form->dropDownList($model,'localidades_id_localidad', Localidades::getList(),array(
																										'empty',
																										'Seleccione una Opcion'
																									) 
								); ?>
			<?php echo $form->error($model,'localidades_id_localidad'); ?>
		</div>
		
		<div class="span4">
			<?php echo $form->labelEx($model,'tipo'); ?>
			<?php echo $form->dropDownList($model,'tipo',$model->getTipoMenu()); ?>
			<?php // echo $form->textField($model,'tipo',array('size'=>45,'maxlength'=>45)); ?>
			<?php echo $form->error($model,'tipo'); ?>
			<br>&nbsp;</br>
			<br>&nbsp;</br>
			<div class="row buttons">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>"btn btn-danger btn-large")); ?>
			</div>
			<?php $this->endWidget(); ?>

		</div>

</div><!-- form -->


	
		
