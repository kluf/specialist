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
$attr = array(
    'class' => "getInfoByChange"
);
$labelAttr['class'] = 'control-label';
$inputSubmit = array(
    'name' => 'getTeacherData',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Отримати навантаження на викладача'
);
echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $labelAttr);
echo '<div class="controls">'.form_dropdown('kafedra', $kafedra).'</div></div>';
echo form_open(base_url() . 'main_load/personalLoading/', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
echo '<div class="control-group">'.form_label('Виберіть викладача: ', 'teacher', $labelAttr);
echo '<div class="controls">'.form_dropdown('teacher', $teacher).'</div></div>';
echo '<div class="control-group">'.form_label('Виберіть дату початку семестру: ', 'dateStart', $labelAttr);
echo '<div class="controls">'.form_input($inputDateStart).'</div></div>';
echo '<div class="control-group">'.form_label('Виберіть дату кінця семестру: ', 'dateFinal', $labelAttr);
echo '<div class="controls">'.form_input($inputDateFinal).'</div></div>';
echo form_submit($inputSubmit).'</fieldset>';
echo form_close();

if (isset($mainLoad)) {
    $CI = & get_instance();
    $CI->load->library("table");
    $CI->table->set_heading('Дипломне проектування', 'Рецензія ДП', 'Магістерська робота', 'Рецензія МР', 'ДЕК', 'Редагувати', 'Видалити', 'Додатикові дані');
    ?>
    <?php foreach ($mainLoad as $item): ?>
            <?php
                $startSem = new DateTime($item['startSem']);
                $endSem = new DateTime($item['endSem']);
                $item['additional'] = $item['surname'] . " " . substr($item['name'], 0, 2) . ". " . substr($item['patronimic'], 0, 2) . ". " . $item['posada']." ".$startSem->format('Y-m-d') . " по " . $endSem->format('Y-m-d');
                $item['editItem'] = "<a class='btn btn-warning' type='button' href='/index.php/main_load/updatePersLoadView/{$item['pnid']}/'>Редагувати </a>";
                $item['removeItem'] = "<form  method='POST' action='/index.php/main_load/removePersLoad/'><input type='hidden' name='id' value = '{$item['pnid']}'><button class='btn btn-danger' type='submit'>Видалити </button></form>";
                $CI->table->add_row($item['DypPro'], $item['RecDP'], $item['magWork'], $item['RecMag'], $item['DEK'], $item['editItem'], $item['removeItem'], $item['additional']);
            ?>
    <?php
    endforeach;
    echo $CI->table->generate();
}?>