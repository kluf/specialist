<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Faculty_controller extends CI_Controller {
    public function arrayForSelect($content,$option,$value){
        foreach ($content as $val): 
            $result[$val[$option]] = $val[$value];
        endforeach;
    return $result;
    }
    function getFacultyById($id){
        $this->load->model('faculty_model');
        $data['faculty'] = $this->faculty_model->getFacultyById($id);
        $data['view'] = '/faculty/one_faculty_view';
        $data['title'] = 'Факультет';
        $this->load->view('main_view',$data);
    }
    public function index($off=0){
        $this->load->model('faculty_model');
        $res = $this->faculty_model->getCountFaculty();
        $config['total_rows'] = (int)$res['cnt'];
        $this->load->library('pagination');
        $config['base_url'] = '/index.php/faculty_controller/index/';
        $config['per_page'] = 10;
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
        $data['title'] = 'Факультети';
        $data['view'] = '/faculty/faculty_view';
        $data['content'] = $this->faculty_model->getFacultyByLimit($config['per_page'],$off);
        $this->load->view('main_view',$data);
    }
    
   
     function addFacultyView(){
        $this->load->model('faculty_model');
        $data['view'] = '/faculty/add_faculty_view';
        $data['title'] = 'Додавання факультету';
        $this->load->view('main_view',$data);
    }
    
    function addFaculty(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('name', 'Назва факультету','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
		{
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка додавання';
                    $this->load->view('main_view',$data);
		}
		else
		{   
                    $data['name'] = $this->security->xss_clean($this->input->post('name'));
                    $data['description'] = $this->security->xss_clean($this->input->post('description'));
                    $config['upload_path'] = './img/faculty/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '150';
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload();
                    $img = $this->upload->data();
                    if (!$img['file_name']) {
                        $data['img'] = 'defaultFaculty.jpg';
                    } else {
                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './img/faculty/'.$this->security->sanitize_filename($img['file_name']);
                        $config['wm_overlay_path'] = './img/thumbnail.png';
                        $config['wm_type'] = 'overlay';
                        $config['wm_opacity'] = '0';
                        $config['wm_vrt_alignment'] = 'bottom';
                        $config['wm_hor_alignment'] = 'right';
                        $this->image_lib->initialize($config);
                        $this->image_lib->watermark();
                        $data['img'] = $this->security->sanitize_filename($img['file_name']);
                    }
                    $this->load->model('faculty_model');
                    $this->faculty_model->addFaculty($data);
		}
    }
    
        function updateFaculty(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('name', 'Назва факультету','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
		{
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка додавання';
                    $this->load->view('main_view',$data);
		}
		else
		{   
                    $data['id'] = $this->security->xss_clean($this->input->post('id'));
                    $data['name'] = $this->security->xss_clean($this->input->post('name'));
                    $data['description'] = $this->security->xss_clean($this->input->post('description'));
                    $config['upload_path'] = './img/faculty/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '150';
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload();
                    $img = $this->upload->data();
                    if (!$img['file_name']) {
                        $data['img'] = $this->security->xss_clean($this->input->post('img'));;
                    } else {
                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './img/faculty/'.$this->security->sanitize_filename($img['file_name']);
                        $config['wm_overlay_path'] = './img/thumbnail.png';
                        $config['wm_type'] = 'overlay';
                        $config['wm_opacity'] = '0';
                        $config['wm_vrt_alignment'] = 'bottom';
                        $config['wm_hor_alignment'] = 'right';
                        $this->image_lib->initialize($config);
                        $this->image_lib->watermark();
                        $data['img'] = $this->security->sanitize_filename($img['file_name']);
                    }
                    $this->load->model('faculty_model');
                    $this->faculty_model->updateFaculty($data);
		}
    }
    
    function updateFacultyView($id){
        $this->load->model('faculty_model');
        $data['faculty'] = $this->faculty_model->getFacultyById($id);
        $this->load->model('faculty_model');
        $data['view'] = '/faculty/update_faculty_view';
        $data['title'] = 'Редагування факультету';
        $this->load->view('main_view',$data);
    }
    function removeFaculty(){
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->load->model('faculty_model');
        $this->faculty_model->removeFaculty($id);
    }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */