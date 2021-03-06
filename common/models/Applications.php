<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%applications}}".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $deposit_type_id
 * @property double $amount
 * @property double $phone
 * @property int $created_at
 * @property int $updated_at
 */
class Applications extends \yii\db\ActiveRecord
{

    const DONE_STATUS = 10;
    const WAIT_STATUS = 20;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%applications}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'deposit_type_id', 'first_name', 'last_name', 'phone'], 'required'],
            [['deposit_type_id', 'created_at', 'updated_at'], 'integer'],
            [['amount'], 'string'],
            [['phone'], 'string'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'Имя'),
            'last_name' => Yii::t('app', 'Фамилия'),
            'deposit_type_id' => Yii::t('app', 'Тип вклада'),
            'amount' => Yii::t('app', 'Сумма'),
            'phone' => Yii::t('app', 'Телефон'),
            'created_at' => Yii::t('app', 'Время создания'),
            'updated_at' => Yii::t('app', 'Время обновления'),
        ];
    }

    public function beforeSave($insert)
    {
        $this->created_at = time();
        return true;
    }

}
