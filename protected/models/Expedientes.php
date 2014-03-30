<?php

class Expedientes extends CActiveRecord
{
	public function tableName()
	{
		return 'expedientes';
	}

	public function rules()
	{
		return array(
			array('num_expediente, fecha_inicio, fecha_pedido, dirigido_a, causante, asunto, cantidad_folios, usuarios_id_usuario, localidades_id_localidad, number1, number2, letra, tipo', 'required'),
			array('cantidad_folios, usuarios_id_usuario, localidades_id_localidad, number1, number2', 'numerical', 'integerOnly'=>true),
			array('num_expediente, ref_exp', 'length', 'max'=>18),
			array('agregado_exp, causante, importancia, tipo', 'length', 'max'=>45),
			array('dirigido_a', 'length', 'max'=>30),
			array('letra', 'length', 'max'=>3),
			array('id_exp, num_expediente, fecha_inicio, fecha_pedido, ref_exp, agregado_exp, dirigido_a, causante, asunto, cantidad_folios, usuarios_id_usuario, localidades_id_localidad, number1, number2, letra, importancia, tipo', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'localidadesIdLocalidad' => array(self::BELONGS_TO, 'Localidades', 'localidades_id_localidad'),
			'usuariosIdUsuario' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id_usuario'),
			'observaciones' => array(self::HAS_MANY, 'Observaciones', 'expedientes_id_exp'),
			'tramitaciones' => array(self::HAS_MANY, 'Tramitaciones', 'expedientes_id_exp'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_exp' => 'Id Exp',
			'num_expediente' => 'Num Expediente',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_pedido' => 'Fecha Pedido',
			'ref_exp' => 'Ref Exp',
			'agregado_exp' => 'Agregado Exp',
			'dirigido_a' => 'Dirigido A',
			'causante' => 'Causante',
			'asunto' => 'Asunto',
			'cantidad_folios' => 'Cantidad Folios',
			'usuarios_id_usuario' => 'Usuarios Id Usuario',
			'localidades_id_localidad' => 'Localidades Id Localidad',
			'number1' => 'Number1',
			'number2' => 'Number2',
			'letra' => 'Letra',
			'importancia' => 'Importancia',
			'tipo' => 'Tipo',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('id_exp',$this->id_exp);
		$criteria->compare('num_expediente',$this->num_expediente,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_pedido',$this->fecha_pedido,true);
		$criteria->compare('ref_exp',$this->ref_exp,true);
		$criteria->compare('agregado_exp',$this->agregado_exp,true);
		$criteria->compare('dirigido_a',$this->dirigido_a,true);
		$criteria->compare('causante',$this->causante,true);
		$criteria->compare('asunto',$this->asunto,true);
		$criteria->compare('cantidad_folios',$this->cantidad_folios);
		$criteria->compare('usuarios_id_usuario',$this->usuarios_id_usuario);
		$criteria->compare('localidades_id_localidad',$this->localidades_id_localidad);
		$criteria->compare('number1',$this->number1);
		$criteria->compare('number2',$this->number2);
		$criteria->compare('letra',$this->letra,true);
		$criteria->compare('importancia',$this->importancia,true);
		$criteria->compare('tipo',$this->tipo,true);
//--------------------------------------------------------------------------------------------------------
        if (isset($_GET['prioridad'])) {
			$prioridad = $_GET['prioridad'];
		
			if ($prioridad == 0) {
				$criteria->addCondition('(UNIX_TIMESTAMP(fecha_inicio)+1209600)<UNIX_TIMESTAMP()');
			}
			elseif ($prioridad == 1)  {
				$criteria->addCondition('(UNIX_TIMESTAMP(fecha_inicio)+1209600)>=UNIX_TIMESTAMP()');
			}
			elseif ($prioridad == 2) {
				$criteria->addCondition('1=1');
			}
		}
//--------------------------------------------------------------------------------------------------------

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	public function getTipoMenu()
	{
		return array(
				false=>'Seleccione tipo',
				'ADMINISTRATIVO'=>'ADMINISTRATIVO',
				'OBRA'=>'OBRA',
			);
	}

		public function getTipoMenu2()
	{
		return array(
				'ADMINISTRATIVO'=>'ADMINISTRATIVO',
				'OBRA'=>'OBRA',
			);
	}

}
