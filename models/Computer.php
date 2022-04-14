<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "computer".
 *
 * @property int $id Asset ID
 * @property string $name Computer Name
 * @property string|null $migration_status Migration Status
 * @property string|null $user_name Description
 * @property string|null $location Location
 * @property string|null $computer_type Computer Type
 * @property string|null $computer_model Computer Model
 * @property string|null $operating_system Operating System
 * @property string|null $windows_10_version Windows 10 Version
 * @property string|null $memory_gb Memory (GB)
 * @property string|null $disk_size_gb Disk Size (GB)
 * @property string|null $free_space_gb Free Space (GB)
 * @property string|null $serial Serial Number
 * @property string|null $business_unit Business Unit
 * @property string|null $department Department
 * @property string|null $replacement_ordered HW Replacement Ordered
 * @property string|null $static_ip Static IP
 * @property string|null $state State
 * @property string|null $central_build_site Central Build Site
 * @property string|null $last_logon_user Last Logon User
 * @property string|null $vetted Asset Vetted
 */
class Computer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'computer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['replacement_ordered', 'state', 'vetted'], 'string'],
            [['name'], 'string', 'max' => 384],
            [['migration_status', 'user_name', 'location', 'computer_type', 'computer_model', 'operating_system', 'windows_10_version', 'memory_gb', 'disk_size_gb', 'business_unit', 'department', 'central_build_site'], 'string', 'max' => 385],
            [['free_space_gb', 'serial', 'static_ip', 'last_logon_user'], 'string', 'max' => 256],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'migration_status' => Yii::t('app', 'Migration Status'),
            'user_name' => Yii::t('app', 'User Name'),
            'location' => Yii::t('app', 'Location'),
            'computer_type' => Yii::t('app', 'Computer Type'),
            'computer_model' => Yii::t('app', 'Computer Model'),
            'operating_system' => Yii::t('app', 'Operating System'),
            'windows_10_version' => Yii::t('app', 'Windows 10 Version'),
            'memory_gb' => Yii::t('app', 'Memory (GB)'),
            'disk_size_gb' => Yii::t('app', 'Disk Size (GB)'),
            'free_space_gb' => Yii::t('app', 'Free Space (GB)'),
            'serial' => Yii::t('app', 'Serial'),
            'business_unit' => Yii::t('app', 'Business Unit'),
            'department' => Yii::t('app', 'Department'),
            'replacement_ordered' => Yii::t('app', 'Replacement Ordered'),
            'static_ip' => Yii::t('app', 'Static IP'),
            'state' => Yii::t('app', 'State'),
            'central_build_site' => Yii::t('app', 'Central Build Site'),
            'last_logon_user' => Yii::t('app', 'Last Logon User'),
            'vetted' => Yii::t('app', 'Vetted'),
        ];
    }
}
