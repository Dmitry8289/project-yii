<?php

use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Список кружков';

?>
<h1 class="text-center"><?= Html::encode($this->title) ?></h1><br>
<div class="card-group">
    <?php foreach ($coteries as $item): ?>
        <div class="card">
            <img src="img/<?php echo $item['image'] ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?php echo $item['title'] ?></h5>
                <p class="card-text"><?php echo $item['description'] ?></p>
                <p class="card-text"><small class="text-muted">Для детей с <b><?php echo $item['from_age'] ?></b>
                        лет</small></p>
                <div class="d-flex flex-row justify-content-between w-50">
                    <a href="<?php echo Url::toRoute('proposal') ?>"><img src="img/add.png" style="width: 25px;"
                                                                          title="Записаться на кружок"></a>
<!--                    <button type="button" data-bs-toggle="modal" style="background: none; border: none;" data-bs-target="#exampleModal">-->
<!--                            <img src="img/schedule.png"-->
<!--                                 style="width: 25px;"-->
<!--                                 title="Посмотреть расписание">-->
<!--                    </button>-->
                    <a href="<?php echo Url::toRoute(['schedule', 'id' => $item['id']]) ?>"><img src="img/schedule.png"
                                                                                                 style="width: 25px;"
                                                                                                 title="Посмотреть распсание"></a>
                    <a href="<?php echo Url::toRoute(['detail', 'id' => $item['id']]) ?>"><img src="img/comment.png"
                                                                                               style="width: 25px;"
                                                                                               title="Оставить комментарий"></a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
