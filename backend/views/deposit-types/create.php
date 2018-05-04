<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DepositTypes */

$this->title = Yii::t('app', 'Создание типа вклада');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Типы вкладов'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deposit-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
