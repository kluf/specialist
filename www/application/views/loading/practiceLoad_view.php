<?php
$formAttrs = array('class' => 'form-horizontal thumbnail');
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
$inputSubmit = array(
    'name' => 'getTeacherData',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Отримати навантаження по практиці на викладача'
);
$labelAttr = array('class' => 'control-label');
echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $attr);
echo '<div class="controls">'.form_dropdown('kafedra', $kafedra).'</div></div>';
echo form_open(base_url(). 'main_load/practiceLoading/', $formAttrs). '<fieldset><legend>'.$inputSubmit['value'].'</legend>';
echo '<div class="control-group">'.form_label('Виберіть викладача: ', 'kafedra', $labelAttr);
echo '<div class="controls">'.form_dropdown('teacher', $teacher).'</div></div>';
echo '<div class="control-group">'.form_label('Виберіть дату початку семестру: ', 'dateStart', $labelAttr);
echo '<div class="controls">'.form_input($inputDateStart).'</div></div>';
echo '<div class="control-group">'.form_label('Виберіть закінчення семестру: ', 'dateFinal', $labelAttr);
echo '<div class="controls">'.form_input($inputDateFinal).'</div></div>';
echo form_submit($inputSubmit).'</fieldset>';;
echo form_close();

if (isset($mainLoad)) {
    $CI = & get_instance();
    $CI->load->library("table");
    $CI->table->set_heading('Викладач', 'Група', 'Тип практики', 'Кількість студентів', 'Редагувати', 'Видалити');
    ?>
    <?php foreach ($mainLoad as $item): ?>
        <div class='thumbnail wide'>
            <?php 
            $item['edit'] = "<a class='btn btn-warning' type='button' href='/index.php/main_load/updatePractLoadView/{$item['pid']}/'>Редагувати </a>";
            $item['remove'] = "<form  method='POST' action='/index.php/main_load/removePractLoad/'><input type='hidden' name='id' value = '{$item['pid']}'><button class='btn btn-danger' type='submit'>Видалити </button></form>";
            $CI->table->add_row($item['teacher_p'], $item['name'], $item['type_prakt_val'], $item['stud_cnt'], $item['edit'], $item['remove']);
            
            ?>
        </div>
    <?php
    endforeach;
    echo $CI->table->generate();
}?>