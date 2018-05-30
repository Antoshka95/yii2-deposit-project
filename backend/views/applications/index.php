<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ApplicationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Заявки');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs(' 
$("#wait").on("click", function() {
    var keys = $(\'#grid\').yiiGridView(\'getSelectedRows\');
    if (keys) {
        $.get( "/applications/change?keys=" + keys.join(",") + "&type=20", function( data ) {
            window.location="/applications";
        });
    }
});

$("#success").on("click", function() {
    var keys = $(\'#grid\').yiiGridView(\'getSelectedRows\');
    if (keys) {
        $.get( "/applications/change?keys=" + keys.join(",") + "&type=10", function( data ) {
            window.location="/applications";
        });
    }
});
', View::POS_READY);

?>
<div class="applications-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= Html::button('Выполняется', [
        'class' => 'btn btn-danger',
        'id' => 'wait'
    ]) ?>
    <?= Html::button('Выполнено', [
        'class' => 'btn btn-success',
        'id' => 'success'
    ]) ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'id' => 'grid',
        'rowOptions' => function ($model) {
            if ($model->status == \common\models\Applications::WAIT_STATUS) {
                return ['class' => 'danger'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'class' => 'yii\grid\CheckboxColumn',
                // you may configure additional properties here
            ],

            'id',
            'first_name',
            'last_name',
            'deposit_type_id',
            'amount',
            'phone',
            'created_at:date',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
