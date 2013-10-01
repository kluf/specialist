<?php 
//var_dump($mainLoad);exit;

    $this->load->helper('form');
    $formAttrs = array(
        'class' => 'add_smth'
    );
    $inputDateStart = array(
        'name' => 'dateStart',
        'id' => 'dateStart',
        'class' => 'dateAdd required_my'
    );
    if($mainLoad['startSem'])
        $inputDateStart['value'] = $mainLoad['startSem'];
    $inputDateFinal = array(
        'name' => 'dateFinal',
        'id' => 'dateFinal',
        'class' => 'dateAdd required_my'
    );
    if($mainLoad['endSem'])
        $inputDateFinal['value'] = $mainLoad['endSem'];
    $chkBxLec = array(
        'name' => 'lection',
        'id' => 'lection',
        'value' => 'lec'
    );
    if($mainLoad['Lection'])
        $chkBxLec['checked'] = 'true';
    $chkBxLab = array(
        'name' => 'lab',
        'id' => 'lab',
        'value' => 'lab'
    );
    if($mainLoad['Lab'])
        $chkBxLab['checked'] = 'true';
    $chkBxPrak = array(
        'name' => 'practice',
        'id' => 'practice',
        'value' => 'practice'
    );
    if($mainLoad['PraktRob'])
        $chkBxPrak['checked'] = 'true';
    $chkBxZalik = array(
        'name' => 'zalik',
        'id' => 'zalik',
        'value' => 'zalik'
    );
    if($mainLoad['Zalik'])
        $chkBxZalik['checked'] = 'true';
    $chkBxIspyt = array(
        'name' => 'zalik',
        'id' => 'ispyt',
        'value' => 'ispyt'
    );
    if($mainLoad['Ispyt'])
        $chkBxIspyt['checked'] = 'true';
    $chkBxKontrRob = array(
        'name' => 'KontrRob',
        'id' => 'KontrRob',
        'value' => 'KontrRob'
    );
    if($mainLoad['KontrRob'])
        $chkBxKontrRob['checked'] = 'true';
    $chkBxKursRob = array(
        'name' => 'KursRob',
        'id' => 'KursRob',
        'value' => 'KursRob'
    );
    if($mainLoad['KursRob'])
        $chkBxKursRob['checked'] = 'true';
    $chkBxKonsult = array(
        'name' => 'konsult',
        'id' => 'konsult',
        'value' => 'konsult'
    );
    if($mainLoad['Konsult'])
        $chkBxKonsult['checked'] = 'true';
    $chkBxKursProj = array(
        'name' => 'KursRob',
        'id' => 'KursProj',
        'value' => 'KursProj'
    );
    if($mainLoad['KursProj'])
        $chkBxKursProj['checked'] = 'true';
    $inputSubmit = array('name' => 'addMLV',
                        'type' => 'submit',
                        'class' => 'btn btn-success',
                        'value' => 'Відредагувати дані'
    );
    $attr = array(
        'class' => "getInfoByChange"
    );
    for($i = 1; $i <= 10; $i++){
        $dropdownSemestrOption[$i] = 'Семестр '.$i;
    }
    $inputSubgroup = array(
        'name' => 'subgroup',
        'id' => 'subgroup'
    );

    if($mainLoad['subGrp'])
        $inputSubgroup['value'] = $mainLoad['subGrp'];
    $inputCnt = array(
        'name' => 'cntStud',
        'id' => 'cntStud',
        'class' => 'required_my'
    );
    if($mainLoad['studCnt'])
        $inputCnt['value'] = $mainLoad['studCnt'];
    echo form_label('Виберіть кафедру: ', 'kafedra',$attr);echo form_dropdown('kafedra', $kafedra);
  
    echo form_open(base_url().'main_load/updateMainLoad', $formAttrs);
    echo form_label('Виберіть викладача: ', 'teacher');echo form_dropdown('teacher', $teacher,$mainLoad['teach_id']);
    echo form_label('Виберіть предмет: ', 'lesson');echo form_dropdown('lesson', $lesson,$mainLoad['lid']);
    echo form_label('Виберіть групу: ', 'group');echo form_dropdown('group', $group,$mainLoad['gos_id']);
    echo form_label('Дата початку семестру: ', 'dateStart');echo form_input($inputDateStart);
    echo form_label('Дата закінчення семестру: ', 'dateFinal');echo form_input($inputDateFinal);
    echo form_label('Кількість студентів: ', 'cntStud');echo form_input($inputCnt);
    echo form_label('Підгрупа: ', 'subgroup');echo form_input($inputSubgroup);
    echo form_label('Семестр: ', 'semestr');echo form_dropdown('semestr', $dropdownSemestrOption,$mainLoad['Semestr']);
    echo form_label('Лекція: ', 'lection');echo form_checkbox($chkBxLec);
    echo form_label('Виберіть аудиторію №1: ', 'lecAud1');echo form_dropdown('lecAud1', $auditory,$mainLoad['Audlec1']);
    echo form_label('Виберіть аудиторію №2: ', 'lecAud2');echo form_dropdown('lecAud2', $auditory,$mainLoad['Audlec2']);
    echo form_label('Практичні: ', 'practice');echo form_checkbox($chkBxPrak);
    echo form_label('Виберіть аудиторію №1: ', 'practAud1');echo form_dropdown('practAud1', $auditory,$mainLoad['Audlab1']);
    echo form_label('Виберіть аудиторію №2: ', 'practAud2');echo form_dropdown('practAud2', $auditory,$mainLoad['Audlab2']);
    echo form_label('Лабораторні: ', 'lab');echo form_checkbox($chkBxLab);
    echo form_label('Виберіть аудиторію №1: ', 'labAud1');echo form_dropdown('labAud1', $auditory,$mainLoad['Audpr1']);
    echo form_label('Виберіть аудиторію №2: ', 'labAud2');echo form_dropdown('labAud2', $auditory,$mainLoad['Audpr2']);
    echo form_label('Залік: ', 'zalik');echo form_radio($chkBxZalik);
    echo form_label('Іспит: ', 'ispyt');echo form_radio($chkBxIspyt);
    echo form_label('Консультація: ', 'konsult');echo form_checkbox($chkBxKonsult);
    echo form_label('Контрольні роботи: ', 'KontrRob');echo form_checkbox($chkBxKontrRob);
    echo form_label('Курсова робота: ', 'KursRob');echo form_radio($chkBxKursRob);
    echo form_label('Курсова проект: ', 'KursProj');echo form_radio($chkBxKursProj);
    echo form_hidden('id',$mainLoad['main_id']);
    echo form_submit($inputSubmit);
    echo form_close();
    