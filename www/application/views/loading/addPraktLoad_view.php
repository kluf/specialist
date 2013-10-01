<?php 
//var_dump($practLoad);exit;
    $this->load->helper('form');
    //pratice load teacher
    $inputDateStartPrakt = array(
        'name' => 'dateStart',
        'id' => 'dateStart',
        'class' => 'dateAdd required_my'
    );
    
    $attr = array(
        'class' => "getInfoByChange"
    );
    $inputDateFinalPrakt = array(
        'name' => 'dateFinal',
        'id' => 'dateFinal',
        'class' => 'dateAdd required_my'
    );
    
    $formAttrsPrakt = array(
        'class' => 'add_smth'
    );
    $inputSubmitPrakt = array('name' => 'addPrakt',
                        'type' => 'submit',
                        'class' => 'btn btn-success',
                        'value' => 'Редагувати дані про практику'
    );
    $inputCnt = array(
        'name' => 'cntStud',
        'id' => 'cntStud',
        'class' => 'required_my'
    );
    
    echo form_label('Виберіть кафедру: ', 'kafedra',$attr);echo form_dropdown('kafedra', $kafedra);
    if(isset($practLoad)){
        echo form_open(base_url().'main_load/updatePraktLoad', $formAttrsPrakt);
        echo form_hidden('id',$practLoad['pract_id']);
    if($practLoad['stud_cnt'])
        $inputCnt['value'] = $practLoad['stud_cnt'];
    if($practLoad['startSem'])
        $inputDateStartPrakt['value'] = $practLoad['startSem'];
    if($practLoad['endSem'])
        $inputDateFinalPrakt['value'] = $practLoad['endSem'];
    }else{
        echo form_open(base_url().'main_load/addPraktLoad', $formAttrsPrakt);
        $practLoad['teach_id'] = null;
        $practLoad['pr_type_id'] = null;
        $practLoad['gos_id'] = null;
    }
    echo form_label('Виберіть викладача: ', 'teacher');echo form_dropdown('teacher', $teacher,$practLoad['teach_id']);
    echo form_label('Виберіть групу студентів: ', 'group');echo form_dropdown('group', $group,$practLoad['gos_id']);
    echo form_label('Виберіть тип практики: ', 'practice');echo form_dropdown('practice', $practice,$practLoad['pr_type_id']);
    echo form_label('Дата початку семестру: ', 'dateStart');echo form_input($inputDateStartPrakt);
    echo form_label('Дата закінчення семестру: ', 'dateFinal');echo form_input($inputDateFinalPrakt);
     echo form_label('Кількість студентів: ', 'cntStud');echo form_input($inputCnt);
    form_close();
    echo form_submit($inputSubmitPrakt);


