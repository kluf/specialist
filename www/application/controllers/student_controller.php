<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student_controller extends CI_Controller {

    public function arrayForSelect($content,$option,$value){
        foreach ($content as $val):
            $result[$val[$option]] = $val[$value];
        endforeach;
    return $result;
    }

    public function index($off=0) {
        $this->load->model('stud_model');
        $res = $this->stud_model->getCountStud();
        $config['total_rows'] = (int)$res['COUNT(*)'];
        $this->load->library('pagination');
        $config['base_url'] = '/index.php/student_controller/index/';
        $config['per_page'] = 15;
        $config['full_tag_open'] = '<div class="pagination pagination-centered"><ul>';
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
        $data['title'] = 'Студенти';
        $data['view'] = '/students/stud_view';
        $data['content'] = $this->stud_model->getStudents($config,$off);
        $this->load->view('main_view', $data);
    }

    public function getStudentById($id) {
        $this->load->model('stud_model');
        $data['title'] = 'Студент';
        $data['view'] = '/students/one_stud_view';
        $data['content'] = $this->stud_model->getStudentById($id);
        $this->load->view('main_view', $data);
    }

    public function addStudentView() {
        $this->load->model('group_model');
        $data['title'] = 'Додавання студента';
        $data['content']['grp'] = $this->arrayForSelect($this->group_model->getGroups(),'id','GOSname');
        $data['view'] = '/students/addStudent_view';
        $this->load->view('main_view', $data);
    }

    public function addStudent() {
        $data = array("group" => $this->security->xss_clean(($this->input->post('group'))),
            "surname" => $this->security->xss_clean($this->input->post('surname')),
            "name" => $this->security->xss_clean($this->input->post('name')),
            "patronimic" => $this->security->xss_clean($this->input->post('patronimic')),
            "zalikova1" => $this->security->xss_clean($this->input->post('zalikova1')),
            "phone1" => $this->security->xss_clean($this->input->post('phone1')),
            "passport" => $this->security->xss_clean($this->input->post('passport')),
            "surname2" => $this->security->xss_clean($this->input->post('surname2')),
            "zalikova2" => $this->security->xss_clean($this->input->post('zalikova2'))
        );
        $config['upload_path'] = './img/student/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '150';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $img = $this->upload->data();
        $data['photo'] = $img['file_name'];
        $this->load->model('stud_model');
        $this->stud_model->addStudent($data);
    }

    function removeStudent() {
        $data['idn'] = $this->security->xss_clean($this->input->post('idn'));
        var_dump($data);
        $this->load->model('stud_model');
        $this->stud_model->removeStudent($data);
    }

    function updateStudentView($id) {
        $this->load->model('stud_model');
        $data['content'] = $this->stud_model->getStudentById($id);
        $this->load->model('group_model');
        $data['content']['group'] = $this->arrayForSelect($this->group_model->getGroups(),'id','GOSname');
        $data['title'] = 'Редагування студента';
        $data['view'] = '/students/addStudent_view';
        $this->load->view('main_view', $data);
    }

    public function updateStudent() {
        $data = array("id" => $this->security->xss_clean($this->input->post('id')),
            "group" => $this->security->xss_clean($this->input->post('group')),
            "surname" => $this->security->xss_clean($this->input->post('surname')),
            "name" => $this->security->xss_clean($this->input->post('name')),
            "patronimic" => $this->security->xss_clean($this->input->post('patronimic')),
            "zalikova1" => $this->security->xss_clean($this->input->post('zalikova1')),
            "phone1" => $this->security->xss_clean($this->input->post('phone1')),
            "passport" => $this->security->xss_clean($this->input->post('passport')),
            "surname2" => $this->security->xss_clean($this->input->post('surname2')),
            "zalikova2" => $this->security->xss_clean($this->input->post('zalikova2'))
        );
        $config['upload_path'] = './img/student/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '150';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->do_upload();
        $img = $this->upload->data();
        if (!$img['file_name']) {
            $data['photo'] = $this->input->post('photo');
        } else {
            $data['photo'] = $img['file_name'];
        }
        $this->load->model('stud_model');
        $this->stud_model->updateStudent($data);
    }

}
