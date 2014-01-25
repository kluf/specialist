<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class GroupStud_controller extends CI_Controller {
    public function arrayForSelect($content,$option,$value){
        foreach ($content as $val): 
            $result[$val[$option]] = $val[$value];
        endforeach;
    return $result;
    }
    
    public function index($off=0){
        $this->load->model('group_model');
        $config['total_rows'] = count($this->group_model->getGroups());
        $this->load->library('pagination');
        $config['base_url'] = '/index.php/groupStud_controller/index/';
        $config['per_page'] = 6;
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';   
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        $data['pages'] = $this->pagination->create_links();
        $data['title'] = 'Групи студентів';
        $data['view'] = '/groupStud/group_view';
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(), 'id','kname');
        $data['content'] = $this->group_model->getGroupsByLimit($config['per_page'],$off);
        $this->load->view('main_view',$data);
    }
    function getGroupStudByKafedra(){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(), 'id', 'kname');
        $this->load->model('group_model');
        $data['title'] = 'Групи студентів';
        $data['view'] = '/groupStud/group_view';
        $kid = $this->security->xss_clean($this->input->post('kafedra'));
        $data['content'] = $this->group_model->getGroupOfStudentsFromKafedra($kid);
        $this->load->view('main_view',$data);
        
    }
    function getGroupStudById($id){
        $this->load->model('group_model');
        $data['group'] = $this->group_model->getGroupStudById($id);
        $data['title'] = 'Група студентів';
        $data['view'] = '/groupStud/one_group_view';
        $this->load->view('main_view',$data);
    }
    
     function addGroupStudView(){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(), 'id', 'kname');
        $this->load->model('formaNavch_model');
        $data['formaNavch'] = $this->arrayForSelect($this->formaNavch_model->getFormaNavch(), 'id', 'name');
        $data['view'] = '/groupStud/edit_group_view';
        $data['title'] = 'Додавання групи студентів';
        $this->load->view('main_view',$data);
    }
    
    function addGroupStud(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //var_dump($_POST);exit;
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('formaNavch', 'Форма навчання','trim|required|xss_clean');
        $this->form_validation->set_rules('kafedra', 'Назва кафедри','trim|required|xss_clean');
        $this->form_validation->set_rules('gosName', 'Назва групи студентів','trim|required|xss_clean');
        $this->form_validation->set_rules('cnt', 'кількість студентів','trim|xss_clean');
        if ($this->form_validation->run() == FALSE)
            {
                $data['view'] = 'err';
                $data['title'] = 'Помилка редагування';
                $this->load->view('main_view',$data);
            }
        else
            {   
                $data['kid'] = $this->security->xss_clean($this->input->post('kafedra'));
                $data['sfid'] = $this->security->xss_clean($this->input->post('formaNavch'));
                $data['name'] = $this->security->xss_clean($this->input->post('gosName'));
                $data['cnt'] = $this->security->xss_clean($this->input->post('cnt'));
                $data['description'] = $this->security->xss_clean($this->input->post('description'));
                $this->load->model('group_model');
                $this->group_model->addGroupStud($data);
            }
    }
    
    function updateGroupStudView($id){
        $this->load->model('kafedra_model');
        $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
        $this->load->model('formaNavch_model');
        $data['formaNavch'] = $this->arrayForSelect($this->formaNavch_model->getFormaNavch(), 'id', 'name');
        $this->load->model('group_model');
        $data['group'] = $this->group_model->getGroupStudById($id);
        $data['view'] = '/groupStud/edit_group_view';
        $data['title'] = 'Редагування групи студентів';
        $this->load->view('main_view',$data);
    }
    
    function updateGroupStud(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //var_dump($_POST);exit;
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('id', 'Ідентифікатор групи студентів','trim|required|xss_clean');
        $this->form_validation->set_rules('formaNavch', 'Форма навчання','trim|required|xss_clean');
        $this->form_validation->set_rules('kafedra', 'Назва кафедри','trim|required|xss_clean');
        $this->form_validation->set_rules('gosName', 'Назва групи студентів','trim|required|xss_clean');
        $this->form_validation->set_rules('cnt', 'кількість студентів','trim|xss_clean');
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
                $data['sfid'] = $this->security->xss_clean($this->input->post('formaNavch'));
                $data['name'] = $this->security->xss_clean($this->input->post('gosName'));
                $data['cnt'] = $this->security->xss_clean($this->input->post('cnt'));
                $data['description'] = $this->security->xss_clean($this->input->post('description'));
                $this->load->model('group_model');
                $this->group_model->updateGroupStud($data);
            }
    }
                
    function removeGroupStud(){
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->load->model('group_model');
        $this->group_model->removeGroupStudById($id);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */