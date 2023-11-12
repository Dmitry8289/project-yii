<?php

use app\models\Proposal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\ProposalSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Заявки');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proposal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить заявку'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'parent_name',
            'parent_surname',
            'parent_patronymic',
            'parent_phone',
            'parent_email:email',
            //'child_name',
            //'child_surname',
            //'child_patronymic',
            //'child_age',
            //'user_id',
            //'coterie_id',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Proposal $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
            [
                'attribute' => 'Статус',
                'value' => function ($data) {
                    return $data->getStatus();
                }
            ],
            [
                'attribute' => 'Администрирование',
                'format' => 'html',
                'value' => function ($data) {
                    switch ($data->status) {
                        case 0:
                            return Html::a('Одобрить', Url::toRoute(['proposal/good', 'id'=>$data->id])) . ' | ' . Html::a('Отклонить', Url::toRoute(['proposal/bad', 'id'=>$data->id]));
                        case 1:
                            return Html::a('Отклонить', Url::toRoute(['proposal/bad', 'id'=>$data->id]));
                        case 2:
                            return Html::a('Одобрить', Url::toRoute(['proposal/good', 'id'=>$data->id]));
                    }
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
