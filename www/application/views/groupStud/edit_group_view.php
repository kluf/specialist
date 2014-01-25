<?php 
$formAttrs = array('class' => 'add_smth');
$inputGOSName = array(
    'name' => 'gosName',
    'id' => 'gosName',
    'class' => 'required_my'
);
$inputCnt = array(
    'name' => 'cnt',
    'id' => 'cnt'
);
$inputSubmit = array(
    'name' => 'updateGroup',
    'type' => 'submit',
    'class' => 'btn btn-success span12',
    'value' => 'Додати групу студентів'
);
$inputTextArea = array(     
    'name' => 'description',
    'id' => 'description'
);
$labelAttr = array('class' => 'control-label');
if (isset($group['id'])) {
    $inputGOSName['value'] = $group["GOSname"];
    $inputCnt['value'] = $group['count_stud'];
    $inputSubmit['value'] = 'Оновити дані про групу студентів';
    $inputTextArea['value'] = $group['description'];
    echo form_open(base_url().'groupStud_controller/updateGroupStud/',$formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $labelAttr);
    echo '<div class="controls">'.form_dropdown('kafedra', $kafedra,$group['kid']).'</div></div>';
    echo '<div class="control-group">'.form_label('Виберіть форму навчання: ', 'formaNavch', $labelAttr);
    echo form_dropdown('formaNavch', $formaNavch,$group['sfid']);
    echo form_hidden('id',$group['id']);
} else {
    echo form_open(base_url().'groupStud_controller/addGroupStud/',$formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
    echo '<div class="control-group">'.form_label('Виберіть кафедру: ', 'kafedra', $labelAttr);
    echo '<div class="controls">'.form_dropdown('kafedra', $kafedra).'</div></div>';  
    echo '<div class="control-group">'.form_label('Виберіть форму навчання: ', 'formaNavch', $labelAttr);
    echo '<div class="controls">'.form_dropdown('formaNavch', $formaNavch).'</div></div>';
}  
echo '<div class="control-group">'.form_label('Назва групи: ', 'gosName', $labelAttr);
echo '<div class="controls">'.form_input($inputGOSName).'</div></div>';
echo '<div class="control-group">'.form_label('Кількість студентів: ', 'cnt', $labelAttr);
echo '<div class="controls">'.form_input($inputCnt).'</div></div>';
echo '<div class="control-group">'.form_label('Опис групи: ', 'description', $labelAttr);
echo '<div class="controls">'.form_textarea($inputTextArea).'</div></div>';
echo form_submit($inputSubmit).'</fieldset>';
echo form_close();
?>

