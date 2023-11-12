<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Кружок'

?>
<div class="comment-block">
    <h3 class="text-right">Комментарии:</h3>
    <?php foreach ($feedback as $item): ?>
        <div class="d-flex flex-row">
            <h5 class="text-right"><?php echo $item->user->username ?></h5>
            &nbsp;
            &nbsp;
            <p><i><?php echo $item->date ?></i></p>
        </div>
        <div class="d-flex flex-row align-content-center">
            &shy;
            &#8226;
            &shy;
            &shy;
            <p><?php echo $item->body ?></p>
        </div>
    <?php endforeach; ?>
    <div class="new-comment-block">
        <h4 class="text-right">Новый комментарий:</h4>
        <?php
        $form = ActiveForm::begin([
            'id' => 'login-form',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                'inputOptions' => ['class' => 'col-lg-3 form-control'],
                'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
            ],
        ]); ?>

        <?= $form->field($model, 'body')->textInput() ?>
        <?= $form->field($model, 'coterie_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Coterie::find()->all(), 'id', 'title')) ?>

        <div class="form-group">
            <div>
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-outline-secondary', 'name' => 'login-button']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>