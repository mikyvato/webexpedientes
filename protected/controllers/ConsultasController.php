<?php

class ConsultasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	public function actionIndex (){

        $criteria = new CDbCriteria;

		$tramitacion = Tramitaciones::model()->findAll($criteria);

		

		$this->render('index',array(
			'tramitacion'=>$tramitacion)
		);
	}
}
