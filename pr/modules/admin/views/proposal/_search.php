<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProposalSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="proposal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'parent_name') ?>

    <?= $form->field($model, 'parent_surname') ?>

    <?= $form->field($model, 'parent_patronymic') ?>

    <?= $form->field($model, 'parent_phone') ?>

    <?php // echo $form->field($model, 'parent_email') ?>

    <?php // echo $form->field($model, 'child_name') ?>

    <?php // echo $form->field($model, 'child_surname') ?>

    <?php // echo $form->field($model, 'child_patronymic') ?>

    <?php // echo $form->field($model, 'child_age') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'coterie_id') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
