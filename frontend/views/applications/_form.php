<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\Applications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="applications-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'deposit_type_id')->dropDownList(\common\models\DepositTypes::getList()) ?>

    <?= $form->field($model, 'amount')->widget(MaskedInput::class, [
        'name' => 'input-33',
        'clientOptions' => [
            'alias' =>  'decimal',
            'groupSeparator' => ',',
            'autoGroup' => true
        ],
    ]) ?>

    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
        'name' => 'input-1',
        'mask' => '(999) 999 9999'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
