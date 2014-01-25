<?php
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
$attr = array(
    'class' => "getInfoByChange control-label"
);
$inputSubmit = array('name' => 'getTeacherData',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Отримати навантаження на викладача'
);
echo form_label('Виберіть кафедру: ', 'kafedra', $attr);
echo form_dropdown('kafedra', $kafedra);
echo form_open(base_url() . 'main_load/index/').'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
echo form_dropdown('teacher', $teacher);
echo form_input($inputDateStart);
echo form_input($inputDateFinal);
echo form_submit($inputSubmit).'</fieldset>';;
echo form_close();
if (isset($mainLoad)) {
    ?>
    <?php
    $CI = & get_instance();
        $CI->load->library("table");
        $CI->table->set_heading('Предмет', 'Група', 'Підгрупа', 'Семестр', 'Лекції', 'Лабораторні', 'Практичні', 'Початок семестру', 'Закінчення семестру', 'Редагувати', 'Видалити');
        echo "<div class='thumbnail wide for_wide_table'>";
    foreach ($mainLoad as $item):?>
                <?php
                if (!$item['Lection']) {
                    $item['Lection'] = ' - ';
                } else {
                    $item['Lection'] = '&#215;';
                }
                if (!$item['Lab']) {
                    $item['Lab'] = ' - ';
                } else {
                    $item['Lab'] = '&#215;';
                }
                if (!$item['PraktRob']) {
                    $item['PraktRob'] = ' - ';
                } else {
                    $item['PraktRob'] = '&#215;';
                }
                $item['update'] = "<a class='btn btn-warning' type='button' href='/index.php/main_load/updateMainLoadView/{$item["main_id"]}'>Редагувати </a>";
                $item['delete'] = "<form  method='POST' action='/index.php/main_load/removeMainLoad/'><input type='hidden' name='id' value = '{$item["main_id"]}'><button class='btn btn-danger' type='submit'>Видалити </button></form>";
                $CI->table->add_row($item['predmet'], $item['grpStud'], $item['subGrp'], $item['Semestr'], $item['Lection'], $item['Lab'], $item['PraktRob'], $item['startSem'], $item['endSem'], $item['update'], $item['delete']);
                ?>
    <?php
    endforeach;
    echo $CI->table->generate();
    echo "</div>";
}?>
