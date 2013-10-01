   
<?php
$this->load->helper('form');
$formAttrs = array('class' => 'add_smth',
);
$first_name = array(
    'name' => 'firstname',
    'id' => 'firstname',
    'class' => 'required_my'
);
$last_name = array(
    'name' => 'lastname',
    'id' => 'lastname',
    'class' => 'required_my'
);
$company = array(
    'name' => 'company',
    'id' => 'company'
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'class' => 'required_my'
);
$phone = array(
    'name' => 'phone',
    'id' => 'phone'
);
$password = array(
    'name' => 'password',
    'id' => 'password',
    'class' => 'required_my'
);
$password_confirm = array(
    'name' => 'password_confirm',
    'id' => 'password_confirm',
    'class' => 'required_my'
);
$inputSubmit = array('name' => 'addUser',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Зареєстуватися'
);
echo form_open(base_url().'/auth/create_user/', $formAttrs);
echo form_label('Ім\'я: ', 'firstname');echo form_input($first_name);
echo form_label('Прізвище: ', 'lastnames'); echo form_input($last_name);
echo form_label('Компанія: ', 'company');echo form_input($company);
echo form_label('e-mail: ', 'email');echo form_input($email);
echo form_label('№ телефону: ', 'phone'); echo form_input($phone);
echo form_label('Пароль: ', 'password'); echo form_input($password);
echo form_label('Пароль ще раз: ', 'surname2');echo form_input($password_confirm);
echo form_submit($inputSubmit);
form_close();