<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property integer $account_id
 * @property string $firstname
 * @property string $middlename
 * @property string $lastname
 * @property string $qualifier
 * @property string $dob
 * @property integer $gender
 * @property string $local_address
 * @property integer $barangay_id
 * @property integer $city_id
 * @property integer $province_id
 * @property integer $region_id
 * @property integer $zip_code
 *
 * The followings are the available model relations:
 * @property Account $account
 * @property Barangay $barangay
 * @property City $city
 * @property Province $province
 * @property Region $region
 */
class User extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			// Remove `account_id` from required
			array('firstname, lastname, dob, gender, barangay_id, city_id, province_id, region_id', 'required'),
			
			// Let account_id be safe (since you'll set it manually after account is saved)
			array('account_id', 'safe'),
			
			array('gender, barangay_id, city_id, province_id, region_id, zip_code', 'numerical', 'integerOnly'=>true),
			array('firstname, middlename, lastname, qualifier', 'length', 'max'=>128),
			array('local_address', 'length', 'max'=>255),

			array('id, account_id, firstname, middlename, lastname, qualifier, dob, gender, local_address, barangay_id, city_id, province_id, region_id, zip_code', 'safe', 'on'=>'search'),
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
			'account' => array(self::BELONGS_TO, 'Account', 'account_id'),
			'barangay' => array(self::BELONGS_TO, 'Barangay', 'barangay_id'),
			'city' => array(self::BELONGS_TO, 'City', 'city_id'),
			'province' => array(self::BELONGS_TO, 'Province', 'province_id'),
			'region' => array(self::BELONGS_TO, 'Region', 'region_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'account_id' => 'Account',
			'firstname' => 'Firstname',
			'middlename' => 'Middlename',
			'lastname' => 'Lastname',
			'qualifier' => 'Qualifier',
			'dob' => 'Dob',
			'gender' => 'Gender',
			'local_address' => 'Local Address',
			'barangay_id' => 'Barangay',
			'city_id' => 'City',
			'province_id' => 'Province',
			'region_id' => 'Region',
			'zip_code' => 'Zip Code',
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
		$criteria->compare('account_id',$this->account_id);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('middlename',$this->middlename,true);
		$criteria->compare('lastname',$this->lastname,true);
		$criteria->compare('qualifier',$this->qualifier,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('local_address',$this->local_address,true);
		$criteria->compare('barangay_id',$this->barangay_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('province_id',$this->province_id);
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('zip_code',$this->zip_code);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
