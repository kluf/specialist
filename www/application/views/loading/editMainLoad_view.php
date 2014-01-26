<?php
$formAttrs = array(
    'class' => 'form-horizontal'
);
$inputDateStart = array(
    'name' => 'dateStart',
    'id' => 'dateStart',
    'class' => 'dateAdd required_my'
);
$inputDateFinal = array(
    'name' => 'dateFinal',
    'id' => 'dateFinal',
    'class' => 'dateAdd required_my'
);

$chkBxLec = array(
    'name' => 'lection',
    'id' => 'lection',
    'value' => 'lec'
);

$chkBxLab = array(
    'name' => 'lab',
    'id' => 'lab',
    'value' => 'lab'
);
$chkBxPrak = array(
    'name' => 'practice',
    'id' => 'practice',
    'value' => 'practice'
);

$chkBxZalik = array(
    'name' => 'zalik',
    'id' => 'zalik',
    'value' => 'zalik'
);

$chkBxIspyt = array(
    'name' => 'zalik',
    'id' => 'ispyt',
    'value' => 'ispyt'
);

$chkBxKontrRob = array(
    'name' => 'KontrRob',
    'id' => 'KontrRob',
    'value' => 'KontrRob'
);

$chkBxKursRob = array(
    'name' => 'KursRob',
    'id' => 'KursRob',
    'value' => 'KursRob'
);

$chkBxKonsult = array(
    'name' => 'konsult',
    'id' => 'konsult',
    'value' => 'konsult'
);

$chkBxKursProj = array(
    'name' => 'KursRob',
    'id' => 'KursProj',
    'value' => 'KursProj'
);

