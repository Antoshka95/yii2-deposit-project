<?php

namespace backend\controllers;

use Yii;
use common\models\Currencies;
use common\models\CurrenciesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CurrenciesController implements the CRUD actions for Currencies model.
 */
class CurrenciesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Метод отображения списка валют
     *
     * Lists all Currencies models.
     * @return mixed
     */
    public function actionIndex()
    {
        // Создаем объект поиска
        $searchModel = new CurrenciesSearch();
        // Заполяем параметрами запроса для фильтрации
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // Рисуем страничку
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Метод показа одной валюты
     *
     * Displays a single Currencies model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Метод создания новой валюты
     *
     * Creates a new Currencies model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Currencies();

        // Есди данные из запроса загрузились и валюта создана, то
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Делаем ридерект на страницу новой валюты
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // Иначе показываем форму с ошибками или пустую
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Метод обновления валюты, аналогично методу создания, только другой шаблон
     *
     * Updates an existing Currencies model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Метод удаления валюты
     *
     * Deletes an existing Currencies model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Метод поиска валюты по ID в БД
     *
     * Finds the Currencies model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Currencies the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Currencies::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
