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
    $attr = array(
        'class' => "getInfoByChange"
    );
    echo form_label('Виберіть кафедру: ', 'kafedra',$attr);echo form_dropdown('kafedra', $kafedra);
    echo form_open(base_url().'main_load/practiceLoading/');
    echo form_dropdown('teacher',$teacher);
    echo form_input($inputDateStart);
    echo form_input($inputDateFinal);
    echo form_submit(array('name' => 'getTeacherData',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Отримати навантаження по практиці на викладача'
    ));
    echo form_close();
        
    if(isset($mainLoad)){
        //var_dump($mainLoad);exit;
        $CI =& get_instance();
        $CI->load->library("table");
        $CI->table->set_heading('Викладач', 'Група', 'Тип практики', 'Кількість студентів');
        ?>
        <?php foreach($mainLoad as $item): ?>
        <div class='thumbnail wide'>
            <?php $CI->table->add_row($item['teacher_p'], $item['name'], $item['type_prakt_val'], $item['stud_cnt']);
            echo $CI->table->generate(); ?>
            <a class='btn btn-warning' type='button' href='/index.php/main_load/updatePractLoadView/<?=$item['pid'];?>/'>Редагувати </a>
            <form  method='POST' action='/index.php/main_load/removePractLoad/'><input type='hidden' name='id' value = '<?=$item['pid'];?>'><button class='btn btn-danger' type='submit'>Видалити </button></form>
        </div>
        <?php endforeach; 
    }?>