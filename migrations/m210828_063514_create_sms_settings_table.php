<?php

use yii\db\Migration;
use yii\helpers\Console;

/**
 * Handles the creation of table `{{%sms_settings}}`.
 */
class m210828_063514_create_sms_settings_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%play_mobile_sms_settings}}', [
            'id' => $this->primaryKey(),
            'idn' => $this->string(100),
            'name' => $this->string(),
            'value' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->batchInsert('{{%play_mobile_sms_settings}}',
            ['idn', 'value', 'name'],
            [
                ['login', 'your_login', 'Login'],
                ['password', 'your_password', 'Parol'],
                ['originator', '3700', 'Originator'],
            ]
        );

        Console::output("****************************");
        Console::output("* SMS by Muhammadjonov Ulugbek *");
        Console::output("****************************");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%play_mobile_sms_settings}}');
    }
}
