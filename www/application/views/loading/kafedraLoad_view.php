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
    echo form_open(base_url().'main_load/getKafedraLoading/');
    echo form_dropdown('kafedra',$kafedra);
    echo form_input($inputDateStart);
    echo form_input($inputDateFinal);
    echo form_submit(array('name' => 'getTeacherData',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Отримати навантаження на викладача'
    ));
    echo form_close();
        
    if(isset($kafedraLoad)){
        $CI =& get_instance();
        $CI->load->library("table");
        $CI->table->set_heading('ПІБ викладача', 'Посада', 'Ставка', 'Планове навантаження', 'Навантаження');
        ?>
        <div class='for_wide_table'>
        <?php 
        $kafedraLoadMy = array_pop($kafedraLoad);
        //var_dump($kafedraLoad);exit;
        foreach($kafedraLoad as $item): 
            $CI->table->add_row($item['name'], $item['posada'], $item['stavka'], $item['Plan_load'], $item['sum_teacher_calc']);
 endforeach;
        $CI->table->add_row('Сума',null,$kafedraLoadMy['stavkaSum'],null,$kafedraLoadMy['sum_teacher_full']);
        echo $CI->table->generate();
        echo '</div>';
    }?>
