
<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tramitaciones-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php //----------------Dialogo detalle del expediente---------- ?>
<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	        'id' => 'dlg-detalle',
	        'options' => array(
	            'title' => 'Detalle del Expediente',
	           // 'show'=>'slide',
	            'closeOnEscape' => true,
	            'autoOpen' => false,
	            'model' => false,
	            'width' => 800,
	            'height' => 500,
	        ),
	)) ?>
<div id="id_view"></div>
<?php $this->endWidget();?>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	        'id' => 'dlg-Obser',
	        'options' => array(
	            'title' => 'Detalle del Expediente',
	           // 'show'=>'slide',
	            'closeOnEscape' => true,
	            'autoOpen' => false,
	            'model' => false,
	            'width' => 300,
	            'height' => 300,
	        ),
	)) ?>
<div id="id_obs" class="span6"></div>
<?php $this->endWidget();?>

<?php //------------------------------------------------------- ?>

<h1 style="text-align:center;">
	Administrar Tramitaciones <br>
	<?php 
		$user = UsuariosController::loadModel(yii::app()->user->id);
		echo '<u>'.CHtml::encode($user->oficinasIdOficina->descripcion).'</u>'; 
	?>
	
</h1>

<div class="row-fluid">
 <div class="sapn12 well well-small">
 	<div class="tabbable"> <!-- Only required for left/right tabs -->


<ul class="nav nav-tabs" id="myTab">
	<li class="active"><a href="#tab1" data-toggle="tab" >Asignados</a></li>
	<li><a href="#tab2" data-toggle="tab" >Aceptados</a></li>
	<li><a href="#tab3" data-toggle="tab" >Historial</a></li>

</ul>
</div>

