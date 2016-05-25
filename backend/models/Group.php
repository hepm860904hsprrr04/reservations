<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property integer $group_id
 * @property integer $company_id
 * @property string $description
 * @property integer $status
 * @property string $change
 *
 * @property Companies $company
 * @property Users[] $users
 */
class Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'status'], 'integer'],
            [['description', 'status'], 'required'],
            [['change'], 'safe'],
            [['description'], 'string', 'max' => 20],
           // [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'group_id' => Yii::t('app', 'Group ID'),
            'company_id' => Yii::t('app', 'Company ID'),
            'description' => Yii::t('app', 'Description'),
            'status' => Yii::t('app', 'Status'),
            'change' => Yii::t('app', 'Change'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
	 /*
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['company_id' => 'company_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
	 /*
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['group_id' => 'group_id']);
    }*/
}
