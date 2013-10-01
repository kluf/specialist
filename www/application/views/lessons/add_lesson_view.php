<?php 
$this->load->helper('form');
$formAttrs = array('class' => 'add_smth'
);
$inputName = array(
    'name' => 'name',
    'id' => 'name',
    'class' => 'required_my'
);

$inputSubmit = array('name' => 'updateGroup',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Додати предмет'
);

?>

<?=form_open(base_url().'lesson_controller/addLesson/',$formAttrs);?>
    <?php echo form_label('Виберіть кафедру: ', 'kafedra');echo form_dropdown('kafedra', $kafedra);?>
    <?php echo form_label('Назва предмету: ', 'name');echo form_input($inputName);
    echo form_submit($inputSubmit);
    ?>
<?=form_close();?>

