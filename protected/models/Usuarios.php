<?php

class Usuarios extends CActiveRecord
{
	public function tableName()
	{
		return 'usuarios';
	}

	public function rules()
	{
		return array(
			array('nombre, apellido, username, password, oficinas_id_oficina', 'required'),
			array('oficinas_id_oficina', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			array('apellido', 'length', 'max'=>45),
			array('mail', 'length', 'max'=>70),
			array('username, password', 'length', 'max'=>128),
			array('created_at, last_login', 'safe'),
			array('id_usuario, nombre, apellido, mail, username, password, created_at, last_login, oficinas_id_oficina', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'expedientes' => array(self::HAS_MANY, 'Expedientes', 'usuarios_id_usuario'),
			'tramitaciones' => array(self::HAS_MANY, 'Tramitaciones', 'usuarios_id_usuario'),
			'oficinasIdOficina' => array(self::BELONGS_TO, 'Oficinas', 'oficinas_id_oficina'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'mail' => 'Mail',
			'username' => 'Username',
			'password' => 'Password',
			'created_at' => 'Created At',
			'last_login' => 'Last Login',
			'oficinas_id_oficina' => 'Oficinas Id Oficina',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('oficinas_id_oficina',$this->oficinas_id_oficina);

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
        return CHtml::listData(Usuarios::model()->findAll(),'id_usuario', 'username');
    }


	public function validatePassword($password)
   	{
    	return $this->hashPassword($password)===$this->password;
   	}

 	public function hashPassword($password)
  	{
    	return $password;
  	}
}
