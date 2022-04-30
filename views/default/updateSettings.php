<?php


use yii\widgets\ActiveForm;
use yii\helpers\Html;

/** @var $this \yii\web\View */
/** @var \ulugbek\playmobile\models\SmsSettings $model */

$this->title = Yii::t('app', 'Tahrirlash');

$this->title = Yii::t('app', 'Tahrirlash');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SMS sozlamalari'), 'url' => ['/smsmanager']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>
<div class="card">
    <div class="card-body">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model, 'name') ?>
        <?= $form->field($model, 'value') ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end() ?>
    </div>
</div>



