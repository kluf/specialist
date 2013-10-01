<?php 
$this->load->helper('form');
$formAttrs = array('class' => 'add_smth'
);

$inputGOSName = array(
    'name' => 'gosName',
    'id' => 'gosName',
    'value' => $group["GOSname"],
    'class' => 'required_my'
);
$inputCnt = array(
    'name' => 'cnt',
    'id' => 'cnt',
    'value' => $group['count_stud']
);
$inputSubmit = array('name' => 'updateGroup',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Оновити дані про групу студентів'
);
$inputTextArea = array(     
    'name' => 'description',
    'cols' => 15,
    'rows' => 3,
    'id' => 'description',
    'value' => $group['description']
);
?>

<?=form_open(base_url().'groupStud_controller/updateGroupStud/',$formAttrs);?>
    <?php echo form_label('Виберіть кафедру: ', 'kafedra');echo form_dropdown('kafedra', $kafedra,$group['kid']);?>
    <?php echo form_label('Виберіть форму навчання: ', 'formaNavch');echo form_dropdown('formaNavch', $formaNavch,$group['sfid']);?>
    <?php echo form_label('Назва групи: ', 'gosName');echo form_input($inputGOSName);?>
    <?php echo form_label('Кількість студентів: ', 'cnt');echo form_input($inputCnt);
    echo form_label('Опис групи: ', 'description');echo form_textarea($inputTextArea);
    echo form_hidden('id',$group['id']);
    echo form_submit($inputSubmit);
    ?>
<?=form_close();?>

