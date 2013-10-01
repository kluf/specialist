<?php $this->load->helper('form');
$formAttrs = array('class' => 'add_smth',
                    'enctype' => 'multipart/form-data'
);
$inputTextArea = array(     
    'name' => 'description',
    'cols' => 15,
    'rows' => 3,
    'value' => $content['description']
);
$inputKafedra = array(
    'name' => 'kname',
    'value' => $content['kname'],
    'class' => 'required_my'
);
$inputFile = array('name' => 'userfile',
                    'id' => 'userfile'
);
$inputSubmit = array('name' => 'addUser',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Оновити дані про кафедру'
);
?>

<?php echo validation_errors(); ?>
<?=form_open(base_url().'kafedra_controller/updateKafedra/',$formAttrs);?>
          <?php echo form_label('Виберіть факультет: ', 'faculty');echo form_dropdown('faculty', $content['faculty'],$content['fid']);?>
          <?php echo form_label('Назва кафедри: ', 'kname');echo form_input($inputKafedra);?>
          <?php echo form_label('Введіть опис: ', 'description'); echo form_textarea($inputTextArea);
          echo form_label('Завантажте фото: ', 'userfile');echo form_upload($inputFile);
          echo form_hidden('id',$content['id']);
          echo form_hidden('photo',$content['pic']);
          echo form_submit($inputSubmit);
          ?>
<?=form_close();?>

