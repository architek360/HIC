<?php

/**
 * This is the model base class for the table "setup_mst_organizations".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "SetupMstOrganizations".
 *
 * Columns in table "setup_mst_organizations" available as properties of the model,
 * followed by relations of table "setup_mst_organizations" available as properties of the model.
 *
 * @property string $n_org_id
 * @property string $v_org_code
 * @property string $v_org_name
 * @property string $d_start_date
 * @property string $d_end_date
 * @property string $v_flag_coy_id
 * @property string $v_org_level
 * @property string $n_org_parent
 * @property string $v_no_account
 * @property string $v_npwp
 * @property string $v_currency
 * @property string $v_address
 * @property string $v_city
 * @property string $v_province
 * @property string $v_country
 * @property string $v_post_code
 * @property string $v_phone
 * @property string $v_contact_person
 * @property string $v_phone_person
 * @property string $v_email_person
 * @property string $v_created_by
 * @property string $d_created_date
 * @property string $v_updated_by
 * @property string $d_updated_date
 *
 * @property SetupDtlLookups[] $setupDtlLookups
 * @property SetupMstLookups[] $setupMstLookups
 * @property SetupMstOrganizations $nOrgParent
 * @property SetupMstOrganizations[] $setupMstOrganizations
 */
abstract class BaseSetupMstOrganizations extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'setup_mst_organizations';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'SetupMstOrganizations|SetupMstOrganizations', $n);
	}

	public static function representingColumn() {
		return 'v_org_code';
	}

	public function rules() {
		return array(
			array('n_org_id, v_org_code, v_org_name, d_start_date, v_org_level, v_created_by, d_created_date', 'required'),
			array('n_org_id, n_org_parent, v_currency, v_phone, v_phone_person', 'length', 'max'=>15),
			array('v_org_code, v_org_level, v_npwp, v_city, v_province, v_country, v_created_by, v_updated_by', 'length', 'max'=>30),
			array('v_org_name, v_address', 'length', 'max'=>150),
			array('v_flag_coy_id', 'length', 'max'=>1),
			array('v_no_account, v_contact_person, v_email_person', 'length', 'max'=>60),
			array('v_post_code', 'length', 'max'=>5),
			array('d_end_date, d_updated_date', 'safe'),
			array('d_end_date, v_flag_coy_id, n_org_parent, v_no_account, v_npwp, v_currency, v_address, v_city, v_province, v_country, v_post_code, v_phone, v_contact_person, v_phone_person, v_email_person, v_updated_by, d_updated_date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('n_org_id, v_org_code, v_org_name, d_start_date, d_end_date, v_flag_coy_id, v_org_level, n_org_parent, v_no_account, v_npwp, v_currency, v_address, v_city, v_province, v_country, v_post_code, v_phone, v_contact_person, v_phone_person, v_email_person, v_created_by, d_created_date, v_updated_by, d_updated_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'setupDtlLookups' => array(self::HAS_MANY, 'SetupDtlLookups', 'n_org_id'),
			'setupMstLookups' => array(self::HAS_MANY, 'SetupMstLookups', 'n_coy_id'),
			'nOrgParent' => array(self::BELONGS_TO, 'SetupMstOrganizations', 'n_org_parent'),
			'setupMstOrganizations' => array(self::HAS_MANY, 'SetupMstOrganizations', 'n_org_parent'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'n_org_id' => Yii::t('app', 'Org'),
			'v_org_code' => Yii::t('app', 'Org Code'),
			'v_org_name' => Yii::t('app', 'Org Name'),
			'd_start_date' => Yii::t('app', 'Start Date'),
			'd_end_date' => Yii::t('app', 'End Date'),
			'v_flag_coy_id' => Yii::t('app', 'Flag Coy'),
			'v_org_level' => Yii::t('app', 'Org Level'),
			'n_org_parent' => Yii::t('app','Org Parent'),
			'v_no_account' => Yii::t('app', 'No Account'),
			'v_npwp' => Yii::t('app', 'Npwp'),
			'v_currency' => Yii::t('app', 'Currency'),
			'v_address' => Yii::t('app', 'Address'),
			'v_city' => Yii::t('app', 'City'),
			'v_province' => Yii::t('app', 'Province'),
			'v_country' => Yii::t('app', 'Country'),
			'v_post_code' => Yii::t('app', 'Post Code'),
			'v_phone' => Yii::t('app', 'Phone'),
			'v_contact_person' => Yii::t('app', 'Contact Person'),
			'v_phone_person' => Yii::t('app', 'Phone Person'),
			'v_email_person' => Yii::t('app', 'Email Person'),
			'v_created_by' => Yii::t('app', 'Created By'),
			'd_created_date' => Yii::t('app', 'Created Date'),
			'v_updated_by' => Yii::t('app', 'Updated By'),
			'd_updated_date' => Yii::t('app', 'Updated Date'),
			'setupDtlLookups' => Yii::t('app','SetupDtlLookups'),
			'setupMstLookups' => Yii::t('app','SetupMstLookups'),
			'nOrgParent' => Yii::t('app','NOrgParent'),
			'setupMstOrganizations' => Yii::t('app','SetupMstOrganizations'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('n_org_id', $this->n_org_id, true);
		$criteria->compare('v_org_code', $this->v_org_code, true);
		$criteria->compare('v_org_name', $this->v_org_name, true);
		$criteria->compare('d_start_date', $this->d_start_date, true);
		$criteria->compare('d_end_date', $this->d_end_date, true);
		$criteria->compare('v_flag_coy_id', $this->v_flag_coy_id, true);
		$criteria->compare('v_org_level', $this->v_org_level, true);
		$criteria->compare('n_org_parent', $this->n_org_parent);
		$criteria->compare('v_no_account', $this->v_no_account, true);
		$criteria->compare('v_npwp', $this->v_npwp, true);
		$criteria->compare('v_currency', $this->v_currency, true);
		$criteria->compare('v_address', $this->v_address, true);
		$criteria->compare('v_city', $this->v_city, true);
		$criteria->compare('v_province', $this->v_province, true);
		$criteria->compare('v_country', $this->v_country, true);
		$criteria->compare('v_post_code', $this->v_post_code, true);
		$criteria->compare('v_phone', $this->v_phone, true);
		$criteria->compare('v_contact_person', $this->v_contact_person, true);
		$criteria->compare('v_phone_person', $this->v_phone_person, true);
		$criteria->compare('v_email_person', $this->v_email_person, true);
		$criteria->compare('v_created_by', $this->v_created_by, true);
		$criteria->compare('d_created_date', $this->d_created_date, true);
		$criteria->compare('v_updated_by', $this->v_updated_by, true);
		$criteria->compare('d_updated_date', $this->d_updated_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}