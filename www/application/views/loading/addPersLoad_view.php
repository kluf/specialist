<?php 
 
$this->load->helper('form');
    $attr = array(
        'class' => "getInfoByChange"
    );
    $dropdownOption = array(
                  '0' => '0 студентів',
                  '1' => '1 студент',
                  '2' => '2 студенти',
                  '3' => '3 студенти',
                  '4' => '4 студенти',
                  '5' => '5 студентів',
                );
    
    ///personal load teacher
    $inputDateStartPers = array(
        'name' => 'dateStart',
        'id' => 'dateStart',
        'class' => 'dateAdd required_my'
    );
    $inputDateFinalPers = array(
        'name' => 'dateFinal',
        'id' => 'dateFinal',
        'class' => 'dateAdd required_my'
    );
    $formAttrsPers = array(
        'class' => 'add_smth'
    );
    $inputSubmitPers = array('name' => 'addMLV',
                        'type' => 'submit',
                        'class' => 'btn btn-success',
                        'value' => 'Оновити персональне навантаження'
    );
    $inputStavkaPers = array(
        'name' => 'stavka',
        'id' => 'stavka',
        'class' => 'required_my'
        
    );
    $inputPlanLoadPers = array(
        'name' => 'planove_navant',
        'id' => 'planove_navant',
        'class' => 'required_my'
    );
    $inputDek = array(
        'name' => 'dek',
        'id' => 'dek',
    );
    

    echo form_label('Виберіть кафедру: ', 'kafedra',$attr);echo form_dropdown('kafedra', $kafedra);
    if(isset($persLoad)){
        echo form_open(base_url().'main_load/updatePersLoad', $formAttrsPers);
        echo form_hidden('id',$persLoad['pnid']);
     if($persLoad['DEK'])
        $inputDek['value'] = $persLoad['DEK'];
    if($persLoad['startSem'])
        $inputDateStartPers['value'] = $persLoad['startSem'];
    if($persLoad['endSem'])
        $inputDateFinalPers['value'] = $persLoad['endSem'];   
    if($persLoad['planove_navant'])
        $inputPlanLoadPers['value'] = $persLoad['planove_navant'];
    if($persLoad['stavka'])
        $inputStavkaPers['value'] = $persLoad['stavka'];
    }else{
        echo form_open(base_url().'main_load/addPersLoad', $formAttrsPers);
        $persLoad['id'] = null;
        $persLoad['DypPro'] = null;
        $persLoad['magWork'] = null;
        $persLoad['RecMag'] = null;
        $persLoad['RecDP'] = null;
        $inputSubmitPers['value'] = 'Додати навантаження';
    }
    echo form_label('Виберіть викладача: ', 'teacher');echo form_dropdown('teacher', $teacher,$persLoad['id']);
    echo form_label('Дата початку семестру: ', 'dateStart');echo form_input($inputDateStartPers);
    echo form_label('Дата закінчення семестру: ', 'dateFinal');echo form_input($inputDateFinalPers);
    echo form_label('Ставка: ', 'stavka');echo form_input($inputStavkaPers);
    echo form_label('Планове навантаження: ', 'planove_navant');echo form_input($inputPlanLoadPers);
    echo form_label('Дипломне проектування: ', 'dp');echo form_dropdown('dp', $dropdownOption,$persLoad['DypPro']);
    echo form_label('Рецензія ДП: ', 'rec_dp');echo form_dropdown('rec_dp', $dropdownOption,$persLoad['RecDP']);
    echo form_label('Магістерська робота: ', 'magRob');echo form_dropdown('magRob', $dropdownOption,$persLoad['magWork']);
    echo form_label('Рецензія магістерська робота : ', 'recMR');echo form_dropdown('recMR', $dropdownOption,$persLoad['RecMag']);
    echo form_label('ДЕК: ', 'dek');echo form_input($inputDek);
    echo form_submit($inputSubmitPers);
    echo form_close();



