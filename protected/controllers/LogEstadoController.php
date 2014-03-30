<?php

class LogEstadoController extends Controller
{
	public $layout='//layouts/column2';

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	public function accessRules()
	{
	return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','view'),
					'users'=>array('*'),
				),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('create','update','admin','aceptar','cambiar','asignar'),
					'roles'=>array('admin','op1','director','op2'),
				),
				array('array',
					'actions'=>array('admin'),
					'roles'=>array('director'),
					),
				array('allow', // allow admin user to perform 'admin' and 'delete' actions
					'actions'=>array('admin','delete'),
					'users'=>array('admin'),
				),
				array('deny',  // deny all users
					'users'=>array('*'),
				),
			);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionCreate()
	{
		$model=new LogEstado;

		if(isset($_POST['LogEstado']))
		{
			$model->attributes=$_POST['LogEstado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_log_estado));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['LogEstado']))
		{
			$model->attributes=$_POST['LogEstado'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_log_estado));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('LogEstado');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$model=new LogEstado('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LogEstado']))
			$model->attributes=$_GET['LogEstado'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionAsignar($id)
	{
    /*    $model=$this->loadModel($id);
		if(isset($_POST['LogEstado']))
		{
			$model->attributes=$_POST['LogEstado'];
			$model->estados_id_estado = 1;
			$model->observacion= strtoupper($model->observacion);
			if($model->save())

			$this->redirect(array('tramitaciones/admin'));
		}
		$this->render('asignar',array(
			'model'=>$model,
		//$this->render('asignar',array('model'=>$model,'action'=>2,));

$model->attributes=$_POST['Expedientes'];
			$model->fecha_inicio=date('Y-m-d');
			$model->fecha_pedido=Yii::app()->dateFormatter->format("Y-m-d", strtotime($model->fecha_pedido));
			$model->ref_exp= strtoupper($model->ref_exp);
            $model->agregado_exp= strtoupper($model->agregado_exp);
            $model->causante= strtoupper($model->causante);
            $model->asunto= strtoupper($model->asunto);
            $model->dirigido_a= strtoupper($model->dirigido_a);
            $model->usuarios_id_usuario=Yii::app()->user->id;
            $model->letra= strtoupper($model->letra);
            $model->num_expediente=strtoupper($_POST['Expedientes']['number1'].'/'.$_POST['Expedientes']['number2'].'-'.$_POST['Expedientes']['letra'].'-'.date('Y'));
			
			if($model->save()){
					$trami=new Tramitaciones;
					$trami->expedientes_id_exp=$model->id_exp;
					$trami->fecha_tramite=date('Y-m-d');
					$trami->observacion='ingreso a mesa de entrada';
					$trami->cantidad_folios=$model->cantidad_folios;
					$trami->usuarios_id_usuario=$model->usuarios_id_usuario;
					$trami->estado_tramite='EN CURSO';
					$trami->oficinas_id_oficina='1';
					$ofi = Oficinas::model()->findByPk(1);
					$trami->oficina_origen=$ofi->descripcion;
					$trami->save();
					
				    $log_estado=new logEstado;
				    $log_estado->fecha=date('Y-m-d');
				    $log_estado->detalle_estado='ACEPTADO';
				    $log_estado->tramitaciones_id_tramite=$trami->id_tramite;
				    $log_estado->oficinas_id_oficina=$trami->oficinas_id_oficina;
				    $log_estado->save(); 

				    Yii::app()->user->setFlash('success',"El expediente se guardo correctamente.");

				    $this->redirect(array('admin','id'=>$model->id_exp));
			}







*/

	}

	public function loadModel($id)
	{
		$model=LogEstado::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='log-estado-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
