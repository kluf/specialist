<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Loading_controller extends CI_Controller {
    function getDataForCharts(){
        $begSem = $this->security->xss_clean($this->input->post('begSem'));
        $endSem = $this->security->xss_clean($this->input->post('endSem'));
        if(!$begSem OR !$endSem){
             $begSem = '2009-09-01';
             $endSem = '2010-05-25';
        }
        $this->load->model("TeacherLoad");
        $this->load->model("kafedra_model");
        $kafId = $this->kafedra_model->getAllKafedra();
        foreach ($kafId as $value) {
            $data[] = $this->TeacherLoad->getTeacherLoadByKafedra($value['id'],$begSem,$endSem);
        }
        $this->output->set_content_type('application/json')
                    ->set_output(json_encode(array($data)));
        $result = $this->output->get_output();
        return $result;        
    }
    
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */