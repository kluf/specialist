<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kafedra_controller extends CI_Controller {
    public function arrayForSelect($content,$option,$value){
        foreach ($content as $val): 
            $result[$val[$option]] = $val[$value];
        endforeach;
    return $result;
    }
    
    public function index($off=0){
        $this->load->model('kafedra_model');
        $res = $this->kafedra_model->getCountKafedra();
        $config['total_rows'] = (int)$res['cnt'];
        $this->load->library('pagination');
        $config['base_url'] = '/index.php/kafedra_controller/index/';
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
        $data['title'] = 'Кафедри';
        $data['view'] = '/kafedra/kafedra_view';
        $data['content'] = $this->kafedra_model->getKafedra($config,$off);
        $data['title'] = 'кафедри';
        $data['view'] = '/kafedra/kafedra_view';
        $this->load->view('main_view',$data);
    }
    
    function getKafedraById($id){
        $this->load->model('kafedra_model');
        $data['content']['kafedra'] = $this->kafedra_model->getKafedraById($id);
        $data['title'] = 'Кафедра';
        $data['view'] = '/kafedra/one_kafedra_view';
        $this->load->view('main_view',$data);
    }
    
     function addKafedraView(){
        $this->load->model('faculty_model');
        $data['content']['faculty'] = $this->arrayForSelect($this->faculty_model->getFaculty(), 'id', 'name');
        $data['view'] = '/kafedra/add_kafedra_view';
        $data['title'] = 'Додавання кафедри';
        $this->load->view('main_view',$data);
    }
    
    function addKafedra(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('faculty', 'Ідентифікатор факультету','trim|required|xss_clean');
        $this->form_validation->set_rules('kname', 'Назва кафедри','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
		{
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка редагування';
                    $this->load->view('main_view',$data);
		}
		else
		{   
                    $data['fid'] = $this->security->xss_clean($this->input->post('faculty'));
                    $data['kname'] = $this->security->xss_clean($this->input->post('kname'));
                    $data['description'] = $this->security->xss_clean($this->input->post('description'));
                    $config['upload_path'] = './img/kafedra/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '150';
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload();
                    $img = $this->upload->data();
                    if (!$img['file_name']) {
                        $data['photo'] = 'defaultKafedra.jpg';
                    } else {
                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './img/kafedra/'.$this->security->sanitize_filename($img['file_name']);
                        $config['wm_overlay_path'] = './img/thumbnail.png';
                        $config['wm_type'] = 'overlay';
                        $config['wm_opacity'] = '0';
                        $config['wm_vrt_alignment'] = 'bottom';
                        $config['wm_hor_alignment'] = 'right';
                        $this->image_lib->initialize($config);
                        $this->image_lib->watermark();
                        $data['photo'] = $this->security->sanitize_filename($img['file_name']);
                    }
                    $this->load->model('kafedra_model');
                    $this->kafedra_model->addKafedra($data);
		}
    }
    
    function updateKafedraView($id){
        $this->load->model('kafedra_model');
        $data['content'] = $this->kafedra_model->getKafedraById($id);
        $this->load->model('faculty_model');
        $data['content']['faculty'] = $this->arrayForSelect($this->faculty_model->getFaculty(), 'id', 'name');
        $data['view'] = '/kafedra/edit_kafedra_view';
        $data['title'] = 'Редагування кафедри';
        $this->load->view('main_view',$data);
    }
    
    function updateKafedra(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
        $this->form_validation->set_rules('id', 'Ідентифікатор кафедри','trim|required|xss_clean');
        $this->form_validation->set_rules('faculty', 'Ідентифікатор факультету','trim|required|xss_clean');
        $this->form_validation->set_rules('kname', 'Назва кафедри','trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE)
		{
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка редагування';
                    $this->load->view('main_view',$data);
		}
		else
		{   
                    $data['id'] = $this->security->xss_clean($this->input->post('id'));
                    $data['fid'] = $this->security->xss_clean($this->input->post('faculty'));
                    $data['kname'] = $this->security->xss_clean($this->input->post('kname'));
                    $data['description'] = $this->security->xss_clean($this->input->post('description'));
                    $config['upload_path'] = './img/kafedra/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '150';
                    $config['encrypt_name'] = TRUE;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload();
                    $img = $this->upload->data();
                    if (!$img['file_name']) {
                        $data['photo'] = $this->security->sanitize_filename($this->input->post('photo'));
                    } else {
                        $this->load->library('image_lib');
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './img/kafedra/'.$this->security->sanitize_filename($img['file_name']);
                        $config['wm_overlay_path'] = './img/thumbnail.png';
                        $config['wm_type'] = 'overlay';
                        $config['wm_opacity'] = '0';
                        $config['wm_vrt_alignment'] = 'bottom';
                        $config['wm_hor_alignment'] = 'right';
                        $this->image_lib->initialize($config);
                        $this->image_lib->watermark();

                        $data['photo'] = $this->security->sanitize_filename($img['file_name']);
                    }
                    $this->load->model('kafedra_model');
                    $this->kafedra_model->updateKafedra($data);
		}
    }
    
    function removeKafedra(){
        $id = $this->security->xss_clean($this->input->post('id'));
        $this->load->model('kafedra_model');
        $this->kafedra_model->removeKafedra($id);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */