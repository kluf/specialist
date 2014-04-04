<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
            $data['title'] = 'Головна сторінка';
            $data['view'] = '/parts/main_page_view';
            $this->load->view('main_view',$data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */