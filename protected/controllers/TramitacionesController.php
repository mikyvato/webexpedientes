<?php

class TramitacionesController extends Controller
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
				'actions'=>array('create','update','admin','admin2','aceptar','cambiar','asignar'),
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

	public function actionAceptar($id)
	{
        $model=$this->loadModel($id);
		$model->estado="ACEPTADO";
		$model->save();
		if($model->save()){
					$estado1=new LogEstado;
						$estado1->tramitaciones_id_tramite=$model->id_tramite;
						$estado1->fecha=date('Y-m-d');
						$estado1->detalle_estado="ACEPTADO";
						$estado1->oficinas_id_oficina=$model->oficinas_id_oficina;
						$estado1->hora=date('H:i:s');
						$estado1->dias_oficina='0';
						$estado1->save();
			$this->redirect(array('admin'));
		}
		$this->render('create',array('model'=>$model,));
	}
	public function actionCreate($id)
	{
		
		$model=$this->loadModel($id);
		$model->estado="CURSO";
		
		$user = UsuariosController::loadModel(yii::app()->user->id);
		$model2=new Tramitaciones;
		$model2->expedientes_id_exp=$model->expedientes_id_exp;
		$model2->fecha_tramite=date('Y-m-d');
		$model2->usuarios_id_usuario=yii::app()->user->id;
		$model2->oficinas_id_oficina=$user->oficinas_id_oficina;
		$model2->oficina_origen=$user->oficinasIdOficina->descripcion;
		$model2->estado_tramite="EN CURSO";
		$model2->estado="ASIGNADO";
		if(isset($_POST['Tramitaciones']))
		{
			$model->save();
			$model2->attributes=$_POST['Tramitaciones'];
			if($model2->save()){
					$estado1=new LogEstado;
						$estado1->tramitaciones_id_tramite=$model->id_tramite;
						$estado1->fecha=date('Y-m-d');
						$estado1->detalle_estado="CURSO";
						$estado1->oficinas_id_oficina=$model->oficinas_id_oficina;
						$estado1->hora=date('H:i:s');
						$estado1->dias_oficina='0';
						$estado1->save();
					$estado=new LogEstado;
						$estado->tramitaciones_id_tramite=$model2->id_tramite;
						$estado->fecha=date('Y-m-d');
						$estado->detalle_estado="ASIGNADO";
						$estado->oficinas_id_oficina=$model2->oficinas_id_oficina;
						$estado->hora=date('H:i:s');
						$estado->dias_oficina='0';
						$estado->save();
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'model2'=>$model2,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Tramitaciones']))
		{
			$model->attributes=$_POST['Tramitaciones'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_tramite));
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
		$dataProvider=new CActiveDataProvider('Tramitaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/*public function actionIndex()
	{
    if (!yii::app()->user->checkAccess('admin')){
    	$user = UsuariosController::loadModel(yii::app()->user->id);
    	
    	$dataProvider=new CActiveDataProvider('Tramitaciones',array(
    		'criteria'=>array(
    			'condition'=>'oficinas_id_oficina = '.$user->oficinas_id_oficina,
    			'order'=>'fecha_tramite DESC',
    			),
    		));
    } */

	public function actionAdmin()
	{
		$user = UsuariosController::loadModel(yii::app()->user->id);
		$model = new Tramitaciones('search');
		$model2 = new Tramitaciones('search');
		$model3 = new LogEstado('search');
		$model->unsetAttributes(); 
		$model2->unsetAttributes(); 
		$model3->unsetAttributes();
		$model->oficinas_id_oficina=$user->oficinas_id_oficina;
		$model->estado="ASIGNADO";
		$model2->oficinas_id_oficina=$user->oficinas_id_oficina;
		$model2->estado="ACEPTADO";
		$model3->oficinas_id_oficina=$user->oficinas_id_oficina;

		//------------------??????------------------------//
		$model3->detalle_estado="FINALIZADO";

		if(isset($_GET['LogEstado'])){
			$model->attributes=$_GET['Tramitaciones'];
			$model2->attributes=$_GET['Tramitaciones'];
			$model3->attributes=$_GET['LogEstado'];
		}
		

		$this->render('admin',array(
			'model'=>$model,
			'model2'=>$model2,
			'model3'=>$model3,
		));
	}


	public function loadModel($id)
	{
		$model=Tramitaciones::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La web solicitada no existe.');
		return $model;
	}

	

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tramitaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
