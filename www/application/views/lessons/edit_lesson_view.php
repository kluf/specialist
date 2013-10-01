<?php 
$this->load->helper('form');
$formAttrs = array('class' => 'add_smth'
);
$inputName = array(
    'name' => 'name',
    'id' => 'name',
    'value' => $lesson["name"],
    'class' => 'required_my'
);

$inputSubmit = array('name' => 'updateGroup',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Оновити дані про предмет'
);

?>

<?=form_open(base_url().'lesson_controller/updateLesson/',$formAttrs);?>
    <?php echo form_label('Виберіть кафедру: ', 'kafedra');echo form_dropdown('kafedra', $kafedra,$lesson['kid']);?>
    <?php echo form_label('Назва предмету: ', 'name');echo form_input($inputName);
    echo form_hidden('id',$lesson['id']);
    echo form_submit($inputSubmit);
    ?>
<?=form_close();?>

