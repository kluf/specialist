<?php
$formAttrs = array('class' => 'add_smth',
    'enctype' => 'multipart/form-data'
);
$inputTextArea = array(
    'name' => 'description',
    'cols' => 35,
    'rows' => 3,
    'id' => 'description'
);
$inputFaculty = array(
    'name' => 'name',
    'class' => 'required_my',
    'id' => 'name'
);
$inputFile = array('name' => 'userfile',
    'id' => 'userfile'
);
$inputSubmit = array('name' => 'addFaculty',
    'type' => 'submit',
    'class' => 'btn btn-success',
    'value' => 'Додати дані'
);
if (isset($faculty['id'])) {
    $inputFaculty['value'] = $faculty['name'];
    $inputTextArea['value'] = $faculty['description'];
    $inputSubmit['value'] = 'Відредагувати дані';
    echo form_open(base_url() . 'faculty_controller/updateFaculty/', $formAttrs);
    echo form_hidden('id', $faculty['id']);
    echo form_hidden('img', $faculty['pic']);
} else {
    echo form_open(base_url() . 'faculty_controller/addFaculty/', $formAttrs);
}
echo form_label('Назва факультету: ', 'name');
echo form_input($inputFaculty);
echo form_label('Завантажте фото: ', 'userfile');
echo form_upload($inputFile);
echo form_label('Введіть опис: ', 'description');
echo form_textarea($inputTextArea);
echo form_submit($inputSubmit);
echo form_close();
?>

