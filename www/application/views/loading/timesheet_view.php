<?php 
    $this->load->helper('form');
    $inputDateStart = array(
        'name' => 'startSem',
        'id' => 'dateStart',
        'class' => 'dateAdd required_my'
    );
    $inputDateFinal = array(
        'name' => 'endSem',
        'id' => 'dateFinal',
        'class' => 'dateAdd required_my'
    );
    echo form_open(base_url().'main_load/getTimesheet/');
    echo form_dropdown('kafedra',$kafedra);
    echo form_dropdown('formaNavch',$formaNavch);
    echo form_input($inputDateStart);
    echo form_input($inputDateFinal);
    echo form_submit(array('name' => 'getTeacherData',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Отримати навантаження на викладача'
    ));
    echo form_close();
        
    if(isset($timesheet)){
        //var_dump($timesheet);exit;
        $CI =& get_instance();
        $CI->load->library("table");
        $CI->table->set_heading('Предмет', 'Група', 'Підгрупа', 'Лектор', 'Лекційна аудиторія №1', 'Лекційна аудиторія №2', 'Практик', 'Практична аудиторія №1', 'Практична аудиторія №2', 'Лаборант', 'Лабораторна аудиторія №1', 'Лабораторна аудиторія №2');
        ?>
        <div class='for_wide_table'>
        <?php foreach($timesheet as $item): ?>
            <?php 
            $CI->table->add_row($item['predmet'], $item['grpStud'], $item['subGrp'], $item['Lector'], $item['LecAud1'], $item['LecAud2'], $item['Praktyk'], $item['PractAud1'], $item['PractAud2'], $item['Laborant'], $item['LabAud1'], $item['LabAud2']);
             ?>
        <?php endforeach;
        echo $CI->table->generate();
        echo '</div>';
    }?>
