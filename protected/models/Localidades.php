<?php

class Localidades extends CActiveRecord
{
	public function tableName()
	{
		return 'localidades';
	}

	public function rules()
	{
		return array(
			array('descripcion, dep_localidad_id_dep_localidad', 'required'),
			array('dep_localidad_id_dep_localidad', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>45),
			array('id_localidad, descripcion, dep_localidad_id_dep_localidad', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'expedientes' => array(self::HAS_MANY, 'Expedientes', 'localidades_id_localidad'),
			'depLocalidadIdDepLocalidad' => array(self::BELONGS_TO, 'DepLocalidad', 'dep_localidad_id_dep_localidad'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_localidad' => 'Id Localidad',
			'descripcion' => 'Descripcion',
			'dep_localidad_id_dep_localidad' => 'Dep Localidad Id Dep Localidad',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_localidad',$this->id_localidad);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('dep_localidad_id_dep_localidad',$this->dep_localidad_id_dep_localidad);

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
        return CHtml::listData(Localidades::model()->findAll(),'id_localidad', 'descripcion');
    }

}
