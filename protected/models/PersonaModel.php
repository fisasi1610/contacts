<?php

/**
 * This is the model class for table "persona".
 *
 * The followings are the available columns in table 'persona':
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $tipo_documento
 * @property string $documento
 * @property string $telefono
 * @property string $nro_cuenta
 * @property string $correo
 * @property integer $estado
 */
class PersonaModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'persona';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellido, tipo_documento, documento, correo', 'required'),
			array('tipo_documento, estado', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, documento, correo', 'length', 'max'=>255),
			array('telefono', 'length', 'max'=>20),
			array('nro_cuenta', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, apellido, tipo_documento, documento, telefono, nro_cuenta, correo, estado', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'tipo_documento' => 'Tipo Documento',
			'documento' => 'Documento',
			'telefono' => 'Telefono',
			'nro_cuenta' => 'Nro Cuenta',
			'correo' => 'Correo',
			'estado' => 'Estado',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('tipo_documento',$this->tipo_documento);
		$criteria->compare('documento',$this->documento,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('nro_cuenta',$this->nro_cuenta,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PersonaModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
