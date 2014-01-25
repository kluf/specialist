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
    'class' => 'btn btn-success span12',
    'value' => 'Додати факультет'
);
$labelAttr = array('class' => 'control-label');
if (isset($faculty['id'])) {
    $inputFaculty['value'] = $faculty['name'];
    $inputTextArea['value'] = $faculty['description'];
    $inputSubmit['value'] = 'Відредагувати дані';
    echo form_open(base_url() . 'faculty_controller/updateFaculty/', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo form_hidden('id', $faculty['id']);
    echo form_hidden('img', $faculty['pic']);
} else {
    echo form_open(base_url() . 'faculty_controller/addFaculty/', $formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';;
}
echo '<div class="control-group">'.form_label('Назва факультету: ', 'name', $labelAttr);
echo '<div class="controls">'.form_input($inputFaculty).'</div></div>';
echo '<div class="control-group">'.form_label('Завантажте фото: ', 'userfile', $labelAttr);
echo '<div class="controls">'.form_upload($inputFile).'</div></div>';
echo '<div class="control-group">'.form_label('Введіть опис: ', 'description', $labelAttr);
echo '<div class="controls">'.form_textarea($inputTextArea).'</div></div>';
echo form_submit($inputSubmit).'</fieldset>';
echo form_close();
?>

