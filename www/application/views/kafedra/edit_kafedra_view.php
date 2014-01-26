<?php $this->load->helper('form');
$formAttrs = array('class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data'
);
$inputTextArea = array(     
    'name' => 'description'
);
$inputKafedra = array(
    'name' => 'kname',
    'class' => 'required_my'
);
$inputFile = array('name' => 'userfile',
                    'id' => 'userfile'
);
$inputSubmit = array('name' => 'addUser',
                    'type' => 'submit',
                    'class' => 'btn btn-success span12',
                    'value' => 'Додати кафедру'
);
$labelAttr = array('class' => 'control-label');
    if (isset($content['id'])) {
        $inputTextArea['value'] = $content['description'];
        $inputKafedra['value'] = $content['kname'];
        $inputSubmit['value'] = 'Оновити дані про кафедру';
        echo form_open(base_url().'kafedra_controller/updateKafedra/',$formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
        echo '<div class="control-group">'.form_label('Виберіть факультет: ', 'faculty', $labelAttr);
        echo '<div class="controls">'.form_dropdown('faculty', $content['faculty'],$content['fid']).'</div></div>';
        echo form_hidden('id',$content['id']);
        echo form_hidden('photo',$content['pic']);
    } else {
        echo form_open(base_url().'kafedra_controller/addKafedra/',$formAttrs).'<fieldset><legend>'.$inputSubmit['value'].'</legend>';
        echo '<div class="control-group">'.form_label('Виберіть факультет: ', 'faculty', $labelAttr);
        echo '<div class="controls">'.form_dropdown('faculty', $content['faculty']).'</div></div>';
    }
    echo validation_errors();
    echo '<div class="control-group">'.form_label('Назва кафедри: ', 'kname', $labelAttr);
    echo '<div class="controls">'.form_input($inputKafedra).'</div></div>';
    echo '<div class="control-group">'.form_label('Введіть опис: ', 'description', $labelAttr);
    echo '<div class="controls">'.form_textarea($inputTextArea).'</div></div>';
    echo '<div class="control-group">'.form_label('Завантажте фото: ', 'userfile', $labelAttr);
    echo '<div class="controls">'.form_upload($inputFile).'</div></div>';
    echo form_submit($inputSubmit).'</fieldset>';;
    echo form_close();
?>