<div class="tab-content">
	<div class="tab-pane active" id="tab1">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'tramitaciones-grid',
			'emptyText'=>'Ningun Expediente Asignado!!',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'summaryText' => 'Mostrando {end} de {count} resultados',
  					'template' => "{summary}\n{pager}\n{items}\n{pager}",
  					'pager'=>array(
				              'header'=>'',
				              'firstPageLabel'=>'Primero',
				              'lastPageLabel'=>'Ultimo',
				              'nextPageLabel'=>'Siguiente',
				              'prevPageLabel'=>'Anterior',
				            ),
			'columns'=>array(
				array(
	          		 'header' => '<i class="icon-exclamation-sign icon-white"></i>',
	           		 'type' => 'raw',
	           		 'value' => '((strtotime($data->fecha_tramite)+86400)<=time()) ? CHtml::image(Yii::app()->baseUrl ."/images/chicored.png" ): CHtml::image(Yii::app()->baseUrl ."/images/chicogreen.png")',
	     		),
	     		array(
		            'header' => 'OBS',
		            'type' => 'raw',
		            'value' => '((strtotime($data->fecha_tramite)+86400)<time()) ? \'<i class="icon-question-sign"></i>\' : " "',
	     			'htmlOptions'=>array('style'=>'text-align: center; font-weight:bold;'),
	     		),
				array(
				      'name' => 'expedientes_id_exp',
				      'header' => 'N de Exp',
				      'value' => '$data->expedientesIdExp->num_expediente',
				      'htmlOptions'=>array('style'=>'text-align: center; font-weight:bold;'),
     					),
				'fecha_tramite',
				'observacion',
				'cantidad_folios',
				'oficina_origen',
				'estado_tramite',
				//'estado',
				array(
				    'name' => 'estado',
				    'header' => 'Estado',
				    'value' => '$data->estado',
				    'htmlOptions'=>array('style'=>'text-align: center;'),
				    'filter'=>'',
     			),
				array(
				    'class'=>'CButtonColumn',
				    'header'=>'Acciones',
				    'template'=>'{Aceptar}{obs}',
		        	'buttons'=>array(
				           	'Aceptar' => array(
				    			'label'=>'<i class="icon-ok"></i>&nbsp;',
				    			'url'=>'Yii::app()->createUrl("tramitaciones/view", array("id"=>$data->id_tramite))',
				            	'options'=>array(
				            				'title'=>'Aceptar', 
				            				'role'=>"button",
				            				'class'=>"btn btn-success",
				            				'data-toggle'=>"modal",
				               				),
		               					),
				            'obs' => array(
				            		'label'=>'<i class="icon-info-sign"></i>&nbsp;',
				            		'url'=>'Yii::app()->createUrl("observaciones/create", array("id"=>$data->id_tramite))',
				               		'options'=>array(
				               					'title'=>'Agregar Observacion',
		               				 			'class'=>'btn btn-mini'
				                				),
		               				),
				                	
           					),
    			),
			),
		)); ?>		
	</div>

	<div class="tab-pane" id="tab2">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'tramitaciones-grid2',
			'emptyText'=>'Sin resultados!!',
			'dataProvider'=>$model2->search(),
			'filter'=>$model2,
			'summaryText' => 'Mostrando {end} de {count} resultados',
  			'template' => "{summary}\n{pager}\n{items}\n{pager}",
  			'pager'=>array(
				    'header'=>'',
				    'firstPageLabel'=>'Primero',
				    'lastPageLabel'=>'Ultimo',
				    'nextPageLabel'=>'Siguiente',
				    'prevPageLabel'=>'Anterior',
				    ),
			'columns'=>array(
				array(
		            'header' => '<i class="icon-exclamation-sign icon-white"></i>',
		            'type' => 'raw',
		            'value' => '((strtotime($data->fecha_tramite)+259200)<=time()) ? CHtml::image(Yii::app()->baseUrl ."/images/chicored.png" ): CHtml::image(Yii::app()->baseUrl ."/images/chicogreen.png")',
	     		),
	     		array(
		            'header' => 'OBS',
		            'type' => 'raw',
		            'value' => '((strtotime($data->fecha_tramite)+259200)<time()) ? \'<i class="icon-question-sign"></i>\' : " "',
	     			'htmlOptions'=>array('style'=>'text-align: center; font-weight:bold;'),
	     		),
				array(
				      'name' => 'expedientes_id_exp',
				      'header' => 'N de Exp',
				      'value' => '$data->expedientesIdExp->num_expediente',
				      'htmlOptions'=>array('style'=>'text-align: center; font-weight:bold;'),
     					),
				'fecha_tramite',
				'id_tramite',
				array(
						'name' =>'id_tramite',
						'header'=>'Fecha de Pase',
						'value'=>'Tramitaciones::loadLastDay($data->id_tramite, "ACEPTADO")',
				),
				'observacion',
				'cantidad_folios',
				'oficina_origen',
				'estado_tramite',
			//	'estado',
				array(
				    'name' => 'estado',
				    'header' => 'Estado',
				    'value' => '$data->estado',
				    'htmlOptions'=>array('style'=>'text-align: center;'),
				    'filter'=>'',
     			),
     			array(
		            'header' => 'Dias',
		            'type' => 'raw',
		            'value' => '(strtotime(date("Y-m-d")) - strtotime(Tramitaciones::loadLastDay($data->id_tramite, "ACEPTADO")))/60/60/24',
		     	),
				array(
					'class'=>'CButtonColumn',
					'header'=>'Acciones',
					'template'=>'{pase}{obs}{exp}',
		        	'buttons'=>array(
		       					'pase' => array(
				           			'label'=>'<i class="icon-arrow-right"></i>&nbsp;',
				           			'url'=>'Yii::app()->createUrl("tramitaciones/create", array("id"=>$data->id_tramite))',
				               		'options'=>array(
					           				'title'=>'Pase', 
					           				'role'=>"button",
					           				'class'=>"btn btn-mini btn-success",
					           				'data-toggle'=>"modal",
				                			),
		               					),
		       					'obs' => array(
				               		'label'=>'<i class="icon-info-sign"></i>&nbsp;',
				               		'url'=>'Yii::app()->createUrl("observaciones/create", array("id"=>$data->id_tramite))',
				                	'options'=>array(
				                				'rel' => 'tooltip', 
		                               		    'data-toggle' => 'tooltip',
		                               		    'title'=> 'Observaciones',
		                               		    'class'=>"btn btn-mini",
					                      	    'ajax' => array(
							                        'type' => 'POST',
							                        'url' => "js:$(this).attr('href')",
							                        'update'=>'#id_obs',
					                        		),
				                				),
		               					),
		       					'exp' => array(
		       						'label'=>'<i class="icon-book"></i>&nbsp;',
		       						'url'=>'Yii::app()->createUrl("expedientes/view3", array("id"=>$data->expedientes_id_exp,"asDialog"=>1))',
					                'options' => array(
							                'rel' => 'tooltip', 
		                               		'data-toggle' => 'tooltip',
		                               		'title'=> 'Ver Expediente',
		                               		'class'=>"btn btn-mini",
					                      	'ajax' => array(
							                        'type' => 'POST',
							                        'url' => "js:$(this).attr('href')",
							                        'update'=>'#id_view',
					                        		),
					                    		),
					                	),    // exp boton*/
           						),
    			),
			),
		)); 
