<?php

/**
 * This is the model class for table "producto_foto".
 *
 * The followings are the available columns in table 'producto_foto':
 * @property integer $id
 * @property integer $producto_id
 * @property string $nombre
 * @property string $filename
 * @property string $ruta
 * @property string $filetype
 * @property string $mime
 * @property integer $estado
 */
class ProductoFotoModel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'producto_foto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('producto_id, nombre, filename, ruta, filetype, mime', 'required'),
			array('producto_id, estado', 'numerical', 'integerOnly'=>true),
			array('nombre, filename, ruta', 'length', 'max'=>255),
			array('filetype, mime', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, producto_id, nombre, filename, ruta, filetype, mime, estado', 'safe', 'on'=>'search'),
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
			'producto_id' => 'Producto',
			'nombre' => 'Nombre',
			'filename' => 'Filename',
			'ruta' => 'Ruta',
			'filetype' => 'Filetype',
			'mime' => 'Mime',
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
		$criteria->compare('producto_id',$this->producto_id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('ruta',$this->ruta,true);
		$criteria->compare('filetype',$this->filetype,true);
		$criteria->compare('mime',$this->mime,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductoFotoModel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
