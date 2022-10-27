<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

/** @var ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'SMS sozlamalari');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'SMS sozlamalari'), 'url' => ['/playmobile']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="card">
    <div class="card-body">
        <div class="availability-index">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    'name',
                    [
                        'attribute' => 'value',
                        'format' => 'raw',
                        'contentOptions' => [
                            'style' => 'word-wrap:anywhere',
                        ],
                    ],
                    'updated_at:datetime',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update}',
                        'buttons' => [
                            'update' => function ($url, $model, $key) {
                                if ($model->idn == 'token') {
                                    return Html::a('<span class="fas fa-sync-alt">', ['update-token'], [
                                        'class' => 'btn btn-sm btn-info',
                                        'title' => Yii::t('app', 'Update token'),
                                    ]);
                                }
                                return Html::a('<span class="fas fa-edit">', ['update-settings', 'id' => $key], ['class' => 'btn btn-sm btn-success']);

                            }
                        ]
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>