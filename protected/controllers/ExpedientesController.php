<?php

class ExpedientesController extends Controller
{
	public $layout='//layouts/column1';

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
				'actions'=>array('view', 'create','update','delete','adminexport','alta', 'media', 'baja', 'admin1'),
				'roles'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','admin2', 'alta', 'media', 'baja'),
				'roles'=>array('director', 'op1', 'op2'),
				),
			/*array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),*/
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),*/
			array('deny',  // deny all users
                'actions'=>array('update','delete','create'),
				'roles'=>array('director'),
			),
		);
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionView2($id)
	{
		$this->render('view2',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionView3($id)
	{
	if (Yii::app()->request->isAjaxRequest)
    {
        $this->renderPartial('view3', 
            array(
               'model'=>$this->loadModel($id),
             ),false,true);
          if (!empty($_GET['asDialog'])) 
            echo CHtml::script('$("#dlg-detalle").dialog("open")');
        Yii::app()->end();
    }
    else
        $this->render('view', array(
           'model'=>$this->loadModel($id),
         ));
	}

	public function actionCreate()
	{
		$model=new Expedientes;
		
		if(isset($_POST['Expedientes']))
		{
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
					$trami->estado="ACEPTADO";
					$trami->save();
					
				    $log_estado=new logEstado;
				    $log_estado->fecha=date('Y-m-d');
				    $log_estado->detalle_estado='ACEPTADO';
				    $log_estado->tramitaciones_id_tramite=$trami->id_tramite;
				    $log_estado->oficinas_id_oficina=$trami->oficinas_id_oficina;
				    $log_estado->hora=date('H:i:s');
					$log_estado->dias_oficina='0';

				    $log_estado->save(); 

				    Yii::app()->user->setFlash('success',"El expediente se guardo correctamente.");

				    $this->redirect(array('admin','id'=>$model->id_exp));
			}
		}
		
		$this->render('create',array(
			'model'=>$model,
		));
	}

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['Expedientes']))
		{
			$model->attributes=$_POST['Expedientes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_exp));
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
		$dataProvider=new CActiveDataProvider('Expedientes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionAdmin()
	{
		$dataProviderTramitaciones=new CActiveDataProvider(Tramitaciones::model(), array(
																			'keyAttribute'=>'id_tramite',
															  				'criteria'=>array('condition'=>'expedientes_id_exp=-1',),));
		
		if(Yii::app()->request->isAjaxRequest){
			$id_exp = $_GET[0];
			Yii::log("\nAJAX_REQUEST\nPROVOCADO_POR_EL_UPDATE_AL_CGRIDVIEW_TRAMITACIONES"
			."\nidcategoria seleccionada es=".$id_exp,"info");
			$dataProviderTramitaciones->criteria = array('condition'=>'expedientes_id_exp='.$id_exp);
			echo CJSON::encode($dataProviderTramitaciones);
		}

		$dataProvider=new CActiveDataProvider(Expedientes::model(),
												 array(
														'keyAttribute'=>'id_exp',
														'criteria'=>array(),
														'sort'=>array('defaultOrder'=>array('fecha_inicio'=>true),),
												)
						    ); 
	    $dataProvider2=new Expedientes('search');
		$dataProvider2->unsetAttributes();
			if(isset($_GET['Expedientes']))
				$dataProvider2->attributes=$_GET['Expedientes'];

		$this->render('admin',array(
								'dataProvider'=>$dataProvider,
								'dataProviderTramitaciones'=>$dataProviderTramitaciones,
								'dataProvider2'=>$dataProvider2,
							  )
			    );
	}

	public function actionAdmin2()
	{
		if(Yii::app()->request->isAjaxRequest){
		 	$id_exp = $_POST['id_exp'];
		 	$tramitaciones = Tramitaciones::model()->findAll(array(
		 														'condition'=>'expedientes_id_exp=:expediente', 
		 														'params'=>array(
		 																'expediente'=> $id_exp[0],
		 																)
		 													)
		 											);

		  	$this->renderPartial('tablatramitaciones', array('model'=>$tramitaciones));  

			Yii::app()->end();
	 	}

	    $dataProvider2=new Expedientes('search');
		$dataProvider2->unsetAttributes();
			if(isset($_GET['Expedientes']))
				$dataProvider2->attributes=$_GET['Expedientes'];

		$this->render('admin2',array('dataProvider2'=>$dataProvider2,));
	}
	//-------------------------------------------------------------------------------------------------------------
   	public function actionAdminExport()
   	{
   	if(isset($_GET['Expedientes'])){
   		$dataProvider2=new Expedientes('search');
		$dataProvider2->unsetAttributes();
			if(isset($_GET['Expedientes']))
				$dataProvider2->attributes=$_GET['Expedientes'];
			
		date_default_timezone_set('America/Argentina/Tucuman');
		$this->widget('ext.EExcelView', array(  
		  'id'=>'expedientes',
		  'selectableRows'=>1,
		  'dataProvider'=>$dataProvider2->search(),
		  'enableSorting' => true,
		  'enablePagination' => false,
		  'ajaxUpdate'=>false,
		  'filter'=>$dataProvider2, 
		  'grid_mode'=>'export',
		  'filename'=>'listado_'.date('d-m-Y H-i'),
		  'exportType'=>'Excel5', //-Excel5, Excel2007,PDF, HTML
		  'rowHtmlOptionsExpression' => 'array("id"=>$data->id_exp)',
		  'columns'=>array(
		      	array(
		      		'header' => 'Situación',
		      		'type' => 'raw',
		      		'filter'=>CHtml::dropDownList('prioridad', (isset($_GET["prioridad"])?$_GET["prioridad"]:'2'),  
		                                              array('2'=>'Situacion','0'=>'Encajonados','1'=>'En_Curso',)),
		      		'value' => '((strtotime($data->fecha_inicio)+8035200)<time()) ? "Encajonados" : "En_Curso"',
		     	),
		      	array(
		            'name' => 'num_expediente',
		            'header' => 'N de Expediente',
		            'value' => '$data->num_expediente',
		            'htmlOptions'=>array('style'=>'text-align: center; font-weight:bold;'),
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
		            'name' => 'cantidad_folios',
		            'header' => 'Folios',
		            'value' => '$data->cantidad_folios',
		            'htmlOptions'=>array('style'=>'text-align: center;'),
		      	),
				array(
		           'name' => 'localidades_id_localidad',
		           'header' => 'Localidad',
		           'value' => '$data->localidadesIdLocalidad->descripcion',
		           'filter' => Localidades::getList(),
		           'htmlOptions'=>array('width'=>'400px'),
		      	),

			),
		)); 
	 }
   	}
//------------------------------------------------------------------------------------------------------------------------
	public function actionAlta($id)
	{
        $model=$this->loadModel($id);
		$model->importancia="ALTA";
		$model->save();
		if($model->save()){
			$this->redirect(array('create'));
		}
		$this->render('create',array('model'=>$model));
	}

	public function actionMedia($id)
	{
        $model=$this->loadModel($id);
		$model->importancia="MEDIA";
		$model->save();
		if($model->save()){
			$this->redirect(array('expedientes/admin'));
		}
		$this->render('create',array('model'=>$model));
	}
	public function actionBaja($id)
	{
        $model=$this->loadModel($id);
		$model->importancia="BAJA";
		$model->save();
		if($model->save()){
			$this->redirect(array('expedientes/admin'));
		}
		$this->render('create',array('model'=>$model));
	}

    
	public function loadModel($id)
	{
		$model=Expedientes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='expedientes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
