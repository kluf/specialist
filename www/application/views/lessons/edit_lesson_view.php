<?php 
$formAttrs = array('class' => 'add_smth form-horizontal'
);
$inputName = array(
    'name' => 'name',
    'id' => 'name',
    'class' => 'required_my'
);
$inputSubmit = array('name' => 'updateGroup',
                    'type' => 'submit',
                    'class' => 'btn btn-success span12',
                    'value' => 'Додати предмет'
);
$labelAttr = array('class' => 'control-label');
if (isset($lesson['id'])) {
    $inputName['value'] = $lesson["name"];
    $inputSubmit['value'] = 'Оновити дані про предмет';
    echo form_open(base_url().'lesson_controller/updateLesson/',$formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo form_hidden('id',$lesson['id']);
    echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $labelAttr);
    echo '<div class="controls">'.form_dropdown('kafedra', $kafedra,$lesson['kid']).'</div></div>';
} else {
    echo form_open(base_url().'lesson_controller/addLesson/',$formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $labelAttr);
    echo '<div class="controls">'.form_dropdown('kafedra', $kafedra).'</div></div>';
}
echo '<div class="control-group">'.form_label('Назва предмету: ', 'name', $labelAttr);
echo '<div class="controls">'.form_input($inputName).'</div></div>';
echo form_submit($inputSubmit).'</fieldset>';
echo form_close();

