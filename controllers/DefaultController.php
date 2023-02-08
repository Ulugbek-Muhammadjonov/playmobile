<?php

namespace ulugbek\playmobile\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use ulugbek\playmobile\models\SendSms;
use ulugbek\playmobile\models\SmsSettings;

/**
 * Default controller for the `playmobile` module
 */
class DefaultController extends Controller {

    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new SendSms();
        if ($model->load(Yii::$app->request->post())) {

            $send = Yii::$app->sms->send($model->phone, $model->message);
            if ($send) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Xabar yuborildi!'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Xabar yuborilmadi! Muammo mavjud'));
            }
            return $this->redirect(['index']);
        }
        return $this->render('index', [
            'model' => $model
        ]);
    }

    public function actionSettings()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SmsSettings::find(),
        ]);

        return $this->render('settings', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUpdateSettings($id = '')
    {
        $model = SmsSettings::findOne($id);
        if ($model == null) {
            throw new NotFoundHttpException(Yii::t('app', 'Page not found'));
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['settings']);
        }

        return $this->render('updateSettings', [
            'model' => $model,
        ]);

    }
}
