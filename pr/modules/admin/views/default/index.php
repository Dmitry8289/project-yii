<?php

use yii\helpers\Url;

?>
<div class="admin-default-index">
    <h1>Добро пожаловать в админ-панель!</h1>
    <a href="<?php echo Url::toRoute('coterie/index') ?>" class="btn btn-outline-secondary">Кружки</a>
    <a href="<?php echo Url::toRoute('proposal/index') ?>" class="btn btn-outline-secondary">Заявки</a>
    <a href="<?php echo Url::toRoute('schedule/index') ?>" class="btn btn-outline-secondary">Расписания</a>
</div>
