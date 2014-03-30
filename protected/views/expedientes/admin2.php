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
<?php //-----------Script para actualizar la tabla tramitaciones---------- ?>
<script>
  function mostrarDetalles(){
    var id_exp = $.fn.yiiGridView.getSelection('expedientes');
    var parametro = { 'id_exp' : id_exp};
    $.ajax(
    {
      type: "POST",
      url: jQuery(this).attr('href'),
      data: parametro,
      success: function (response) {
        $("#fields").html(response);
      }
  });
  }
</script>

<?php //------------------Script para limpiar los filtros----------------- ?>
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
<?php //--------------------------------------------------------------------- ?>


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
<?php $this->endWidget() ?>
<?php //------------------------------------------------------- ?>

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
      array(
          'name' => 'tipo',
          'header' => 'Tipo',
          'value' => '$data->tipo',
          'filter' => Expedientes::getTipoMenu2(),
         // 'htmlOptions'=>array('width'=>'400px'),
      ),
      array(
          'class'=>'CButtonColumn',
          'header'=>'Acciones',
          'filterHtmlOptions'=>array(
                                'class'=>"icon-repeat",
                                'href'=>"#", 
                                'rel'=>"tooltip",
                                'title'=>"Limpiar la Busqueda",
                                'style'=>'background-color:#0099FF; cursor:pointer;',
                                'width'=>'20px','id'=>'form-reset-button',
                              ),
          'template'=>'{exp}',
              'buttons'=>array(
                    'exp' => array(
                      'label'=>'<i class="icon-book"></i>&nbsp;',
                      'url'=>'Yii::app()->createUrl("expedientes/view3", array("id"=>$data->id_exp,"asDialog"=>1))',
                      'options' => array(
                                'rel' => 'tooltip', 
                                'data-toggle' => 'tooltip',
                                'title'=> 'Ver Expediente',
                                'ajax' => array(
                                        'type' => 'POST',
                                        'url' => "js:$(this).attr('href')",
                                        'update'=>'#id_view',
                                          ),
                                  ),
                            ),    // exp boton
                      ),
      ),
      array(
          'header'=>'Exp.',
          'type' => 'raw',
          'filter'=>CHtml::htmlButton('<i class="icon-list"></i>', array("submit" => array('expedientes/adminExport','Expedientes'=>$expedientes), 'class'=>"btn btn-success btn-mini", 'title'=>"Exportar a Excel",)),
          'value'=>'',
      ),  
	),
)); ?>
<?php //----------- Div para Mostrar las tramitaciones del expediente clickeado -------------   ?>
<div class="row-fluid">
  <div class="span12 well well-samll" id="fields">
  </div>
</div>
<?php //-------------------------------------------------------------------------------------   ?>


