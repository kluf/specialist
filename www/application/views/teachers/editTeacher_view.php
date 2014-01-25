<?php
$formAttrs = array(
    'class' => 'form-horizontal thumbnail',
    'enctype' => 'multipart/form-data'
);
$inputSurname = array(
    'name' => 'surname',
    'id' => 'surname',
    'class' => 'required_my'
);
$inputName = array(
    'name' => 'name',
    'id' => 'name',
    'class' => 'required_my'
);
$inputPatronimic = array(
    'name' => 'patronimic',
    'id' => 'patronimic',
    'class' => 'required_my'
);
$inputPosada = array(
    'name' => 'posada',
    'id' => 'posada',
    'class' => 'required_my'
);
$inputPhone1 = array(
    'name' => 'phone1',
    'id' => 'phone1'
);
$inputPassport = array(
    'name' => 'passport',
    'id' => 'passport'
);
$inputSurname2 = array(
    'name' => 'surname2',
    'id' => 'surname2'
);
$inputPhone2 = array(
    'name' => 'phone2',
    'id' => 'phone2'
);
$inputFile = array(
    'name' => 'userfile',
    'id' => 'userfile'
);
$inputSubmit = array('name' => 'addUser',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Додати викладача'
);
$labelAttr = array('class' => 'control-label');
if (isset($teacher['id'])) {
    $inputSurname['value'] = $teacher['surname'];
    $inputName['value'] = $teacher['name'];
    $inputPatronimic['value'] = $teacher['patronimic'];
    $inputPosada['value'] = $teacher['posada'];
    $inputPhone1['value'] = $teacher['mobPhn'];
    $inputPassport['value'] = $teacher['passport'];
    $inputSurname2['value'] = $teacher['surname2'];
    $inputPhone2['value'] = $teacher['mobPhn2'];
    $inputSubmit['value'] = 'Відредагувати дані про викладача';
    echo form_open(base_url().'teacher_controller/updateTeacher/', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';;
    echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'group', $labelAttr);
    echo '<div class="controls">'.form_dropdown('kafedra', $kafedra, $teacher['kid']).'</div></div>';
    echo form_hidden('id',$teacher['id']);
    echo form_hidden('img',$teacher['img']);
} else {
    echo form_open(base_url().'teacher_controller/addTeacher/', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';;
    echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'group', $labelAttr);
    echo '<div class="controls">'.form_dropdown('kafedra', $kafedra).'</div></div>';
}

echo '<div class="control-group">'.form_label('Прізвище: ', 'surname', $labelAttr);
echo '<div class="controls">'.form_input($inputSurname).'</div></div>';
echo '<div class="control-group">'.form_label('Ім\'я: ', 'name', $labelAttr);
echo '<div class="controls">'.form_input($inputName).'</div></div>';
echo '<div class="control-group">'.form_label('По-батькові: ', 'patronimic', $labelAttr);
echo '<div class="controls">'.form_input($inputPatronimic).'</div></div>';
echo '<div class="control-group">'.form_label('Посада: ', 'posada', $labelAttr);
echo '<div class="controls">'.form_input($inputPosada).'</div></div>';
echo '<div class="control-group">'.form_label('№ телефону: ', 'phone1', $labelAttr);
echo '<div class="controls">'.form_input($inputPhone1).'</div></div>';
echo '<div class="control-group">'.form_label('Паспорт: ', 'passport', $labelAttr);
echo '<div class="controls">'.form_input($inputPassport).'</div></div>';
echo '<div class="control-group">'.form_label('Прізвище 2: ', 'surname2', $labelAttr);
echo '<div class="controls">'.form_input($inputSurname2).'</div></div>';
echo '<div class="control-group">'.form_label('№ телефону 2: ', 'phone2', $labelAttr);
echo '<div class="controls">'.form_input($inputPhone2).'</div></div>';
echo '<div class="control-group">'.form_label('Завантажте фото: ', 'userfile', $labelAttr);
echo '<div class="controls">'.form_upload($inputFile).'</div></div>';
echo form_submit($inputSubmit).'</fieldset>';
form_close();


