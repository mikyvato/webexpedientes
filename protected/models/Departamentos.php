<?php

class Departamentos extends CActiveRecord
{
	public function tableName()
	{
		return 'departamentos';
	}

	public function rules()
	{
		return array(
			array('descripcion', 'required'),
			array('descripcion, detalle', 'length', 'max'=>45),
			array('id_departamento, descripcion, detalle', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'oficinases' => array(self::HAS_MANY, 'Oficinas', 'departamentos_id_departamento'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_departamento' => 'Id Departamento',
			'descripcion' => 'Descripcion',
			'detalle' => 'Detalle',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id_departamento',$this->id_departamento);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('detalle',$this->detalle,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	//FUNCION PARA LISTAR EL COMBO EN FORM DE OFICINAS
    public static function getList()
    {
      return CHtml::listData(Departamentos::model()->findAll(),'id_departamento', 'descripcion');
    }
}
