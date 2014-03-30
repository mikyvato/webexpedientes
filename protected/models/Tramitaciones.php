<?php

class Tramitaciones extends CActiveRecord
{
	public function tableName()
	{
		return 'tramitaciones';
	}

	public function rules()
	{
		return array(
			array('expedientes_id_exp, fecha_tramite, usuarios_id_usuario, oficinas_id_oficina, oficina_origen', 'required'),
			array('expedientes_id_exp, cantidad_folios, usuarios_id_usuario, oficinas_id_oficina', 'numerical', 'integerOnly'=>true),
			array('oficina_origen, estado_tramite, estado', 'length', 'max'=>45),
			array('observacion', 'safe'),
			array('id_tramite, expedientes_id_exp, fecha_tramite, observacion, cantidad_folios, usuarios_id_usuario, oficinas_id_oficina, oficina_origen, estado_tramite, estado', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'logEstados' => array(self::HAS_MANY, 'LogEstado', 'tramitaciones_id_tramite'),
			'observaciones' => array(self::HAS_MANY, 'Observaciones', 'tramitaciones_id_tramite'),
			'expedientesIdExp' => array(self::BELONGS_TO, 'Expedientes', 'expedientes_id_exp'),
			'oficinasIdOficina' => array(self::BELONGS_TO, 'Oficinas', 'oficinas_id_oficina'),
			'usuariosIdUsuario' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id_usuario'),
			'countObs' => array(self::STAT, 'Observaciones', 'tramitaciones_id_tramite', 'select'=>'COUNT(t.id_observacion)'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_tramite' => 'Id Tramite',
			'expedientes_id_exp' => 'Expedientes Id Exp',
			'fecha_tramite' => 'Fecha Tramite',
			'observacion' => 'Observacion',
			'cantidad_folios' => 'Cantidad Folios',
			'usuarios_id_usuario' => 'Usuarios Id Usuario',
			'oficinas_id_oficina' => 'Oficinas Id Oficina',
			'oficina_origen' => 'Oficina Origen',
			'estado_tramite' => 'Estado Tramite',
			'estado' => 'Estado',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_tramite',$this->id_tramite);
		$criteria->compare('expedientes_id_exp',$this->expedientes_id_exp);
		$criteria->compare('fecha_tramite',$this->fecha_tramite,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('cantidad_folios',$this->cantidad_folios);
		$criteria->compare('usuarios_id_usuario',$this->usuarios_id_usuario);
		$criteria->compare('oficinas_id_oficina',$this->oficinas_id_oficina);
		$criteria->compare('oficina_origen',$this->oficina_origen,true);
		$criteria->compare('estado_tramite',$this->estado_tramite,true);
		$criteria->compare('estado',$this->estado,true);
//--------------------------------------------------------------------------------------------------------
        if (isset($_GET['prioridad'])) {
			$prioridad = $_GET['prioridad'];
		
			if ($prioridad == 0) {
				$criteria->addCondition('(UNIX_TIMESTAMP(fecha_inicio)+86400)<UNIX_TIMESTAMP()');
			}
			elseif ($prioridad == 1)  {
				$criteria->addCondition('(UNIX_TIMESTAMP(fecha_inicio)+86400)>=UNIX_TIMESTAMP()');
			}
			elseif ($prioridad == 2) {
				$criteria->addCondition('1=1');
			}
		}
//-------------------------------------------------------------------------------------------------------

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getEstado()
	{
		return array(
				//false=>'Seleccione tipo',
				'EN CURSO'=>'EN CURSO',
				'TERMINADO'=>'TERMINADO',
				'EXTERNO'=>'EXTERNO',
			);
	}

	public function loadLastDay($id, $estados)
	{
		$logEstado=LogEstado::model()->findAll(
			array(
				'condition'=>'tramitaciones_id_tramite=:idtramite and detalle_estado like :estado and id_log_estado=(SELECT MAX(id_log_estado) from log_estado)', 
				'params'=>array('idtramite'=>$id, 'estado'=>$estados)));
		if ($logEstado===null)
			throw new CHttpException(404,"El registro no existe");
		//echo "<pre>";
		//print_r($logEstado);
		//echo "</pre>";
		//yii::app()->end();
		$fecha = '';
		foreach ($logEstado as $estado) {
			$fecha = $estado['fecha'];
		}
		return $fecha;	
	}
	
}
