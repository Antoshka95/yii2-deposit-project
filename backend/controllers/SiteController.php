<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     *
     * Метод отображения главной страницы
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Метод авторизации
     *
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        // Если гость
        if (!Yii::$app->user->isGuest) {
            // Отправляем на домашнюю
            return $this->goHome();
        }


        $model = new LoginForm();
        // Если форма не пустая и авторизация успешная, то
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // Редирект на предыдущую страницу
            return $this->goBack();
        } else {
            // Иначе очищаем пароль и
            $model->password = '';

            // Показываем форму входа
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Метод для удаления авторизации
     *
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
