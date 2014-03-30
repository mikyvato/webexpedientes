<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="es" />
	<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/bootstrap.min.css'); ?>
	<?php //Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.min.css" media="print" />
	
	<title><?php echo CHtml::encode($this->pageTitle);?></title>
</head>
<style type="text/css">
	body { padding-top: 80px; }
</style>

<body>
<div class="conteiner row-fluid">
	<div class="span12">
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="navbar-inner">
				<div class="container">
					<div class="span1"> 
						<a class="brand" href="#"><img border="1" align="right" height="35" width="39" 
						   src="<?php echo Yii::app()->theme->baseUrl; ?>/img/iconodau.png">
						</a>
					</div>
					<div class="span1">
						<a class="brand" align="left" href="#"><?php echo CHtml::encode(Yii::app()->name);?></a>
					</div>
				   	<?php 
					   	$home=true;
						$usuarios=false;
						$admin2=false;
						$expedientes=false;
						$departamentos=false;
						$tramitaciones=false;
						$oficinas=false;
						$deplocalidad=false;
						$localidad=false;
						$expadmin=false;
						$tramitesadmin=false;
						$nuevo=false;
					

					if (yii::app()->user->checkAccess('admin')){
						$home=false;
						$usuarios=true;
						$expedientes=true;
						$departamentos=true;
						$estados=true;
						$tramitaciones=true;
						$oficinas=true;
						$deplocalidad=true;
						$localidad=true;
					}
					if (yii::app()->user->checkAccess('op1')){
						$nuevo=true;
						$admin2=true;
						$tramitesadmin=true;
						$home=false;
						
					}
					if (yii::app()->user->checkAccess('director')){
						$tramitesadmin=true;
						$expadmin=true;
						$home=false;
					
					}
					if (yii::app()->user->checkAccess('op2')){
						$tramitesadmin=true;
						$home=false;
					}
		   			$this->widget('zii.widgets.CMenu',array(
				  		'htmlOptions'=>array('class'=>'nav pull-right'),
				  		'encodeLabel'=>false,
				  		'items'=>array(
							  		array('label'=>'<div class="row">&nbsp</div><i class="icon-home icon-white">&nbsp</i> Home',
							  			  'url'=>array('/site/index'),'visible'=>$home),
							  		array('label'=>'<div class="row">&nbsp</div><i class="icon-pencil icon-white">&nbsp</i> Nuevo',
									      'url'=>array('/expedientes/create'),'visible'=>$nuevo),
							  		array('label'=>'<div class="row">&nbsp</div><i class="icon-folder-open icon-white">&nbsp</i> Expedientes',
									      'url'=>array('/expedientes/admin2'),'visible'=>$admin2),
							  		array('label'=>'<div class="row">&nbsp</div><i class="icon-folder-open icon-white">&nbsp</i> Expedientes',
									      'url'=>array('/expedientes/admin'),'visible'=>$expadmin),
							  		array('label'=>'<div class="row">&nbsp</div><i class="icon-share-alt icon-white">&nbsp</i> Tramitaciones',
									      'url'=>array('/tramitaciones/admin'),'visible'=>$tramitesadmin),
									array('label'=>'<div class="row">&nbsp</div>Departamentos',
										  'url'=>array('/departamentos/index'),'visible'=>$departamentos),
									array('label'=>'<div class="row">&nbsp</div>Oficinas', 
										  'url'=>array('/oficinas/index',),'visible'=>$oficinas),
									array('label'=>'<div class="row">&nbsp</div>Usuarios',
									      'url'=>array('/usuarios/index'),'visible'=>$usuarios),
									array('label'=>'<div class="row">&nbsp</div><i class="icon-folder-open icon-white">&nbsp</i> Expedientes',
									      'url'=>array('/expedientes/index'),'visible'=>$expedientes),
									array('label'=>'<div class="row">&nbsp</div><i class="icon-share-alt icon-white">&nbsp</i> Tramitaciones',
									      'url'=>array('/tramitaciones/index'),'visible'=>$tramitaciones),
									array('label'=>'<div class="row">&nbsp</div>Oficinas',
									      'url'=>array('/oficinas/index'),'visible'=>$oficinas),
									array('label'=>'<div class="row">&nbsp</div>Dep_localidades',
									      'url'=>array('/depLocalidad/index'),'visible'=>$deplocalidad),
									array('label'=>'<div class="row">&nbsp</div>Localidades',
									      'url'=>array('/localidades/index'),'visible'=>$localidad),
									array('label'=>'<div class="row">&nbsp</div><i class="icon-user icon-white"></i> Login',
									      'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
									array('label'=>'<div class="row">&nbsp</div><i class="icon-off icon-white"></i> Logout ('.Yii::app()->user->name.')',
									      'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
									),)); 
					?>
			    </div>
			    <div class="row-fluid" style="background-color:#CC0000;height:8px">.</div>
		    </div>
        </div>	
    	<?php if (Yii::app()->user->isGuest){echo $content;}?>
    	<div class="row-fluid">

			<!--div>
				<?php 
				  /*if(isset($this->breadcrumbs)):
					$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); 
				  endif*/
				?>
			</div>
			<div class="container"-->
			  <?php if (!Yii::app()->user->isGuest){ echo $content;} ?>
			<!--/div-->
			
			<br>&nbsp;
			<br>&nbsp;
			<br>&nbsp;

		</div>
    </div>

    <div class="navbar navbar-inner  navbar-fixed-bottom">
	  <p class="text-muted credit"><center>&copy;&nbsp;<?php echo date('Y'); ?> D.A.U. 
	  - Oficina de Inform&aacute;tica. Todos los derechos Reservados.&nbsp;&nbsp;&#124;&nbsp;&nbsp;
	  <a href="https://www.facebook.com/dau.tuc" target="_blank"><i class="icon-thumbs-up"></i></a></center></p>
    </div>
</div>
</body>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
</html>
