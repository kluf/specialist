<?php 
    $this->load->helper('form');
    $formAttrs = array(
        'class' => 'add_smth'
    );
    $inputDateStart = array(
        'name' => 'dateStart',
        'id' => 'dateStart',
        'class' => 'dateAdd required_my'
    );
    $inputDateFinal = array(
        'name' => 'dateFinal',
        'id' => 'dateFinal',
        'class' => 'dateAdd required_my'
    );
    $chkBxLec = array(
        'name' => 'lection',
        'id' => 'lection',
        'value' => 'lec'
    );
    $chkBxLab = array(
        'name' => 'lab',
        'id' => 'lab',
        'value' => 'lab'
    );
    $chkBxPrak = array(
        'name' => 'practice',
        'id' => 'practice',
        'value' => 'practice'
    );
    $chkBxZalik = array(
        'name' => 'zalik',
        'id' => 'zalik',
        'value' => 'zalik'
    );
    $chkBxIspyt = array(
        'name' => 'zalik',
        'id' => 'ispyt',
        'value' => 'ispyt'
    );
    $chkBxKontrRob = array(
        'name' => 'KontrRob',
        'id' => 'KontrRob',
        'value' => 'KontrRob'
    );
    $chkBxKursRob = array(
        'name' => 'KursRob',
        'id' => 'KursRob',
        'value' => 'KursRob'
    );
    $chkBxKonsult = array(
        'name' => 'konsult',
        'id' => 'konsult',
        'value' => 'konsult'
    );
    $chkBxKursProj = array(
        'name' => 'KursRob',
        'id' => 'KursProj',
        'value' => 'KursProj'
    );
    $inputSubmit = array('name' => 'addMLV',
                        'type' => 'submit',
                        'class' => 'btn btn-success',
                        'value' => 'Додати головне навантаження'
    );
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
    for($i = 1; $i <= 10; $i++){
        $dropdownSemestrOption[$i] = 'Семестр '.$i;
    }
    $inputSubgroup = array(
        'name' => 'subgroup',
        'id' => 'subgroup'
    );
    $inputCnt = array(
        'name' => 'cntStud',
        'id' => 'cntStud',
        'class' => 'required_my'
    );
    echo form_label('Виберіть кафедру: ', 'kafedra',$attr);echo form_dropdown('kafedra', $kafedra);
  
    echo form_open(base_url().'main_load/addMainLoad', $formAttrs);
    echo form_label('Виберіть викладача: ', 'teacher');echo form_dropdown('teacher', $teacher);
    echo form_label('Виберіть предмет: ', 'lesson');echo form_dropdown('lesson', $lesson);
    echo form_label('Виберіть групу: ', 'group');echo form_dropdown('group', $group);
    echo form_label('Дата початку семестру: ', 'dateStart');echo form_input($inputDateStart);
    echo form_label('Дата закінчення семестру: ', 'dateFinal');echo form_input($inputDateFinal);
    echo form_label('Кількість студентів: ', 'cntStud');echo form_input($inputCnt);
    echo form_label('Підгрупа: ', 'subgroup');echo form_input($inputSubgroup);
    echo form_label('Семестр: ', 'semestr');echo form_dropdown('semestr', $dropdownSemestrOption);
    echo form_label('Лекція: ', 'lection');echo form_checkbox($chkBxLec);
    echo form_label('Виберіть аудиторію №1: ', 'lecAud1');echo form_dropdown('lecAud1', $auditory);
    echo form_label('Виберіть аудиторію №2: ', 'lecAud2');echo form_dropdown('lecAud2', $auditory);
    echo form_label('Практичні: ', 'practice');echo form_checkbox($chkBxPrak);
    echo form_label('Виберіть аудиторію №1: ', 'practAud1');echo form_dropdown('practAud1', $auditory);
    echo form_label('Виберіть аудиторію №2: ', 'practAud2');echo form_dropdown('practAud2', $auditory);
    echo form_label('Лабораторні: ', 'lab');echo form_checkbox($chkBxLab);
    echo form_label('Виберіть аудиторію №1: ', 'labAud1');echo form_dropdown('labAud1', $auditory);
    echo form_label('Виберіть аудиторію №2: ', 'labAud2');echo form_dropdown('labAud2', $auditory);
    echo form_label('Залік: ', 'zalik');echo form_radio($chkBxZalik);
    echo form_label('Іспит: ', 'ispyt');echo form_radio($chkBxIspyt);
    echo form_label('Консультація: ', 'konsult');echo form_checkbox($chkBxKonsult);
    echo form_label('Контрольні роботи: ', 'KontrRob');echo form_checkbox($chkBxKontrRob);
    echo form_label('Курсова робота: ', 'KursRob');echo form_radio($chkBxKursRob);
    echo form_label('Курсова проект: ', 'KursProj');echo form_radio($chkBxKursProj);
    echo form_submit($inputSubmit);
    echo form_close();
    