?>

	</div>
	
	<div class="tab-pane" id="tab3">
<?php $this->widget('zii.widgets.grid.CGridView', array(
					'id'=>'log-estado-grid3',
					'emptyText'=>'Busqueda sin resultados!!',
					'dataProvider'=>$model3->search(),
					'filter'=>$model3,
					'summaryText' => 'Mostrando {end} de {count} resultados',
  					'template' => "{summary}\n{pager}\n{items}\n{pager}",
  					'pager'=>array(
				              'header'=>'',
				              'firstPageLabel'=>'Primero',
				              'lastPageLabel'=>'Ultimo',
				              'nextPageLabel'=>'Siguiente',
				              'prevPageLabel'=>'Anterior',
				            ),
					'columns'=>array(
						array(
				           'name' => 'tramitaciones_id_tramite',
				           'header' => 'N&deg; de Expediente',
				           'value' => '$data->tramitacionesIdTramite->expedientesIdExp->num_expediente',
				           'htmlOptions'=>array('style'=>'text-align: center; font-weight:bold;'),
     					),
     					array(
				           'name' => 'tramitaciones_id_tramite',
				           'header' => 'Oficina Origen',
				           'value' => '$data->tramitacionesIdTramite->oficinasIdOficina->descripcion',
				           'htmlOptions'=>array('style'=>'text-align: center;'),
     					),
						array(
			              	'name' => 'fecha',
			             	'header' => 'Fecha de Aceptacion',
			              	'value' => 'Yii::app()->dateFormatter->format("dd/MM/y", strtotime($data->fecha))',
			              	'htmlOptions'=>array('style'=>'text-align: center;'),
			      		),
			      		array(
				           'name' => 'tramitaciones_id_tramite',
				           'header' => 'Folios',
				           'value' => '$data->tramitacionesIdTramite->cantidad_folios',
				           'htmlOptions'=>array('style'=>'text-align: center;'),
     					),
						array(
						   'class'=>'CButtonColumn',
						   'header'=>'Acciones',
						   'template'=>'{ver}',
		        		   'buttons'=>array(
		       					'ver' => array(
		         					 'label'=>'<i class="icon-list-alt"></i>&nbsp;',
		              				 'url'=>'Yii::app()->createUrl("expedientes/view", array("id"=>$data->tramitacionesIdTramite->expedientesIdExp->id_exp))',
		               				 'options'=>array(
		               			 				'title'=>'Ver Expediente',
		               			 				'class'=>'btn btn-mini'
		               				 			),
		               					),
           							),
    					),
	),
)); ?>
		</div>

</div>

   </div>
</div>
<!-- Modal -->
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Conducta Clasificaci&oacute;n</h3>
  </div>
  <div class="modal-body">
    <p>
     <?php 
      echo "Hola";
      //echo $this->renderPartial('../localidades/_form', array('model'=>$newClasificacion,)); 
     ?>
    </p>
  </div>
  <div class="modal-footer">
    
  </div>
</div>

