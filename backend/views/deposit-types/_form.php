<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DepositTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deposit-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'percentage')->textInput() ?>

    <?= $form->field($model, 'min_value')->textInput() ?>

    <?= $form->field($model, 'max_duration')->textInput() ?>

    <?= $form->field($model, 'min_duration')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_id')->dropDownList(\common\models\Currencies::getList()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
