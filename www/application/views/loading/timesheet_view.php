<?php
$formAttrs = array('class' => 'form-horizontal');
$inputDateStart = array(
    'name' => 'startSem',
    'id' => 'dateStart',
    'class' => 'dateAdd required_my'
);
$inputDateFinal = array(
    'name' => 'endSem',
    'id' => 'dateFinal',
    'class' => 'dateAdd required_my'
);
$selAttr = 'class="span8"';
$labelAttr = array('class' => 'control-label');
echo form_open(base_url() . 'main_load/getTimesheet/', $formAttrs) . '<fieldset><legend>Розклад по викладачах</legend>';
echo '<div class="control-group">' .
 form_label('Виберіть кафедру: ', 'kafedra', $labelAttr)
 . '<div class="controls">' . form_dropdown('kafedra', $kafedra) . '</div></div>';
echo '<div class="control-group">' .
 form_label('Виберіть форму навчання: ', 'formaNavch', $labelAttr)
 . '<div class="controls">' . form_dropdown('formaNavch', $formaNavch) . '</div></div>';
echo '<div class="control-group">' .
 form_label('Виберіть дату початок семестру: ', 'dateStart', $labelAttr)
 . '<div class="controls">' . form_input($inputDateStart) . '</div></div>';
echo '<div class="control-group">' .
 form_label('Виберіть дату кінця семестру: ', 'dateFinal', $labelAttr)
 . '<div class="controls">' . form_input($inputDateFinal) . '</div></div>';
echo form_submit(array('name' => 'getTeacherData',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Отримати навантаження на викладача'
)) . '</div></fieldset>';
echo form_close();

if (isset($timesheet)) {
    //var_dump($timesheet);exit;
    $CI = & get_instance();
    $CI->load->library("table");
    $CI->table->set_heading('Предмет', 'Група', 'Підгрупа', 'Лектор', 'Лекційна аудиторія №1', 'Лекційна аудиторія №2', 'Практик', 'Практична аудиторія №1', 'Практична аудиторія №2', 'Лаборант', 'Лабораторна аудиторія №1', 'Лабораторна аудиторія №2');
    ?>
    <div class='for_wide_table'>
        <?php foreach ($timesheet as $item): ?>
            <?php
            $CI->table->add_row($item['predmet'], $item['grpStud'], $item['subGrp'], $item['Lector'], $item['LecAud1'], $item['LecAud2'], $item['Praktyk'], $item['PractAud1'], $item['PractAud2'], $item['Laborant'], $item['LabAud1'], $item['LabAud2']);
            ?>
        <?php
        endforeach;
        echo $CI->table->generate();
        echo '</div>';
    }
    ?>
