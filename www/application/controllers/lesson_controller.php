<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lesson_controller extends CI_Controller {
    public function arrayForSelect($content,$option,$value){
        foreach ($content as $val): 
            $result[$val[$option]] = $val[$value];
        endforeach;
    return $result;
    }
    
    public function index(){
        $this->load->model('lesson_model');
        $data['title'] = 'Предмети';
        $data['view'] = '/lessons/lesson_view';
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(), 'id','kname');
        $data['lesson'] = $this->lesson_model->getAllLessons();
        $this->load->view('main_view',$data);
    }
    function getLessonByKafedra(){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(), 'id', 'kname');
        $this->load->model('lesson_model');
        $data['title'] = 'Предмети';
        $data['view'] = '/lessons/lesson_view';
        $kid = $this->security->xss_clean($this->input->post('kafedra'));
        $data['lesson'] = $this->lesson_model->getLessonByKafedra($kid);
        $this->load->view('main_view',$data);
        
    }
    function getLessonById($id){
        $this->load->model('lesson_model');
        $data['lesson'] = $this->lesson_model->getLessonById($id);
        $data['title'] = 'Предмет';
        $data['view'] = '/lessons/one_lesson_view';
        $this->load->view('main_view',$data);
    }
    
     function addLessonView(){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
        $data['view'] = '/lessons/edit_lesson_view';
        $data['title'] = 'Додавання предмету';
        $this->load->view('main_view',$data);
    }
    
    function addLesson(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('kafedra', 'Назва кафедри','trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Назва предмету','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
            {
                $data['view'] = 'err';
                $data['title'] = 'Помилка редагування';
                $this->load->view('main_view',$data);
            }
        else
            {   
                $data['kid'] = $this->security->xss_clean($this->input->post('kafedra'));
                $data['name'] = $this->security->xss_clean($this->input->post('name'));
                $this->load->model('lesson_model');
                $this->lesson_model->addLesson($data);
            }
    }
    
    function updateLessonView($id){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
        $this->load->model('lesson_model');
        $data['lesson'] = $this->lesson_model->getLessonById($id);
        $data['view'] = '/lessons/edit_lesson_view';
        $data['title'] = 'Редагування предмету';
        $this->load->view('main_view',$data);
        
    }
    
    function updateLesson(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //var_dump($_POST);exit;
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('id', 'Ідентифікатор предмету','trim|required|xss_clean');
        $this->form_validation->set_rules('kafedra', 'Назва кафедри','trim|required|xss_clean');
        $this->form_validation->set_rules('name', 'Назва предмету','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
            {
                $data['view'] = 'err';
                $data['title'] = 'Помилка редагування';
                $this->load->view('main_view',$data);
            }
        else
            {   
                $data['id'] = $this->security->xss_clean($this->input->post('id'));
                $data['kid'] = $this->security->xss_clean($this->input->post('kafedra'));
                $data['name'] = $this->security->xss_clean($this->input->post('name'));
                $this->load->model('lesson_model');
                $this->lesson_model->updateLesson($data);
            }
    }
                
    function removeLesson(){
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->load->model('lesson_model');
        $this->lesson_model->removeLesson($id);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */