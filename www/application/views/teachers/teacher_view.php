<div class="row-fluid">
    <div class="thumbnail">
<?php 
    $this->load->helper('form');
    echo form_open('/teacher_controller/getTeacherByKafedra/');
    $cls = 'class="span6"';
    echo form_dropdown('kafedra',$kafedra,'asdf',$cls);
    echo form_submit(array('name' => 'teacher',
                    'type' => 'submit',
                    'class' => 'btn btn-success span6',
                    'value' => 'Отримати викладачів з кафедри'
));
    echo form_close();
?>
    </div>
</div>
<?php $i = 0;?>
<?php foreach($teacher as $item): ?>
<?php
    if ($i == 0) {
        echo '<div class="row-fluid">';
    }
?>
<?php echo
"<div class='span4'>
    <div class='thumbnail'>
        <div class='row-fluid text-center'>
            <img alt='160x120' data-src='holder.js/160x120' style='width: 160px; height:120px;' src='/img/teacher/".$item['img']."'>
        </div>
            <div class='row-fluid text-center'>{$item['surname']}</div>
            <div class='row-fluid text-center'>{$item['name']}</div>
            <div class='row-fluid text-center'>{$item['patronimic']}</div>
            <div class='row-fluid text-center'>Посада: {$item['posada']}</div>
            <div class='row-fluid text-center'><a class='btn btn-info' href='/index.php/teacher_controller/getTeacherById/{$item['id']}'>Детальні дані</a></div>"
."</div></div>";
$i++;
?>
<?php
    if ($i == 3) {
        echo '</div>';
        $i = 0;
    }
?>
<?php  endforeach; ?>
