<?php
$this->load->helper('form');
$formAttrs = array(
    'class' => 'add_smth',
    'enctype' => 'multipart/form-data'
);
$inputPic = array(
    'name' => 'photo',
    'value' => $content['img']);
$inputId = array(
    'name' => 'id',
    'value' => $content['id']
);
$inputSurname = array(
    'name' => 'surname',
    'id' => 'surname',
    'value' => $content['surn'],
    'class' => 'required_my');
$inputName = array(
    'name' => 'name',
    'id' => 'name',
    'value' => $content['name'],
    'class' => 'required_my'
);
$inputPatronimic = array(
    'name' => 'patronimic',
    'id' => 'patronimic',
    'value' => $content['patronimic'],
    'class' => 'required_my'
);
$inputZalikova1 = array(
    'name' => 'zalikova1',
    'id' => 'zalikova1',
    'value' => $content['zalikova'],
    'class' => 'required_my'
);
$inputPhone1 = array(
    'name' => 'phone1',
    'id' => 'phone1',
    'value' => $content['mobNum']
);
$inputPassport = array(
    'name' => 'passport',
    'id' => 'passport',
    'value' => $content['passport']
);
$inputSurname2 = array(
    'name' => 'surname2',
    'id' => 'surname2',
    'value' => $content['surn2']
);
$inputZalikova2 = array(
    'name' => 'zalikova2',
    'id' => 'zalikova2',
    'value' => $content['zalik2']
);
$inputFile = array(
    'name' => 'userfile',
    'id' => 'userfile'
);
$inputSubmit = array(
    'name' => 'addUser',
    'type' => 'submit', 
    'class' => 'btn btn-success',
    'value' => 'Оновити дані про студента'
);
echo form_open(base_url().'student_controller/updateStudent', $formAttrs);
echo form_label('Виберіть групу студентів: ', 'group');echo form_dropdown('group', $content['group'],$content['gid']);
echo form_label('Прізвище: ', 'surname');echo form_input($inputSurname);
echo form_label('Ім\'я: ', 'name'); echo form_input($inputName);
echo form_label('По-батькові: ', 'patronimic');echo form_input($inputPatronimic);
echo form_label('№ залікової: ', 'zalikova1');echo form_input($inputZalikova1);
echo form_label('№ телефону: ', 'phone1'); echo form_input($inputPhone1);
echo form_label('Паспорт: ', 'passport'); echo form_input($inputPassport);
echo form_label('Прізвище 2: ', 'surname2');echo form_input($inputSurname2);
echo form_label('№ залікової 2: ', 'zalikova2');echo form_input($inputZalikova2);
echo form_label('Завантажте фото: ', 'userfile');echo form_upload($inputFile);
echo form_hidden('id',$content['id']);
echo form_hidden('photo',$content['img']);
echo form_submit($inputSubmit);
form_close();


