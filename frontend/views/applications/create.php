<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Applications */

$this->title = Yii::t('app', 'Создать заявку');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="applications-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
