<?php

class Observaciones extends CActiveRecord
{
	public function tableName()
	{
		return 'observaciones';
	}

	public function rules()
	{
		return array(
			array('expedientes_id_exp, tramitaciones_id_tramite, oficinas_id_oficina', 'required'),
			array('expedientes_id_exp, tramitaciones_id_tramite, oficinas_id_oficina', 'numerical', 'integerOnly'=>true),
			array('detalle_observacion, fecha', 'safe'),
			array('id_observacion, detalle_observacion, expedientes_id_exp, tramitaciones_id_tramite, oficinas_id_oficina, fecha', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'expedientesIdExp' => array(self::BELONGS_TO, 'Expedientes', 'expedientes_id_exp'),
			'oficinasIdOficina' => array(self::BELONGS_TO, 'Oficinas', 'oficinas_id_oficina'),
			'tramitacionesIdTramite' => array(self::BELONGS_TO, 'Tramitaciones', 'tramitaciones_id_tramite'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_observacion' => 'Id Observacion',
			'detalle_observacion' => 'Detalle Observacion',
			'expedientes_id_exp' => 'Expedientes Id Exp',
			'tramitaciones_id_tramite' => 'Tramitaciones Id Tramite',
			'oficinas_id_oficina' => 'Oficinas Id Oficina',
			'fecha' => 'Fecha',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_observacion',$this->id_observacion);
		$criteria->compare('detalle_observacion',$this->detalle_observacion,true);
		$criteria->compare('expedientes_id_exp',$this->expedientes_id_exp);
		$criteria->compare('tramitaciones_id_tramite',$this->tramitaciones_id_tramite);
		$criteria->compare('oficinas_id_oficina',$this->oficinas_id_oficina);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
