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
    echo form_open(base_url().'main_load/index/');
    echo form_dropdown('teacher',$teacher);
    echo form_input($inputDateStart);
    echo form_input($inputDateFinal);
    echo form_submit(array('name' => 'getTeacherData',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Отримати навантаження на викладача'
    ));
    echo form_close();
    if(isset($mainLoad)){
        ?>
    <?php foreach($mainLoad as $item): 
        $CI =& get_instance();
        $CI->load->library("table");
        $CI->table->set_heading('Предмет', 'Група', 'Підгрупа', 'Семестр', 'Лекції', 'Лабораторні', 'Практичні', 'Початок семестру','Закінчення семестру');
        ?>
    <div class='thumbnail wide'>
    <p>
    <?php
        if(!$item['Lection']){
            $item['Lection'] = ' - ';
        }else{
            $item['Lection'] = '&#215;';
        }
        if(!$item['Lab']){
            $item['Lab'] = ' - ';
        }else{
            $item['Lab'] = '&#215;';
        }
        if(!$item['PraktRob']){
            $item['PraktRob'] = ' - ';
        }else{
            $item['PraktRob'] = '&#215;';
        }
    $CI->table->add_row($item['predmet'],$item['grpStud'],$item['subGrp'],$item['Semestr'],$item['Lection'],$item['Lab'],$item['PraktRob'],$item['startSem'],$item['endSem']);
    echo $CI->table->generate();
    ?>
    </p>
    <a class='btn btn-warning' type='button' href='/index.php/main_load/updateMainLoadView/<?=$item["main_id"];?>'>Редагувати </a>
    <form  method='POST' action='/index.php/main_load/removeMainLoad/'><input type='hidden' name='id' value = '<?=$item["main_id"];?>'><button class='btn btn-danger' type='submit'>Видалити </button></form>
    </div>

    <?php endforeach;}?>