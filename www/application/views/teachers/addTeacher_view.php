<?php

$this->load->helper('form');
$formAttrs = array(
    'class' => 'add_smth',
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
    'class' => 'btn btn-success',
    'value' => 'Додати викдалача'
);
echo form_open(base_url().'teacher_controller/addTeacher/', $formAttrs);
echo form_label('Виберіть кафедру: ', 'group');
echo form_dropdown('kafedra',$kafedra);
echo form_label('Прізвище: ', 'surname');
echo form_input($inputSurname);
echo form_label('Ім\'я: ', 'name');
echo form_input($inputName);
echo form_label('По-батькові: ', 'patronimic');
echo form_input($inputPatronimic);
echo form_label('Посада: ', 'posada');
echo form_input($inputPosada);
echo form_label('№ телефону: ', 'phone1');
echo form_input($inputPhone1);
echo form_label('Паспорт: ', 'passport');
echo form_input($inputPassport);
echo form_label('Прізвище 2: ', 'surname2');
echo form_input($inputSurname2);
echo form_label('№ телефону 2: ', 'phone2');
echo form_input($inputPhone2);
echo form_label('Завантажте фото: ', 'userfile');
echo form_upload($inputFile);
echo form_submit($inputSubmit);
form_close();


