<?php  
    $this->load->helper('form');
    $formAttrs = array('class' => 'form-horizontal thumbnail'
    );
    $inputDateStart = array(
        'name' => 'startSem',
        'id' => 'dateStart',
        'class' => 'dateAdd required_my span5'
    );
    $inputDateFinal = array(
        'name' => 'endSem',
        'id' => 'dateFinal',
        'class' => 'dateAdd required_my span5'
    );
    $selAttr1 = 'class="span5"';
    $labelAttr1 = array('class' => 'control-label span7');
    $selAttr = 'class="span5"';
    $labelAttr = array('class' => 'control-label span7');
    echo '<div class="control-group thumbnail getInfoByChange">'.
    form_label('Виберіть кафедру: ', 'kafedra', $labelAttr1)
        .'<div class="controls">'.form_dropdown('kafedra', $kafedra,'kafedra',$selAttr1).'</div></div>';
    echo form_open(base_url().'main_load/getFullTeacherLoading/', $formAttrs).'<fieldset><legend>Навантаження викладача</legend>';    
    echo '<div class="control-group">'.
    form_label('Виберіть викладача: ', 'teacher', $labelAttr)
        .'<div class="controls">'.form_dropdown('teacher',$teacher, 'teacher', $selAttr).'</div></div>';
    echo '<div class="control-group">'.
    form_label('Виберіть дату початок семестру: ', 'dateStart', $labelAttr)
        .'<div class="controls">'.form_input($inputDateStart).'</div></div>';
    echo '<div class="control-group">'.
    form_label('Виберіть дату кінця семестру: ', 'dateFinal', $labelAttr)
        .'<div class="controls">'.form_input($inputDateFinal).'</div></div>';
    
    echo form_submit(array('name' => 'getTeacherData',
                    'type' => 'submit',
                    'class' => 'btn btn-success span12',
                    'value' => 'Отримати навантаження на викладача'
    )).'</div></fieldset>';
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
