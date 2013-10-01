<?php $this->load->helper('form');
$formAttrs = array('class' => 'add_smth',
                    'enctype' => 'multipart/form-data'
);
$inputTextArea = array(     
    'name' => 'description',
    'cols' => 35,
    'rows' => 3,
    'id' => 'description',
    'value' => $faculty['description']
);

$inputFaculty = array(
    'name' => 'name',
    'class' => 'required_my',
    'id' => 'name',
    'value' => $faculty['name']
);
$inputFile = array('name' => 'userfile',
                    'id' => 'userfile'
);
$inputSubmit = array('name' => 'addFaculty',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Відредагувати дані'
);
?>
<?=form_open(base_url().'faculty_controller/updateFaculty/',$formAttrs);?>
          <?php echo form_label('Назва факультету: ', 'name');echo form_input($inputFaculty);?>
          <?php echo form_label('Завантажте фото: ', 'userfile');echo form_upload($inputFile);
          echo form_label('Введіть опис: ', 'description'); echo form_textarea($inputTextArea);
          echo form_hidden('id',$faculty['id']);
          echo form_hidden('img',$faculty['pic']);
          echo form_submit($inputSubmit);
          ?>
<?=form_close();?>

