<?php
namespace ulugbek\playmobile\components;

use ulugbek\playmobile\SmsSettings;
use ulugbek\playmobile\Playmobile;
use yii\base\Component;
use yii\helpers\Json;

class Sms extends Component
{
    /**
     * @return string
     */
    public function getUserName()
    {

        $username = SmsSettings::findOne(['idn' => 'login']);

        return $username->value;
    }

    /**
     * @return string
     */
    public function getPassword()
    {

        $password = SmsSettings::findOne(['idn' => 'password']);

        return $password->value;
    }

    /**
     * @return string
     */
    public function getOriginator()
    {

        $originator = SmsSettings::findOne(['idn' => 'originator']);

        return $originator->value;
    }

    /**
     * Telefon raqam +998916700607 shu ko'rnishda bo'lsa tozalaydi
     * @param $phoneNumber
     * @return array|string|string[]|null
     */
    public  function clearPhoneNumber($phoneNumber)
    {
        $phoneNumber = (string)$phoneNumber;
        return preg_replace('/[^0-9]/', '', $phoneNumber);
    }

    /**
     * @param $phoneNumber
     * @param $message
     * @return bool
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\httpclient\Exception
     */
    public function send($phoneNumber, $message)
    {
        $playmobile = new Playmobile($this->getUserName(), $this->getPassword());

        $playmobile->create([
            'baseUrl' => "http://91.204.239.44/broker-api/"
        ]);

        $phoneNumber = $this->clearPhoneNumber($phoneNumber);
        $response = $playmobile->send([
            [
                'recipient' => $phoneNumber,
                'message-id' => "1",
                'originator' => $this->getOriginator(),
                'text' => $message,
            ],
        ]);

        if ($response) {

            return true;
        }

        return false;
    }
}