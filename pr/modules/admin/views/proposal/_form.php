<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Proposal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="proposal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'child_age')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'coterie_id')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
