<?php if(Yii::app()->user->hasFlash('success')):?>
	<script>alert('<?php echo Yii::app()->user->getFlash('success'); ?>');</script>
<?php endif; ?>

<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#expedientes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<script>
    function mostrarDetalles(){
        var id_exp = $.fn.yiiGridView.getSelection('expedientes');
        $.fn.yiiGridView.update('tramitaciones',{ data: id_exp });  
    }
</script>

<script>
   $('#form-reset-button').live('click', function()
   {
      var id='expedientes';
      var inputSelector='#'+id+' .filters input, '+'#'+id+' .filters select';
      $(inputSelector).each( function(i,o) {
           $(o).val('');
      });
      var data=$.param($(inputSelector));
      $.fn.yiiGridView.update(id, {data: data});
      return false;
   });
</script>

<?php 
if (isset($_GET['Expedientes']))
  $expedientes = $_GET['Expedientes'];
else
  $expedientes = '';

    Yii::app()->clientScript->registerScript('search', "
        $('#search').click(function(){  
                $('#export').val('');
        });
        $('.search-button').click(function(){
                $('.search-form').toggle();
                return false;
        });
        $('.search-form form').submit(function(){
                $('#expedientes').yiiGridView('update', {
                        data: $(this).serialize()
                });     
                return false;
        });
    ");
?>

<h1 style="text-align:center;"><u>Listado General de Expedientes</u></h1>

<!--- -------------------------------------------- -->

<?php 
if (isset($_GET['Expedientes']))
  $expedientes = $_GET['Expedientes'];
else
  $expedientes = '';


date_default_timezone_set('America/Argentina/Tucuman');

$this->widget('ext.EExcelView', array(  
  'id'=>'expedientes',
  'selectableRows'=>1,
  'selectionChanged'=>'mostrarDetalles',
  'dataProvider'=>$dataProvider2->search(),
  'emptyText'=>'Busqueda sin resultados!!',
  'enableSorting' => true,
  'ajaxUpdate'=>false,
  'filter'=>$dataProvider2, 
  'grid_mode'=>'grid',
  'filename'=>'listado_'.date('d-m-Y H-i'),
  'exportType'=>'Excel5',
  'summaryText' => 'Mostrando {end} de {count} resultados',
  'template' => "{summary}\n{pager}\n{items}\n{pager}",
  'pager'=>array(
              'header'=>'',
              'firstPageLabel'=>'Primero',
              'lastPageLabel'=>'Ultimo',
              'nextPageLabel'=>'Siguiente',
              'prevPageLabel'=>'Anterior',
            ),
  'rowHtmlOptionsExpression' => 'array("id"=>$data->id_exp)',
  'columns'=>array(
      /*array(
            'header' => '<i class="icon-certificate"></i>',
            'type' => 'raw',
            'value' => '($data->importancia="ALTA") ? CHtml::image(Yii::app()->baseUrl ."/images/chicored.png" ): CHtml::image(Yii::app()->baseUrl ."/images/chicogreen.png")',
      ),*/
      array(
            'header' => '<i class="icon-info-sign icon-white"></i>',
            'type' => 'raw',
            'filterHtmlOptions'=>array(
                                  'class'=>"icon-repeat",
                                  'href'=>"#", 
                                  'rel'=>"tooltip",
                                  'title'=>"Limpiar la Busqueda",
                                  'style'=>'background-color:#0099FF; cursor:pointer;',
                                  'width'=>'20px','id'=>'form-reset-button',
                                ),
            'value' => '((strtotime($data->fecha_inicio)+8035200)<=time()) ? CHtml::image(Yii::app()->baseUrl ."/images/chicored.png" ): CHtml::image(Yii::app()->baseUrl ."/images/chicogreen.png")',
      ),
      array(
      			'header' => 'Situación',
      			'type' => 'raw',
      			'filter'=>CHtml::dropDownList('prioridad', (isset($_GET["prioridad"])?$_GET["prioridad"]:'2'), array('2'=>'Filtro','0'=>'2_semanas','1'=>'Recientes',)),
      			'value' => '((strtotime($data->fecha_inicio)+8035200)<time()) ? "2_semanas" : "Recientes"',
            // 'htmlOptions' =>array('style'=>'color:((strtotime($data->fecha_inicio)+8035200)<time()) ? "\'red\'" : "\'green\'"')
      ),
      array(
              'name' => 'num_expediente',
              'header' => 'N&deg; de Expediente',
              'value' => '$data->num_expediente',
              'htmlOptions'=>array('style'=>'text-align: center; font-weight:bold;','width'=>'200px'),
      ),
      array(
              'name' => 'fecha_inicio',
              'header' => 'Fecha Inicio',
              'value' => 'Yii::app()->dateFormatter->format("dd/MM/y", strtotime($data->fecha_inicio))',
              'htmlOptions'=>array('style'=>'text-align: center;'),
      ),
		  'causante',
		  array(
            'name' => 'asunto',
            'header' => 'Asunto',
            'value' => '$data->asunto',
            'htmlOptions'=>array('width'=>'600px'),
      ),
		  array(
           'name' => 'localidades_id_localidad',
           'header' => 'Localidad',
           'value' => '$data->localidadesIdLocalidad->descripcion',
           'filter' => Localidades::getList(),
           'htmlOptions'=>array('width'=>'400px'),
      ),
      'tipo',
      'importancia',
     	array(
            'class'=>'CButtonColumn',
            'header'=>'Accion',
            'template'=>'{views}{prior}',
            'buttons'=>array(
                  'views' => array(
			                    'label'=>'<i class="icon-search"></i>&nbsp;',
			                    'url'=>'Yii::app()->createUrl("expedientes/view", array("id"=>$data->id_exp))',
			                    'options'=>array('title'=>'Detalle Expediente', 'class'=>'btn btn-mini'),
               				       ),
                  'prior' => array(
                            'label'=>'<i class="icon-flag"></i>&nbsp;',
                            'url'=>'Yii::app()->createUrl("expedientes/view2", array("id"=>$data->id_exp))',
                            'options'=>array(
                                  'title'=>'Prioridad', 
                                  'role'=>"button",
                                  'class'=>"btn btn-mini",
                                  'data-toggle'=>"modal",
                                ),
                            ),
                      ),
      	),

      array(
            'header'=>'Exp.',
            'type' => 'raw',
            // 'filterHtmlOptions'=>array('style'=>'background-color:#009966;',),
            'filter'=>CHtml::htmlButton('<i class="icon-list"></i>', array("submit" => array('expedientes/adminExport','Expedientes'=>$expedientes), 'class'=>"btn btn-success btn-mini", 'title'=>"Exportar a Excel",)),
            'value'=>'',
      ),  
	),
)); ?>



<h2 style="text-align:center;"><u>Tramitaciones del Expediente N° </u></h2>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'tramitaciones',
    'dataProvider'=>$dataProviderTramitaciones,
    'enableSorting' => false,
    'emptyText'=>'Ningun Expediente Seleccionado!!',
    'summaryText' => 'El expediente paso por {count} oficinas',
    'columns'=>array(
    //'id_tramite',
    //'expedientes_id_exp',
    //'num_expediente',
    array(
              'name' => 'expedientes_id_exp',
              'header' => 'N&deg; de Expediente',
              'value' => '$data->expedientesIdExp->num_expediente',
              'htmlOptions'=>array('style'=>'text-align: center; font-weight:bold;'),
              'filter' => false,
    ),
    array(
              'name' => 'fecha_tramite',
              'header' => 'Fecha del Pase',
              'value' => 'Yii::app()->dateFormatter->format("dd/MM/y", strtotime($data->fecha_tramite))',
              'htmlOptions'=>array('style'=>'text-align: center;'),
              // 'footer'=>""
    ),
    'observacion',
    'cantidad_folios',
    array(
          'name' => 'oficinas_id_oficina',
          'header' => 'Oficina',
          'value' => '$data->oficinasIdOficina->descripcion',
          'filter' => '',
    ),
    array(
          'name' => 'estado',
          'header' => 'Estado en Oficina',
          'value' => '$data->estado',
          'filter' => '',
    ),
    array(
          'name' => 'estado_tramite',
          'header' => 'Estado del Tramite',
          'value' => '$data->estado_tramite',
          'filter' => '',
    ),
    array(
            'class'=>'CButtonColumn',
            'header'=>'Ver',
            'template'=>'{obs}',
            'buttons'=>array(
                  'obs' => array(
                          'label'=>'<i class="icon-zoom-in"></i>&nbsp;',
                          'url'=>'Yii::app()->createUrl("observaciones/admin", array("id"=>$data->id_tramite))',
                          'options'=>array('title'=>'observaciones', 'class'=>'btn btn-mini'),
                             ),
                      ),
        ),
  ),
)); 
?>
