<?php

/**
 * This is the model class for table "{{barangay}}".
 *
 * The followings are the available columns in table '{{barangay}}':
 * @property integer $barangay_id
 * @property integer $city_id
 * @property string $barangay_name
 *
 * The followings are the available model relations:
 * @property City $city
 * @property User[] $users
 */
class Barangay extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{barangay}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id, barangay_name', 'required'),
			array('city_id', 'numerical', 'integerOnly'=>true),
			array('barangay_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('barangay_id, city_id, barangay_name', 'safe', 'on'=>'search'),
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
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'users' => array(self::HAS_MANY, 'User', 'barangay_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'barangay_id' => 'Barangay',
			'city_id' => 'City',
			'barangay_name' => 'Barangay Name',
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

		$criteria->compare('barangay_id',$this->barangay_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('barangay_name',$this->barangay_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Barangay the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
