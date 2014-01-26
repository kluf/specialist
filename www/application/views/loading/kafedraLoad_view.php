<?php
$formAttrs = array('class' => 'form-horizontal thumbnail'
);
$inputDateStart = array(
    'name' => 'startSem',
    'id' => 'dateStart',
    'class' => 'dateAdd required_my span6'
);
$inputDateFinal = array(
    'name' => 'endSem',
    'id' => 'dateFinal',
    'class' => 'dateAdd required_my span6'
);
$selAttr = 'class="span6"';
$labelAttr = array('class' => 'control-label');
echo form_open(base_url() . 'main_load/getKafedraLoading/', $formAttrs) . '<fieldset><legend>Навантаження по кафедрі</legend>';
echo '<div class="control-group">' .
 form_label('Виберіть кафедру: ', 'kafedra', $labelAttr) .
 '<div class="controls">' . form_dropdown('kafedra', $kafedra, 'test', $selAttr) . '</div></div>';
echo '<div class="control-group">' .
 form_label('Виберіть початкову дату: ', 'dateStart', $labelAttr) .
 '<div class="controls">' . form_input($inputDateStart) . '</div></div>';
echo '<div class="control-group">' .
 form_label('Виберіть кінцеву дату: ', 'dateFinal', $labelAttr) .
 '<div class="controls">' . form_input($inputDateFinal) . '</div></div>';
echo form_submit(array('name' => 'getTeacherData',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Отримати навантаження по кафедрі'
)) . '</fieldset>';
echo form_close();

if (isset($kafedraLoad)) {
    $CI = & get_instance();
    $CI->load->library("table");
    $CI->table->set_heading('ПІБ викладача', 'Посада', 'Ставка', 'Планове навантаження', 'Навантаження');
    ?>
    <div class='for_wide_table'>
        <?php
        $kafedraLoadMy = array_pop($kafedraLoad);
        foreach ($kafedraLoad as $item):
            $CI->table->add_row($item['name'], $item['posada'], $item['stavka'], $item['Plan_load'], $item['sum_teacher_calc']);
        endforeach;
        $CI->table->add_row('Сума', null, $kafedraLoadMy['stavkaSum'], null, $kafedraLoadMy['sum_teacher_full']);
        echo $CI->table->generate();
        echo '</div>';
    }

