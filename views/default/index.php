<?php
use Yii;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\widgets\MaskedInput;
use ulugbek\playmobile\models\SendSms;

/** @var SendSms $model */

$this->title = Yii::t('app','SMS sozlarmalari');
?>

<div class="row">
    <div class="col-md-6">
        <p>
            <?= Html::a('<i class="fas fa-cogs"></i> '.Yii::t('app','SMS sozlarmalari'), ['settings'], ['class' => 'btn btn-info']) ?>
        </p>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <?=Yii::t('app','Xabar yuborish (Pullik)') ?>
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
                    <?= Html::submitButton(Yii::t('app','Xabar yuborish'), ['class' => 'btn btn-success']) ?>
                </div>
                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>
</div>