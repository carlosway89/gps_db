<?php

/**
 * This is the model class for table "mensajes".
 *
 * The followings are the available columns in table 'mensajes':
 * @property integer $id
 * @property string $longitud
 * @property string $latitud
 * @property integer $velocidad
 * @property integer $rumbo
 * @property string $fecha
 * @property string $evento
 * @property string $placa
 * @property integer $coordinate_id
 */
class Mensajes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mensajes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mensajes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('longitud, latitud, velocidad, rumbo, fecha, placa, coordinate_id', 'required'),
			array('velocidad, rumbo, coordinate_id', 'numerical', 'integerOnly'=>true),
			array('longitud, latitud', 'length', 'max'=>15),
			array('evento', 'length', 'max'=>3),
			array('placa', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, longitud, latitud, velocidad, rumbo, fecha, evento, placa, coordinate_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'longitud' => 'Longitud',
			'latitud' => 'Latitud',
			'velocidad' => 'Velocidad',
			'rumbo' => 'Rumbo',
			'fecha' => 'Fecha',
			'evento' => 'evento',
			'placa' => 'Placa',
			'coordinate_id' => 'Coordinate',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('longitud',$this->longitud,true);
		$criteria->compare('latitud',$this->latitud,true);
		$criteria->compare('velocidad',$this->velocidad);
		$criteria->compare('rumbo',$this->rumbo);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('evento',$this->evento,true);
		$criteria->compare('placa',$this->placa,true);
		$criteria->compare('coordinate_id',$this->coordinate_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}