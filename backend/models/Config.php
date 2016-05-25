<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property integer $configuration_id
 * @property string $key
 * @property string $value
 * @property integer $status
 * @property string $change
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key', 'value'], 'required'],
            [['status'], 'integer'],
            [['change'], 'safe'],
            [['key', 'value'], 'string', 'max' => 100],
            [['key'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'configuration_id' => Yii::t('app', 'Configuration ID'),
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'status' => Yii::t('app', 'Status'),
            'change' => Yii::t('app', 'Change'),
        ];
    }

    /**
     * @inheritdoc
     * @return ConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ConfigQuery(get_called_class());
    }
}
