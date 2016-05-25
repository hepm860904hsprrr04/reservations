<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property integer $company_id
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $status
 * @property string $change
 *
 * @property Groups[] $groups
 * @property Users[] $users
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'start_date', 'end_date', 'status'], 'required'],
            [['start_date', 'end_date', 'change'], 'safe'],
            [['status'], 'integer'],
            [['description'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => Yii::t('app', 'Company ID'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
            'status' => Yii::t('app', 'Status'),
            'change' => Yii::t('app', 'Change'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGroups()
    {
        return $this->hasMany(Groups::className(), ['company_id' => 'company_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['company_id' => 'company_id']);
    }
}
