<?php


namespace ulugbek\playmobile\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * Class SmsSettings
 * @package backend\modules\smsmanager\models
 * @property int $id [int(11)]
 * @property string $idn [varchar(100)]
 * @property string $name [varchar(255)]
 * @property string $value
 * @property int $created_at [int(11)]
 * @property int $updated_at [int(11)]
 */
class SmsSettings extends ActiveRecord
{

    public static function tableName(): string
    {
        return 'play_mobile_sms_settings';
    }

    public function rules()
    {
        return [
            [['idn', 'value', 'name'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class,
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'idn' => Yii::t('app', 'Identifikator'),
            'name' => Yii::t('app', "Nomi"),
            'value' => Yii::t('app', 'Qiymati'),
        ];
    }
}