$inputSubmit = array('name' => 'addMLV',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Додати головне навантаження'
);
$attr = array(
    'class' => "getInfoByChange control-label"
);
for ($i = 1; $i <= 10; $i++) {
    $dropdownSemestrOption[$i] = 'Семестр ' . $i;
}
$inputSubgroup = array(
    'name' => 'subgroup',
    'id' => 'subgroup'
);
$inputCnt = array(
    'name' => 'cntStud',
    'id' => 'cntStud',
    'class' => 'required_my'
);
$labelAttr['class'] = 'control-label';
echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $attr);
echo '<div class="controls">'.form_dropdown('kafedra', $kafedra).'</div></div>';
if (isset($mainLoad['main_id'])) {
    $inputSubmit['value'] = 'Відредагувати дані';
    $inputDateStart['value'] = $mainLoad['startSem'];
    $inputDateFinal['value'] = $mainLoad['endSem'];
    $inputSubgroup['value'] = $mainLoad['subGrp'];
    $inputCnt['value'] = $mainLoad['studCnt'];
    if ($mainLoad['Lab'])
        $chkBxLab['checked'] = 'true';
    if ($mainLoad['Lection'])
        $chkBxLec['checked'] = 'true';
    if ($mainLoad['PraktRob'])
        $chkBxPrak['checked'] = 'true';
    if ($mainLoad['Ispyt'])
        $chkBxIspyt['checked'] = 'true';
    if ($mainLoad['Zalik'])
        $chkBxZalik['checked'] = 'true';
    if ($mainLoad['KontrRob'])
        $chkBxKontrRob['checked'] = 'true';
    if ($mainLoad['KursRob'])
        $chkBxKursRob['checked'] = 'true';
    if ($mainLoad['Konsult'])
        $chkBxKonsult['checked'] = 'true';
    if ($mainLoad['KursProj'])
        $chkBxKursProj['checked'] = 'true';
    echo form_open(base_url() . 'main_load/updateMainLoad', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo form_hidden('id', $mainLoad['main_id']);
    echo '<div class="control-group">'.form_label('Виберіть викладача: ', 'teacher', $labelAttr);
    echo '<div class="controls">'.form_dropdown('teacher', $teacher, $mainLoad['teach_id']).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть предмет: ', 'lesson', $labelAttr);
    echo '<div class="controls">'.form_dropdown('lesson', $lesson, $mainLoad['lid']).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть групу: ', 'group', $labelAttr);
    echo '<div class="controls">'.form_dropdown('group', $group, $mainLoad['gos_id']).'</div></div>';
    echo '<div class="control-group">'.form_label('Семестр: ', 'semestr', $labelAttr);
    echo '<div class="controls">'.form_dropdown('semestr', $dropdownSemestrOption, $mainLoad['Semestr']).'</div></div>';
    echo '<div class="control-group">'.form_label('Лекція: ', 'lection', $labelAttr);
    echo '<div class="controls">'.form_checkbox($chkBxLec).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №1: ', 'lecAud1', $labelAttr);
    echo '<div class="controls">'.form_dropdown('lecAud1', $auditory, $mainLoad['Audlec1']).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №2: ', 'lecAud2', $labelAttr);
    echo '<div class="controls">'.form_dropdown('lecAud2', $auditory, $mainLoad['Audlec2']).'</div></div>';
    echo '<div class="control-group">'.form_label('Практичні: ', 'practice', $labelAttr);
    echo '<div class="controls">'.form_checkbox($chkBxPrak).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №1: ', 'labAud1', $labelAttr);
    echo '<div class="controls">'.form_dropdown('practAud1', $auditory, $mainLoad['Audpr1']).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №2: ', 'labAud2', $labelAttr);
    echo '<div class="controls">'.form_dropdown('practAud2', $auditory, $mainLoad['Audpr2']).'</div></div>';
    echo '<div class="control-group">'.form_label('Лабораторні: ', 'lab', $labelAttr);
    echo '<div class="controls">'.form_checkbox($chkBxLab).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №1: ', 'labAud1', $labelAttr);
    echo '<div class="controls">'.form_dropdown('labAud1', $auditory, $mainLoad['Audlab1']).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №2: ', 'labAud2', $labelAttr);
    echo '<div class="controls">'.form_dropdown('labAud2', $auditory, $mainLoad['Audlab2']).'</div></div>';
} else {
    echo form_open(base_url() . 'main_load/addMainLoad', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';;
    echo '<div class="control-group">'.form_label('Виберіть викладача: ', 'teacher', $labelAttr);
    echo '<div class="controls">'.form_dropdown('teacher', $teacher).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть предмет: ', 'lesson', $labelAttr);
    echo '<div class="controls">'.form_dropdown('lesson', $lesson).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть групу: ', 'group', $labelAttr);
    echo '<div class="controls">'.form_dropdown('group', $group).'</div></div>';
    echo '<div class="control-group">'.form_label('Семестр: ', 'semestr', $labelAttr);
    echo '<div class="controls">'.form_dropdown('semestr', $dropdownSemestrOption).'</div></div>';
    echo '<div class="control-group">'.form_label('Лекція: ', 'lection', $labelAttr);
    echo '<div class="controls">'.form_checkbox($chkBxLec).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №1: ', 'lecAud1', $labelAttr);
    echo '<div class="controls">'.form_dropdown('lecAud1', $auditory).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №2: ', 'lecAud2', $labelAttr);
    echo '<div class="controls">'.form_dropdown('lecAud2', $auditory).'</div></div>';
    echo '<div class="control-group">'.form_label('Практичні: ', 'practice', $labelAttr);
    echo '<div class="controls">'.form_checkbox($chkBxPrak).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №1: ', 'labAud1', $labelAttr);
    echo '<div class="controls">'.form_dropdown('practAud1', $auditory).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №2: ', 'labAud2', $labelAttr);
    echo '<div class="controls">'.form_dropdown('practAud2', $auditory).'</div></div>';
    echo '<div class="control-group">'.form_label('Лабораторні: ', 'lab', $labelAttr);
    echo '<div class="controls">'.form_checkbox($chkBxLab).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №1: ', 'labAud1', $labelAttr);
    echo '<div class="controls">'.form_dropdown('labAud1', $auditory).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть аудиторію №2: ', 'labAud2', $labelAttr);
    echo '<div class="controls">'.form_dropdown('labAud2', $auditory).'</div></div>';
}
echo '<div class="control-group">'.form_label('Дата початку семестру: ', 'dateStart', $labelAttr);
echo '<div class="controls">'.form_input($inputDateStart).'</div></div>';
echo '<div class="control-group">'.form_label('Дата закінчення семестру: ', 'dateFinal', $labelAttr);
echo '<div class="controls">'.form_input($inputDateFinal).'</div></div>';
echo '<div class="control-group">'.form_label('Кількість студентів: ', 'cntStud', $labelAttr);
echo '<div class="controls">'.form_input($inputCnt).'</div></div>';
echo '<div class="control-group">'.form_label('Підгрупа: ', 'subgroup', $labelAttr);
echo '<div class="controls">'.form_input($inputSubgroup).'</div></div>';
echo '<div class="control-group">'.form_label('Залік: ', 'zalik', $labelAttr);
echo '<div class="controls">'.form_radio($chkBxZalik).'</div></div>';
echo '<div class="control-group">'.form_label('Іспит: ', 'ispyt', $labelAttr);
echo '<div class="controls">'.form_radio($chkBxIspyt).'</div></div>';
echo '<div class="control-group">'.form_label('Консультація: ', 'konsult', $labelAttr);
echo '<div class="controls">'.form_checkbox($chkBxKonsult).'</div></div>';
echo '<div class="control-group">'.form_label('Контрольні роботи: ', 'KontrRob', $labelAttr);
echo '<div class="controls">'.form_checkbox($chkBxKontrRob).'</div></div>';
echo '<div class="control-group">'.form_label('Курсова робота: ', 'KursRob', $labelAttr);
echo '<div class="controls">'.form_radio($chkBxKursRob).'</div></div>';
echo '<div class="control-group">'.form_label('Курсова проект: ', 'KursProj', $labelAttr);
echo '<div class="controls">'.form_radio($chkBxKursProj).'</div></div>';
echo form_submit($inputSubmit).'</fieldset>';
echo form_close();
