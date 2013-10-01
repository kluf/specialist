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
    echo form_open(base_url().'main_load/personalLoading/');
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
        $CI =& get_instance();
        $CI->load->library("table");
        $CI->table->set_heading('Дипломне проектування', 'Рецензія ДП', 'Магістерська робота', 'Рецензія МР', 'ДЕК');
        ?>
        <?php foreach($mainLoad as $item): ?>
        <div class='thumbnail wide'>
            <p><?php
            echo $item['surname']." ".substr($item['name'],0,2).". ".substr($item['patronimic'],0,2).". ".$item['posada'];
            $startSem = new DateTime($item['startSem']);
            $endSem = new DateTime($item['endSem']);
            echo "з ".$startSem->format('Y-m-d')." по ".$endSem->format('Y-m-d');
            ?>
            </p>
            <?php $CI->table->add_row($item['DypPro'], $item['RecDP'], $item['magWork'], $item['RecMag'], $item['DEK']);
            echo $CI->table->generate(); ?>
            <a class='btn btn-warning' type='button' href='/index.php/main_load/updatePersLoadView/<?=$item['pnid'];?>/'>Редагувати </a>
            <form  method='POST' action='/index.php/main_load/removePersLoad/'><input type='hidden' name='id' value = '<?=$item['pnid'];?>'><button class='btn btn-danger' type='submit'>Видалити </button></form>
        </div>
        <?php endforeach; 
    }?>