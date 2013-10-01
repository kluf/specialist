<?php 
$this->load->helper('form');
$formAttrs = array('class' => 'add_smth'
);

$inputGOSName = array(
    'name' => 'gosName',
    'id' => 'gosName',
    'class' => 'required_my'
);
$inputCnt = array(
    'name' => 'cnt',
    'id' => 'cnt'
);
$inputSubmit = array('name' => 'updateGroup',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Додати групу студентів'
);
$inputTextArea = array(     
    'name' => 'description',
    'cols' => 15,
    'rows' => 3,
    'id' => 'description'
);
?>

<?=form_open(base_url().'groupStud_controller/addGroupStud/',$formAttrs);?>
    <?php echo form_label('Виберіть кафедру: ', 'kafedra');echo form_dropdown('kafedra', $kafedra);?>
    <?php echo form_label('Виберіть форму навчання: ', 'formaNavch');echo form_dropdown('formaNavch', $formaNavch);?>
    <?php echo form_label('Назва групи: ', 'gosName');echo form_input($inputGOSName);?>
    <?php echo form_label('Кількість студентів: ', 'cnt');echo form_input($inputCnt);
    echo form_label('Опис групи: ', 'description');echo form_textarea($inputTextArea);
    echo form_submit($inputSubmit);
    ?>
<?=form_close();?>

