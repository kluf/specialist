<?php
$this->load->helper('form');
$formAttrs = array('class' => 'form-horizontal thumbnail',
                    'enctype' => 'multipart/form-data'
);
$inputSurname = array('name' => 'surname',
                     'id' => 'surname',
                  'class' => 'required_my surname'
);
$inputName = array('name' => 'name',
                'id' => 'name',
                'class' => 'required_my'
);
$inputPatronimic = array('name' => 'patronimic',
                        'id' => 'patronimic',
                        'class' => 'required_my'
);
$inputZalikova1 = array('name' => 'zalikova1',
                        'id' => 'zalikova1',
                         'class' => 'required_my'
);
$inputPhone1 = array('name' => 'phone1',
                    'id' => 'phone1'
);
$inputPassport = array('name' => 'passport',
                        'id' => 'passport'
);
$inputSurname2 = array('name' => 'surname2',
                        'id' => 'surname2'
);
$inputZalikova2 = array('name' => 'zalikova2',
                        'id' => 'zalikova2'
);
$inputFile = array('name' => 'userfile',
                    'id' => 'userfile'
);
$inputSubmit = array('name' => 'addUser',
                    'type' => 'submit',
                    'class' => 'btn btn-success span12'
);
$labelAttr = array('class' => 'control-label');

if (isset($content['group'])) {
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
    $inputName['value'] = $content['name'];
    $inputPatronimic['value'] = $content['patronimic'];
    $inputZalikova1['value'] = $content['zalikova'];
    $inputPhone1['value'] = $content['mobNum'];
    $inputPassport['value'] = $content['passport'];
    $inputSurname2['value'] = $content['surn2'];
    $inputZalikova2['value'] = $content['zalik2'];
    $inputSubmit['value'] = 'Оновити дані про студента';
    echo form_open(base_url().'student_controller/updateStudent', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo '<div class="control-group">'.
    form_label('Виберіть групу студентів: ', 'group', $labelAttr).
        '<div class="controls">'.form_dropdown('group', $content['group'],$content['gid']).'</div></div>';
    echo form_hidden('id',$content['id']);
    echo form_hidden('photo',$content['img']);
} else {
    $inputSubmit['value'] = 'Додати студента';
    echo form_open(base_url().'student_controller/addStudent', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo '<div class="control-group">'.
    form_label('Виберіть групу студентів: ', 'group', $labelAttr).
        '<div class="controls">'.form_dropdown('group', $content['grp']).'</div></div>';
}
echo '<div class="control-group">'.
    form_label('Прізвище: ', 'surname', $labelAttr).
        '<div class="controls">'.form_input($inputSurname).'</div></div>';
echo '<div class="control-group">'.
    form_label('Ім\'я: ', 'name', $labelAttr).
        '<div class="controls">'.form_input($inputName).'</div></div>';
echo '<div class="control-group">'.
    form_label('По-батькові: ', 'patronimic', $labelAttr).
        '<div class="controls">'.form_input($inputPatronimic).'</div></div>';
echo '<div class="control-group">'.
    form_label('№ залікової: ', 'zalikova1', $labelAttr).
        '<div class="controls">'.form_input($inputZalikova1).'</div></div>';
echo '<div class="control-group">'.
    form_label('№ телефону: ', 'phone1', $labelAttr).
        '<div class="controls">'.form_input($inputPhone1).'</div></div>';
echo '<div class="control-group">'.
    form_label('Паспорт: ', 'passport', $labelAttr).
        '<div class="controls">'.form_input($inputPassport).'</div></div>';
echo '<div class="control-group">'.
    form_label('Прізвище: ', 'surname2', $labelAttr).
        '<div class="controls">'.form_input($inputSurname2).'</div></div>';
echo '<div class="control-group">'.
    form_label('№ залікової 2: ', 'zalikova2', $labelAttr).
        '<div class="controls">'.form_input($inputZalikova2).'</div></div>';
echo '<div class="control-group">'.
    form_label('Завантажте фото: ', 'userfile', $labelAttr).
        '<div class="controls">'.form_upload($inputFile).'</div></div>';
echo '<div class="control-group">'.
    form_submit($inputSubmit).'</div></fieldset>';
form_close();


