<?php

/**
 * This is the model class for table "{{account}}".
 *
 * The followings are the available columns in table '{{account}}':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email_address
 * @property string $salt
 * @property integer $account_type
 * @property integer $department_id
 * @property integer $position_id
 * @property integer $status
 * @property string $date_created
 * @property string $date_updated
 *
 * The followings are the available model relations:
 * @property Department $department
 * @property Position $position
 * @property User[] $users
 */
class Account extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{account}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			// Required fields for account
			array('username, password, email_address, department_id, position_id', 'required'),

			// Email must be a valid format
			array('email_address', 'email'),

			// Password: Minimum 8 characters, at least 1 letter and 1 number
			array('password', 'match', 'pattern'=>'/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/', 'message'=>'Password must be at least 8 characters long and contain at least one letter and one number.'),

			// Auto-set fields
			array('salt, account_type, date_created, date_updated, status', 'safe'),

			array('account_type, department_id, position_id, status', 'numerical', 'integerOnly'=>true),
			array('username, email_address', 'length', 'max'=>128),
			array('password, salt', 'length', 'max'=>255),

			// Safe for search
			array('id, username, password, email_address, salt, account_type, department_id, position_id, status, date_created, date_updated', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'department' => array(self::BELONGS_TO, 'Department', 'department_id'),
			'position' => array(self::BELONGS_TO, 'Position', 'position_id'),
			'users' => array(self::HAS_MANY, 'User', 'account_id'),
		);
	}

	/**
	 * Automatically handle timestamps, salting, and hashing
	 */
	protected function beforeSave()
	{
		if (parent::beforeSave()) {
			if ($this->isNewRecord) {
				$this->salt = $this->generateSalt();
				$this->password = $this->hashPassword($this->password, $this->salt);
				$this->date_created = date('Y-m-d H:i:s');
				$this->date_updated = date('Y-m-d H:i:s');
				$this->status = 1;
				$this->account_type = 1;
			} else {
				$this->date_updated = date('Y-m-d H:i:s');
			}
			return true;
		}
		return false;
	}

	public function generateSalt()
	{
		return time();
	}

	public function hashPassword($password, $salt)
	{
		return sha1($salt . $password);
	}

	/**
	 * @return array customized attribute labels
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email_address' => 'Email Address',
			'salt' => 'Salt',
			'account_type' => 'Account Type',
			'department_id' => 'Department',
			'position_id' => 'Position',
			'status' => 'Status',
			'date_created' => 'Date Created',
			'date_updated' => 'Date Updated',
		);
	}

	/**
	 * Retrieves a list of models based on search/filter conditions.
	 */
	public function search()
	{
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('email_address', $this->email_address, true);
		$criteria->compare('salt', $this->salt, true);
		$criteria->compare('account_type', $this->account_type);
		$criteria->compare('department_id', $this->department_id);
		$criteria->compare('position_id', $this->position_id);
		$criteria->compare('status', $this->status);
		$criteria->compare('date_created', $this->date_created, true);
		$criteria->compare('date_updated', $this->date_updated, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
