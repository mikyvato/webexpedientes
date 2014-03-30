<?php

class Oficinas extends CActiveRecord
{
	public function tableName()
	{
		return 'oficinas';
	}

	public function rules()
	{
		return array(
			array('descripcion, departamentos_id_departamento', 'required'),
			array('departamentos_id_departamento', 'numerical', 'integerOnly'=>true),
			array('descripcion, detalle', 'length', 'max'=>45),
			array('id_oficina, descripcion, detalle, departamentos_id_departamento', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'logEstados' => array(self::HAS_MANY, 'LogEstado', 'oficinas_id_oficina'),
			'observaciones' => array(self::HAS_MANY, 'Observaciones', 'oficinas_id_oficina'),
			'departamentosIdDepartamento' => array(self::BELONGS_TO, 'Departamentos', 'departamentos_id_departamento'),
			'tramitaciones' => array(self::HAS_MANY, 'Tramitaciones', 'oficinas_id_oficina'),
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'oficinas_id_oficina'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_oficina' => 'Id Oficina',
			'descripcion' => 'Descripcion',
			'detalle' => 'Detalle',
			'departamentos_id_departamento' => 'Departamentos Id Departamento',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_oficina',$this->id_oficina);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('departamentos_id_departamento',$this->departamentos_id_departamento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	//FUNCION PARA LISTAR EL COMBO
    public static function getList()
    {
        return CHtml::listData(Oficinas::model()->findAll(),'id_oficina', 'descripcion');
    }
}
