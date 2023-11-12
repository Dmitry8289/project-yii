<?php

$this->title = 'Мой профиль';

?>
    <h1 class="text-center">Заявки</h1>
    <h4 class="text-right">Одобренные заявки:</h4>
<?php foreach ($goodstatus as $item): ?>
    <div class="border border-2 p-2">
        <p><b>ID заявки: </b><?php echo $item->id . '<br>' ?></p>
        <!--    <p><b>Название кружка: </b>--><?php //= $item->coterie->title . '<br>' ?><!--</p>-->
        <p><b>ФИО родителя: </b><?php echo $item->parent_surname, ' ';
            echo $item->parent_name, ' ';
            echo $item->parent_patronymic . '<br>' ?></p>
        <p><b>ФИО ребёнка: </b><?php echo $item->child_surname, ' ';
            echo $item->child_name, ' ';
            echo $item->parent_patronymic . '<br>' ?></p>
        <p><b>Телефон для связи </b><?php echo $item->parent_phone . '<br>' ?></p>
        <p><b>Email для связи: </b><?php echo $item->parent_email . '<br>' ?></p>
        <p><b>Статус заявки: </b><?php echo $item->getStatus() ?></p>
    </div>
    <br>
<?php endforeach; ?>
    <h4 class="text-right">Неодобренные заявки:</h4>
<?php foreach ($badstatus as $bad): ?>
    <div class="border border-2 p-2">
        <p><b>ID заявки: </b><?php echo $bad->id . '<br>' ?></p>
        <!--    <p><b>Название кружка: </b>--><?php //echo $item->coterie->title . '<br>' ?><!--</p>-->
        <p><b>ФИО родителя: </b><?php echo $bad->parent_surname, ' ';
            echo $bad->parent_name, ' ';
            echo $bad->parent_patronymic . '<br>' ?></p>
        <p><b>ФИО ребёнка: </b><?php echo $bad->child_surname, ' ';
            echo $bad->child_name, ' ';
            echo $bad->parent_patronymic . '<br>' ?></p>
        <p><b>Телефон для связи </b><?php echo $bad->parent_phone . '<br>' ?></p>
        <p><b>Email для связи: </b><?php echo $bad->parent_email . '<br>' ?></p>
        <p><b>Статус заявки: </b><?php echo $bad->getStatus() ?></p>
    </div>
    <br>
<?php endforeach; ?>