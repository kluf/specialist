<?php
$attr = array(
    'class' => "getInfoByChange control-label");
$dropdownOption = array(
    '0' => '0 студентів',
    '1' => '1 студент',
    '2' => '2 студенти',
    '3' => '3 студенти',
    '4' => '4 студенти',
    '5' => '5 студентів',
);
$inputDateStartPers = array(
    'name' => 'dateStart',
    'id' => 'dateStart',
    'class' => 'dateAdd required_my'
);
$inputDateFinalPers = array(
    'name' => 'dateFinal',
    'id' => 'dateFinal',
    'class' => 'dateAdd required_my span12'
);
$formAttrsPers = array(
    'class' => 'add_smth form-horizontal'
);
$inputSubmit = array('name' => 'addMLV',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Оновити персональне навантаження'
);
$inputStavkaPers = array(
    'name' => 'stavka',
    'id' => 'stavka',
    'class' => 'required_my'
);
$inputPlanLoadPers = array(
    'name' => 'planove_navant',
    'id' => 'planove_navant',
    'class' => 'required_my'
);
$inputDek = array(
    'name' => 'dek',
    'id' => 'dek',
);
$labelAttr = array('class' => 'control-label');
echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $attr);
echo '<div class="controls">'.form_dropdown('kafedra', $kafedra).'</div></div>';
if (isset($persLoad)) {
    echo form_open(base_url() . 'main_load/updatePersLoad', $formAttrsPers).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo form_hidden('id', $persLoad['pnid']);
    if ($persLoad['DEK'])
        $inputDek['value'] = $persLoad['DEK'];
    if ($persLoad['startSem'])
        $inputDateStartPers['value'] = $persLoad['startSem'];
    if ($persLoad['endSem'])
        $inputDateFinalPers['value'] = $persLoad['endSem'];
    if ($persLoad['planove_navant'])
        $inputPlanLoadPers['value'] = $persLoad['planove_navant'];
    if ($persLoad['stavka'])
        $inputStavkaPers['value'] = $persLoad['stavka'];
}else {
    echo form_open(base_url() . 'main_load/addPersLoad', $formAttrsPers).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    $persLoad['id'] = null;
    $persLoad['DypPro'] = null;
    $persLoad['magWork'] = null;
    $persLoad['RecMag'] = null;
    $persLoad['RecDP'] = null;
    $inputSubmitPers['value'] = 'Додати навантаження';
}
echo '<div class="control-group">'.form_label('Виберіть викладача: ', 'teacher', $labelAttr);
echo '<div class="controls">'.form_dropdown('teacher', $teacher, $persLoad['id']).'</div></div>';
echo '<div class="control-group">'.form_label('Дата початку семестру: ', 'dateStart', $labelAttr);
echo '<div class="controls">'.form_input($inputDateStartPers).'</div></div>';
echo '<div class="control-group">'.form_label('Дата закінчення семестру: ', 'dateFinal', $labelAttr);
echo '<div class="controls">'.form_input($inputDateFinalPers).'</div></div>';
echo '<div class="control-group">'.form_label('Ставка: ', 'stavka', $labelAttr);
echo '<div class="controls">'.form_input($inputStavkaPers).'</div></div>';
echo '<div class="control-group">'.form_label('Планове навантаження: ', 'planove_navant', $labelAttr);
echo '<div class="controls">'.form_input($inputPlanLoadPers).'</div></div>';
echo '<div class="control-group">'.form_label('Дипломне проектування: ', 'dp', $labelAttr);
echo '<div class="controls">'.form_dropdown('dp', $dropdownOption, $persLoad['DypPro']).'</div></div>';
echo '<div class="control-group">'.form_label('Рецензія ДП: ', 'rec_dp', $labelAttr);
echo '<div class="controls">'.form_dropdown('rec_dp', $dropdownOption, $persLoad['RecDP']).'</div></div>';
echo '<div class="control-group">'.form_label('Магістерська робота: ', 'magRob', $labelAttr);
echo '<div class="controls">'.form_dropdown('magRob', $dropdownOption, $persLoad['magWork']).'</div></div>';
echo '<div class="control-group">'.form_label('Рецензія магістерська робота : ', 'recMR', $labelAttr);
echo '<div class="controls">'.form_dropdown('recMR', $dropdownOption, $persLoad['RecMag']).'</div></div>';
echo '<div class="control-group">'.form_label('ДЕК: ', 'dek', $labelAttr);
echo '<div class="controls">'.form_input($inputDek).'</div></div>';
echo form_submit($inputSubmit);
echo form_close();



