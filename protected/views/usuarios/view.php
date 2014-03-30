<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarioses'=>array('index'),
	$model->id_usuario,
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Nuevo Usuario', 'url'=>array('create')),
	array('label'=>'Modificar Usuario', 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>'Eliminar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Vista Usuarios #<?php echo $model->id_usuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'nombre',
		'apellido',
		'mail',
		'username',
		'password',
		'created_at',
		'last_login',
		'oficinas_id_oficina',
	),
)); ?>

<h1>Crear Roles de Usuarios</h1>
<?php $form=$this->beginWidget("CActiveForm"); ?>

<?php echo $form->labelEx($role,"name"); ?><br>
<?php echo $form->textField($role,"name"); ?><br>
<?php echo $form->error($role,"name"); ?><br>

<?php echo $form->labelEx($role,"description"); ?><br>
<?php echo $form->textArea($role,"description"); ?><br>
<?php echo $form->error($role,"description"); ?>

<?php echo CHtml::submitButton("Create",array("class"=>"btn btn-primary"));?>
<?PHP $this->endWidget(); ?>

<ul>
<?php foreach (Yii::app()->authManager->getAuthItems() as $data ): ?>
<?php $enabled = Yii::app()->authManager->checkAccess($data->name,$model->id_usuario) ?>
<li>
	<a href="#">
	<h4><?php echo $data->name; ?></h4>
	<h2><?php if ($data->type == 0) echo "Role";?></h2>
	<h2><?php if ($data->type == 1) echo "Tarea";?></h2>
	<h2><?php if ($data->type == 2) echo "Operaci&oacuten";?></h2>
<?php echo CHtml::link( $enabled ? "Off" : "On",array("usuarios/assign","id"=>$model->id_usuario,"item"=>$data->name));?>
   <?php echo $enabled ? "<span>Enabled</span>" : ""; ?>
   <p><?php echo $data->description; ?></p>
   </a>
</li>
<?php endforeach; ?>
</ul>

