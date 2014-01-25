<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_controller extends CI_controller {
    public function arrayForSelect($content,$option,$value){
        foreach ($content as $val): 
            $result[$val[$option]] = $val[$value];
        endforeach;
    return $result;
    }
    
    function index(){
        $this->load->model('teacher_model');
        $data['title'] = 'Викладачі';
        $data['view'] = '/teachers/teacher_view';
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(), 'id','kname');
        $data['teacher'] = $this->teacher_model->getAllTeachers();
        $this->load->view('main_view',$data);
    }

    function getTeacherByKafedra(){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(), 'id', 'kname');
        $this->load->model('teacher_model');
        $data['title'] = 'Викладачі кафедри';
        $data['view'] = '/teachers/teacher_view';
        $kid = $this->security->xss_clean($this->input->post('kafedra'));
        $data['teacher'] = $this->teacher_model->getTeacherByKafedra($kid);
        $this->load->view('main_view',$data);
        
    }

    function getTeacherById($id){
        $this->load->model('teacher_model');
        $data['teacher'] = $this->teacher_model->getTeacherById($this->security->xss_clean($id));
        $data['title'] = 'Викладач';
        $data['view'] = '/teachers/one_teacher_view';
        $this->load->view('main_view',$data);
    }
    
     function addTeacherView(){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
        $data['view'] = '/teachers/editTeacher_view';
        $data['title'] = 'Додавання викладача';
        $this->load->view('main_view',$data);
    }
    
    function addTeacher(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('kafedra', 'Назва кафедри','trim|required|xss_clean');
        $this->form_validation->set_rules('surname', 'Прізвище','trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Ім\'я','trim|required|xss_clean');
        $this->form_validation->set_rules('patronimic', 'По-батькові','trim|required|xss_clean');
        $this->form_validation->set_rules('posada', 'Посада','trim|required|xss_clean');
        $this->form_validation->set_rules('phone1', '№ телефону','trim|xss_clean');
        $this->form_validation->set_rules('passport', 'Паспорт','trim|xss_clean');
        $this->form_validation->set_rules('surname2', 'Прізвище 2','trim|xss_clean');
        $this->form_validation->set_rules('phone2', '№ телефону 2','trim|xss_clean');
        if ($this->form_validation->run() == FALSE)
            {
                $data['view'] = 'err';
                $data['title'] = 'Помилка редагування';
                $this->load->view('main_view',$data);
            }
        else
            {   
                $data['kafedra'] = $this->security->xss_clean($this->input->post('kafedra'));
                $data['surname'] = $this->security->xss_clean($this->input->post('surname'));
                $data['name'] = $this->security->xss_clean($this->input->post('name'));
                $data['patronimic'] = $this->security->xss_clean($this->input->post('patronimic'));
                $data['posada'] = $this->security->xss_clean($this->input->post('posada'));
                $data['phone1'] = $this->security->xss_clean($this->input->post('phone1'));
                $data['passport'] = $this->security->xss_clean($this->input->post('passport'));
                $data['surname2'] = $this->security->xss_clean($this->input->post('surname2'));
                $data['phone2'] = $this->security->xss_clean($this->input->post('phone2'));
                $this->load->model('imageManipulator');
                $data['img'] = $this->imageManipulator->uploadImage('./img/teacher');
                $this->load->model('teacher_model');
                $this->teacher_model->addTeacher($data);
            }
    }
    
    function updateTeacherView($id){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
        $this->load->model('teacher_model');
        $data['teacher'] = $this->teacher_model->getTeacherById($id);
        $data['view'] = '/teachers/editTeacher_view';
        $data['title'] = 'Редагування викладача';
        $this->load->view('main_view',$data);
    }
    
    function updateTeacher(){
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('id', 'Назва кафедри','trim|required|xss_clean');
        $this->form_validation->set_rules('kafedra', 'Назва кафедри','trim|required|xss_clean');
        $this->form_validation->set_rules('surname', 'Прізвище','trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Ім\'я','trim|required|xss_clean');
        $this->form_validation->set_rules('patronimic', 'По-батькові','trim|required|xss_clean');
        $this->form_validation->set_rules('posada', 'Посада','trim|required|xss_clean');
        $this->form_validation->set_rules('phone1', '№ телефону','trim|xss_clean');
        $this->form_validation->set_rules('passport', 'Паспорт','trim|xss_clean');
        $this->form_validation->set_rules('surname2', 'Прізвище 2','trim|xss_clean');
        $this->form_validation->set_rules('phone2', '№ телефону 2','trim|xss_clean');
        if ($this->form_validation->run() == FALSE)
            {
                $data['view'] = 'err';
                $data['title'] = 'Помилка редагування';
                $this->load->view('main_view',$data);
            }
        else
            {   
                $data['id'] = $this->security->xss_clean($this->input->post('id'));
                $data['kafedra'] = $this->security->xss_clean($this->input->post('kafedra'));
                $data['surname'] = $this->security->xss_clean($this->input->post('surname'));
                $data['name'] = $this->security->xss_clean($this->input->post('name'));
                $data['patronimic'] = $this->security->xss_clean($this->input->post('patronimic'));
                $data['posada'] = $this->security->xss_clean($this->input->post('posada'));
                $data['phone1'] = $this->security->xss_clean($this->input->post('phone1'));
                $data['passport'] = $this->security->xss_clean($this->input->post('passport'));
                $data['surname2'] = $this->security->xss_clean($this->input->post('surname2'));
                $data['phone2'] = $this->security->xss_clean($this->input->post('phone2'));
                $this->load->model('imageManipulator');
                $data['img'] = $this->imageManipulator->uploadImage('./img/teacher');
                $this->load->model('teacher_model');
                $this->teacher_model->updateTeacher($data);
            }
    }
                
    function removeTeacher(){
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->load->model('teacher_model');
        $this->teacher_model->removeTeacher($id);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */