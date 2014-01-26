<?php
$inputDateStartPrakt = array(
    'name' => 'dateStart',
    'id' => 'dateStart',
    'class' => 'dateAdd required_my'
);
$attr = array(
    'class' => "getInfoByChange control-label"
);
$inputDateFinalPrakt = array(
    'name' => 'dateFinal',
    'id' => 'dateFinal',
    'class' => 'dateAdd required_my'
);
$formAttrsPrakt = array(
    'class' => 'add_smth form-horizontal'
);
$inputSubmit = array('name' => 'addPrakt',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Редагувати дані про практику'
);
$inputCnt = array(
    'name' => 'cntStud',
    'id' => 'cntStud',
    'class' => 'required_my'
);
$labelAttr = array('class' => 'control-label');
echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $attr);
echo '<div class="controls">'.form_dropdown('kafedra', $kafedra).'</div></div>';
if (isset($practLoad)) {
    echo form_open(base_url() . 'main_load/updatePraktLoad', $formAttrsPrakt).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo form_hidden('id', $practLoad['pract_id']);
    if ($practLoad['stud_cnt'])
        $inputCnt['value'] = $practLoad['stud_cnt'];
    if ($practLoad['startSem'])
        $inputDateStartPrakt['value'] = $practLoad['startSem'];
    if ($practLoad['endSem'])
        $inputDateFinalPrakt['value'] = $practLoad['endSem'];
}else {
    echo form_open(base_url() . 'main_load/addPraktLoad', $formAttrsPrakt).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    $practLoad['teach_id'] = null;
    $practLoad['pr_type_id'] = null;
    $practLoad['gos_id'] = null;
}
echo '<div class="control-group">'.form_label('Виберіть викладача: ', 'teacher', $labelAttr);
echo '<div class="controls">'.form_dropdown('teacher', $teacher, $practLoad['teach_id']).'</div></div>';
echo '<div class="control-group">'.form_label('Виберіть групу студентів: ', 'group', $labelAttr);
echo '<div class="controls">'.form_dropdown('group', $group, $practLoad['gos_id']).'</div></div>';
echo '<div class="control-group">'.form_label('Виберіть тип практики: ', 'practice', $labelAttr);
echo '<div class="controls">'.form_dropdown('practice', $practice, $practLoad['pr_type_id']).'</div></div>';
echo '<div class="control-group">'.form_label('Дата початку семестру: ', 'dateStart', $labelAttr);
echo '<div class="controls">'.form_input($inputDateStartPrakt).'</div></div>';
echo '<div class="control-group">'.form_label('Дата закінчення семестру: ', 'dateFinal', $labelAttr);
echo '<div class="controls">'.form_input($inputDateFinalPrakt).'</div></div>';
echo '<div class="control-group">'.form_label('Кількість студентів: ', 'cntStud', $labelAttr);
echo '<div class="controls">'.form_input($inputCnt).'</div></div>';
echo form_submit($inputSubmit);
echo form_close();


