<?php

class LogEstado extends CActiveRecord
{
	public function tableName()
	{
		return 'log_estado';
	}

	public function rules()
	{
		return array(
			array('fecha, detalle_estado, tramitaciones_id_tramite, oficinas_id_oficina', 'required'),
			array('tramitaciones_id_tramite, oficinas_id_oficina, dias_oficina', 'numerical', 'integerOnly'=>true),
			array('detalle_estado', 'length', 'max'=>45),
			array('hora', 'safe'),
			array('id_log_estado, fecha, detalle_estado, tramitaciones_id_tramite, oficinas_id_oficina, dias_oficina, hora', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'oficinasIdOficina' => array(self::BELONGS_TO, 'Oficinas', 'oficinas_id_oficina'),
			'tramitacionesIdTramite' => array(self::BELONGS_TO, 'Tramitaciones', 'tramitaciones_id_tramite'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_log_estado' => 'Id Log Estado',
			'fecha' => 'Fecha',
			'detalle_estado' => 'Detalle Estado',
			'tramitaciones_id_tramite' => 'Tramitaciones Id Tramite',
			'oficinas_id_oficina' => 'Oficinas Id Oficina',
			'dias_oficina' => 'Dias Oficina',
			'hora' => 'Hora',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_log_estado',$this->id_log_estado);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('detalle_estado',$this->detalle_estado,true);
		$criteria->compare('tramitaciones_id_tramite',$this->tramitaciones_id_tramite);
		$criteria->compare('oficinas_id_oficina',$this->oficinas_id_oficina);
		$criteria->compare('dias_oficina',$this->dias_oficina);
		$criteria->compare('hora',$this->hora,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
