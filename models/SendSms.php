<?php

namespace ulugbek\playmobile\models;

use Yii;
use yii\base\Model;

class SendSms extends Model
{
    public $phone;
    public $message;
    const PHONE_PATTERN = '/[9][9][8]\d{9}/';

    public function rules(): array
    {
        return [
            [['phone', 'message'], 'required'],
            [['message'], 'string', 'max' => 180],
            ['phone', 'match', 'pattern' => self::PHONE_PATTERN],

        ];
    }

    public function attributeLabels(): array
    {
        return [
            'phone' => Yii::t('app','Telefon raqam'),
            'message' => Yii::t('app','Xabar matni'),
        ];
    }
}