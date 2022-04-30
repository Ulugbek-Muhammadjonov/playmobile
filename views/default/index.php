<?php

use ulugbek\playmobile\models\SendSms;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

/** @var SendSms $model */

$this->title = "SMS sozlarmalari";
?>
<h1><?= $this->title ?></h1>

<div class="row">
    <div class="col-md-6">
        <p>
            <?= Html::a('<i class="fas fa-cogs"></i> SMS sozlarmalari', ['settings'], ['class' => 'btn btn-info']) ?>
        </p>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Xabar yuborish (Pullik)
            </div>
            <div class="card-body">
                <?php $form = ActiveForm::begin() ?>
                <?= $form->field($model, "phone")->widget(MaskedInput::class, [
                    'mask' => '\+\9\9\8999999999',
                    'options' => [
//                        'placeholder' => 'Telefon raqami',
                        'minlength' => 17,
                        'class' => 'form-control',
                        'id' => 'form_phone'
                    ]
                ]) ?>
                <?= $form->field($model, 'message')->textarea() ?>
                <div class="form-group">
                    <?= Html::submitButton('Xabar yuborish', ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>