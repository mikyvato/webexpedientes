<?php

class DepLocalidad extends CActiveRecord
{
	public function tableName()
	{
		return 'dep_localidad';
	}

	public function rules()
	{
		return array(
			array('descripcion', 'required'),
			array('descripcion', 'length', 'max'=>45),
			array('id_dep_localidad, descripcion', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'localidades' => array(self::HAS_MANY, 'Localidades', 'dep_localidad_id_dep_localidad'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_dep_localidad' => 'Id Dep Localidad',
			'descripcion' => 'Descripcion',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_dep_localidad',$this->id_dep_localidad);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//FUNCION PARA LISTAR EL COMBO EN FORM DE LOCALIDADES
    public static function getList()
    {
    	return CHtml::listData(DepLocalidad::model()->findAll(),'id_dep_localidad', 'descripcion');
   	}
}
