<?php

class ObservacionesController extends Controller
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
				'actions'=>array('create','update','admin', 'admin2','aceptar','cambiar','asignar', 'view2'),
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

	public function actionCreate($id)
	{
		$user = UsuariosController::loadModel(yii::app()->user->id);
		$model=new Observaciones;
		$model->tramitaciones_id_tramite=$id;
		$model->fecha=date('Y-m-d');
		$model->oficinas_id_oficina=$user->oficinas_id_oficina;
		$model->expedientes_id_exp=$model->tramitacionesIdTramite->expedientes_id_exp;

		if(isset($_POST['Observaciones']))
		{
			$model->attributes=$_POST['Observaciones'];
			if($model->save())
				$this->redirect(array('tramitaciones/admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Observaciones']))
		{
			$model->attributes=$_POST['Observaciones'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_observacion));
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
		$dataProvider=new CActiveDataProvider('Observaciones');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin($id)
	{
		$model=new Observaciones('search');
		$model->unsetAttributes(); 
		$model->tramitaciones_id_tramite=$id;
		if(isset($_GET['Observaciones']))
			$model->attributes=$_GET['Observaciones'];

		// $this->render('admin',array('model'=>$model,));
        $this->render('admin',array('model'=>$model, false,true));
	}

	public function loadModel($id)
	{
		$model=Observaciones::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='observaciones-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionView2($id)
	{
	if (Yii::app()->request->isAjaxRequest)
    {
        $this->renderPartial('view2', 
            array(
               'model'=>$this->loadModel($id),
             ),false,true);
          if (!empty($_GET['asDialog'])) 
            echo CHtml::script('$("#dlg-obs").dialog("open")');
        Yii::app()->end();
    }
    else
        $this->render('view2', array(
           'model'=>$this->loadModel($id),
         ));
	}


}
