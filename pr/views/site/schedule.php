<?php

$this->title = 'Расписание';

?>
    <table class="table">
    <thead>
    <tr>
        <th scope="col">Со времени</th>
        <th scope="col">День недели</th>
    </tr>
    </thead>
<?php foreach ($schedule as $item): ?>
    <tbody>
    <td scope="row">
        <?php echo $item->time ?>
    </td>
    <td scope="row">
        <?php echo $item->dayOfWeek->day ?>
    </td>
    </tbody>
<?php endforeach; ?>
    </table>
