<?php

namespace ulugbek\playmobile\models;

use yii\base\Model;

class SendSms extends Model
{
    public $phone;
    public $message;
    const PHONE_PATTERN = '/[9][9][8]\d{9}/';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['phone', 'message'], 'required'],
            [['message'], 'string', 'max' => 180],
            ['phone', 'match', 'pattern' => self::PHONE_PATTERN],

        ];
    }

    /**
     * @return string[]
     */
    public function attributeLabels()
    {
        return [
            'phone' => "Telefon raqam",
            'message' => 'Xabar matni',
        ];
    }
}