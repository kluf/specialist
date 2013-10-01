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
    echo form_open(base_url().'main_load/getFullTeacherLoading/');
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
//        var_dump($mainLoad);exit;
        $CI =& get_instance();
        $CI->load->library("table");
        $CI->table->set_heading('Предмет', 'Група', 'Підгрупа', 'Кількість студентів', 'Семестр', 'Лекції', 'Лабораторні', 'Практичні', 'Курсова робота', 'Іспит', 'Залік', 'Контрольна робота', 'Практика','Головне навантаження');
        ?>
        <div class='for_wide_table'>
        <?php 
        foreach($mainLoad as $item): 
            $CI->table->add_row($item['predmet'], $item['grpStud'], $item['subGrp'], $item['studCnt'], $item['Semestr'], $item['Lection'], $item['Lab'], $item['PraktRob'], $item['KursRobCalc'], $item['IspytCalc'], $item['ZalikCalc'], $item['KontrRobCalc'],null,$item['MainLoadCalc']);
        endforeach;
        //echo $CI->table->generate();exit;
        //echo '</div>';
    }
    //------------------
    if(isset($persLoad)){
//        var_dump($persLoad);
        $CI =& get_instance();
        $CI->load->library("table");
        //$CI->table->set_heading('ПІБ викладача', 'Посада', 'Ставка', 'Планове навантаження', 'Навантаження');
        ?>
        <!--<div class='for_wide_table'>-->
        <?php 
        foreach($persLoad as $item): 
            $CI->table->add_row('ДП',null,null,$item['DypPro'],null,null,null,null,null,null,null,null,null,$item['DypProCalc']);
        $CI->table->add_row('Рецензія ДП',null,null,$item['RecDP'],null,null,null,null,null,null,null,null,null,$item['RecDPCalc']);
        $CI->table->add_row('Магістерська робота',null,null,$item['magWork'],null,null,null,null,null,null,null,null,null,$item['magWorkCalc']);
        $CI->table->add_row('Рецензція МР',null,null,$item['RecMag'],null,null,null,null,null,null,null,null,null,$item['RecMagCalc']);
        endforeach;
        
        //echo '</div>';
    }
    //-----------------
    if(isset($practLoad)){
//        var_dump($practLoad);exit;
        $CI =& get_instance();
        $CI->load->library("table");
        //$CI->table->set_heading('ПІБ викладача', 'Посада', 'Ставка', 'Планове навантаження', 'Навантаження');
        ?>
        <!--<div class='for_wide_table'>-->
        <?php 
        foreach($practLoad as $item): 
            $CI->table->add_row('Практика',$item['name'],null,null,null,null,null,null,null,null,null,null,$item['cntPract'],null);
        endforeach;
    }
    if(isset($sumLoad)){
        $CI =& get_instance();
        $CI->load->library("table");
        //$CI->table->set_heading('ПІБ викладача', 'Посада', 'Ставка', 'Планове навантаження', 'Навантаження');
        ?>
        <!--<div class='for_wide_table'>-->
        <?php 
//        var_dump($sumLoad);exit;
        foreach($sumLoad as $item): 
            $CI->table->add_row('Загальна сума',"---","---","---","---","---","---","---","---","---","---","---","---",$item['sum_teacher_calc']);
        endforeach;
    }
    if(isset($practLoad) or isset($mainLoad) or isset($persLoad) or isset($sumLoad)){
        echo $CI->table->generate();
    }
    echo '</div>';
    
    ?>
