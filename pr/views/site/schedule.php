<?php

$this->title = 'Расписание';

?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Название кружка</th>
        <th scope="col">С времени</th>
        <th scope="col">День недели</th>
    </tr>
    </thead>
    <?php foreach ($schedule as $item): ?>
    <tbody>
        <td scope="row">
            <?php echo $item->coterie->title ?>
        </td>
        <td scope="row">
            <?php echo $item->time ?>
        </td>
        <td scope="row">
            <?php echo $item->dayOfWeek->day ?>
        </td>
    </tbody>
    <?php endforeach; ?>
</table>
