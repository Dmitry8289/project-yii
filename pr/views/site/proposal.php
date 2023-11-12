<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Записаться на кружок'
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="site-login">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-3 form-control'],
            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
        ],
    ]); ?>

    <?= $form->field($model, 'parent_name')->textInput() ?>
    <?= $form->field($model, 'parent_surname')->textInput() ?>
    <?= $form->field($model, 'parent_patronymic')->textInput() ?>
    <?= $form->field($model, 'parent_phone')->widget(\yii\widgets\MaskedInput::class, ['mask' => '+7 (999) 999-99-99']) ?>
    <?= $form->field($model, 'parent_email')->textInput() ?>
    <?= $form->field($model, 'child_name')->textInput() ?>
    <?= $form->field($model, 'child_surname')->textInput() ?>
    <?= $form->field($model, 'child_patronymic')->textInput() ?>
    <?= $form->field($model, 'child_age')->textInput() ?>
    <?= $form->field($model, 'coterie_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Coterie::find()->all(), 'id', 'title')) ?>

    <div class="form-group">
        <div>
            <?= Html::submitButton('Подать заявку на вступление', ['class' => 'btn btn-outline-secondary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>