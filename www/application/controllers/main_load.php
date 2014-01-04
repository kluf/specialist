<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_load extends CI_Controller {

	public function index()
	{
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data['title'] = 'Головне навантаження';
                $data['view'] = '/loading/mainLoad_view';
                $this->load->model('teacher_model');
                $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
                $this->load->model('main_load_model');
                $arrData['id'] = $this->security->xss_clean($this->input->post('teacher'));
                $arrData['startSem'] = $this->security->xss_clean($this->input->post('startSem'));
                $arrData['endSem'] = $this->security->xss_clean($this->input->post('endSem'));
                $data['mainLoad'] = $this->main_load_model->getMainTeacherLoad($arrData);
                $this->load->view('/main_view',$data); 
            }else{
                $data['title'] = 'Головне навантаження';
                $data['view'] = '/loading/mainLoad_view';
                $this->load->model('teacher_model');
                $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
                $this->load->view('/main_view',$data);    
            }
	}
        public function personalLoading()
	{
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data['title'] = 'Персональне навантаження';
                $data['view'] = '/loading/personalLoad_view';
                $this->load->model('main_load_model');
                $arrData['id'] = $this->security->xss_clean($this->input->post('teacher'));
                $arrData['startSem'] = $this->security->xss_clean($this->input->post('startSem'));
                $arrData['endSem'] = $this->security->xss_clean($this->input->post('endSem'));
                $data['mainLoad'] = $this->main_load_model->getPersonalTeacherLoad($arrData);
                $this->load->view('/main_view',$data); 
            }else{
                $data['title'] = 'Персональне навантаження';
                $data['view'] = '/loading/personalLoad_view';
                $this->load->view('/main_view',$data);    
            }
            
	}
         public function practiceLoading()
	{
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data['title'] = 'Навантаження по практиці';
                $data['view'] = '/loading/practiceLoad_view';
                $this->load->model('main_load_model');
                $arrData['id'] = $this->security->xss_clean($this->input->post('teacher'));
                $arrData['startSem'] = $this->security->xss_clean($this->input->post('startSem'));
                $arrData['endSem'] = $this->security->xss_clean($this->input->post('endSem'));
                $data['mainLoad'] = $this->main_load_model->getPracticeTeacherLoad($arrData);
                $this->load->view('/main_view',$data); 
            }else{
                $data['title'] = 'Навантаження по практиці';
                $data['view'] = '/loading/practiceLoad_view';
                $this->load->view('/main_view',$data);    
            }
            
	}
        public function arrayForSelect($content,$option,$value){
            foreach ($content as $val): 
                $result[$val[$option]] = $val[$value];
            endforeach;
            return $result;
        }
        public function addMainLoadView(){
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $this->load->model('lesson_model');
            $data['lesson'] = $this->arrayForSelect($this->lesson_model->getAllLessons(),'id','name');
            $this->load->model('group_model');
            $data['group'] = $this->arrayForSelect($this->group_model->getGroups(),'id','GOSname');
            $this->load->model('auditory_model');
            $data['auditory'] = $this->arrayForSelect($this->auditory_model->getAuditory(),'id','number_aud');
            $data['title'] = 'Додати головне навантаження';
            $data['view'] = '/loading/addMainLoad_view';
            $this->load->view('main_view',$data);
        }
        public function addPersLoadView(){
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $data['title'] = 'Додати персональне навантаження';
            $data['view'] = '/loading/addPersLoad_view';
            $this->load->view('main_view',$data);
        }
        public function updatePersLoadView($id){
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $this->load->model('main_load_model');
            $data['persLoad'] = $this->main_load_model->getPersonalTeacherLoadById($this->security->xss_clean($id));
            $data['title'] = 'Редагувати персональне навантаження';
            $data['view'] = '/loading/addPersLoad_view';
            $this->load->view('main_view',$data);
        }
        public function addPraktLoadView(){
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $this->load->model('group_model');
            $data['group'] = $this->arrayForSelect($this->group_model->getGroups(),'id','GOSname');
            $this->load->model('practice');
            $data['practice'] = $this->arrayForSelect($this->practice->getPracticeType(),'id','type_prakt_val');
            $data['title'] = 'Додати навантаження по практиці';
            $data['view'] = '/loading/addPraktLoad_view';
            $this->load->view('main_view',$data);
        }
        public function updatePractLoadView($id){
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $this->load->model('group_model');
            $data['group'] = $this->arrayForSelect($this->group_model->getGroups(),'id','GOSname');
            $this->load->model('practice');
            $data['practice'] = $this->arrayForSelect($this->practice->getPracticeType(),'id','type_prakt_val');
            $this->load->model('main_load_model');
            $data['practLoad'] = $this->main_load_model->getPracticeTeacherLoadById($this->security->xss_clean($id));
            $data['title'] = 'Додати навантаження по практиці';
            $data['view'] = '/loading/addPraktLoad_view';
            $this->load->view('main_view',$data);
        }
        public function updateMainLoadView($id){
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $this->load->model('lesson_model');
            $data['lesson'] = $this->arrayForSelect($this->lesson_model->getAllLessons(),'id','name');
            $this->load->model('group_model');
            $data['group'] = $this->arrayForSelect($this->group_model->getGroups(),'id','GOSname');
            $this->load->model('auditory_model');
            $this->load->model('practice');
            $data['practice'] = $this->arrayForSelect($this->practice->getPracticeType(),'id','type_prakt_val');
            $data['auditory'] = $this->arrayForSelect($this->auditory_model->getAuditory(),'id','number_aud');
            $data['title'] = 'Відредагувати головне навантаження';
            $data['view'] = '/loading/editMainLoad_view';
            $id_my = $this->security->xss_clean($id);
            $this->load->model('main_load_model');
            $data['mainLoad'] = $this->main_load_model->getMainTeacherLoadById($id_my);
            $this->load->view('main_view',$data);
        }
        public function getAjaxDropdowns(){
            $kid = $this->input->post('kid');
            $this->load->model('teacher_model');
            $data['teacher'] = $this->teacher_model->getTeacherByKafedra($kid);
            $this->load->model('lesson_model');
            $data['lesson'] = $this->lesson_model->getLessonByKafedra($kid);
            $this->output->set_content_type('application/json; charset=utf-8')
                     ->set_output(json_encode($data));
        }
        public function addMainLoad(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('teacher', 'Викладач','trim|required|xss_clean');
            $this->form_validation->set_rules('lesson', 'Предмет','trim|required|xss_clean');
            $this->form_validation->set_rules('group', 'Група студентів','trim|required|xss_clean');
            $this->form_validation->set_rules('dateStart', 'Початок семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('dateFinal', 'Кінець семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('subgroup', 'Підгрупа','trim|xss_clean');
            $this->form_validation->set_rules('semestr', '№ семестру','trim|xss_clean');
            $this->form_validation->set_rules('cntStud', 'Кількість студентів','trim|required|xss_clean');
            $this->form_validation->set_rules('lection', 'Лекція','trim|xss_clean');
            $this->form_validation->set_rules('lecAud1', 'Лекційна аудиторія 1','trim|xss_clean');
            $this->form_validation->set_rules('lecAud2', 'Лекційна аудиторія 2','trim|xss_clean');
            $this->form_validation->set_rules('practice', 'Практичні','trim|xss_clean');
            $this->form_validation->set_rules('practAud1', 'Практична аудиторія 1','trim|xss_clean');
            $this->form_validation->set_rules('practAud2', 'Практична аудиторія 2','trim|xss_clean');
            $this->form_validation->set_rules('lab', 'Лабораторні','trim|xss_clean');
            $this->form_validation->set_rules('labAud1', 'Лабораторна аудиторія 1','trim|xss_clean');
            $this->form_validation->set_rules('labAud2', 'Лабораторна аудиторія 2','trim|xss_clean');
            $this->form_validation->set_rules('zalik', 'Залік','trim|xss_clean');
            $this->form_validation->set_rules('KontrRob', 'Контрольна робота','trim|xss_clean');
            $this->form_validation->set_rules('KursRob', 'Курсова робота','trim|xss_clean');
            $this->form_validation->set_rules('konsult', 'Курсова робота','trim|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка редагування';
                    $this->load->view('main_view',$data);
                }
                else
                {   
                    $data['teacher'] = $this->security->xss_clean($this->input->post('teacher'));
                    $data['lesson'] = $this->security->xss_clean($this->input->post('lesson'));
                    $data['group'] = $this->security->xss_clean($this->input->post('group'));
                    $data['dateStart'] = $this->security->xss_clean($this->input->post('dateStart'));
                    $data['dateFinal'] = $this->security->xss_clean($this->input->post('dateFinal'));
                    $data['lection'] = $this->security->xss_clean($this->input->post('lection'));
                    $data['subgroup'] = $this->security->xss_clean($this->input->post('subgroup'));
                    $data['semestr'] = $this->security->xss_clean($this->input->post('semestr'));
                    $data['cntStud'] = $this->security->xss_clean($this->input->post('cntStud'));
                    $data['konsult'] = $this->security->xss_clean($this->input->post('konsult'));
                    if(!$data['lection']){
                        $data['lection'] = 0;
                        $data['lecAud1'] = '---';
                        $data['lecAud2'] = '---';
                    }else{
                        $data['lection'] = 1;
                        $data['lecAud1'] = $this->security->xss_clean($this->input->post('lecAud1'));
                        $data['lecAud2'] = $this->security->xss_clean($this->input->post('lecAud2'));
                    }
                    $data['practice'] = $this->security->xss_clean($this->input->post('practice'));
                    if(!$data['practice']){
                        $data['practice'] = 0;
                        $data['practAud1'] = '---';
                        $data['practAud2'] = '---';
                    }else{
                        $data['practice'] = 1;
                        $data['practAud1'] = $this->security->xss_clean($this->input->post('practAud1'));
                        $data['practAud2'] = $this->security->xss_clean($this->input->post('practAud2'));
                    }
                    $data['lab'] = $this->security->xss_clean($this->input->post('lab'));
                    if(!$data['lab']){
                        $data['lab'] = 0;
                        $data['labAud1'] = '---';
                        $data['labAud2'] = '---';
                    }else{
                        $data['lab'] = 1;
                        $data['labAud1'] = $this->security->xss_clean($this->input->post('labAud1'));
                        $data['labAud2'] = $this->security->xss_clean($this->input->post('labAud2'));
                    }
                    $data['zalik'] = $this->security->xss_clean($this->input->post('zalik'));
                    if($data['zalik'] == 'zalik'){
                        $data['zalik'] = 1;
                        $data['ispyt'] = 0;
                        $data['konsult'] = 0;
                    }else{
                        $data['zalik'] = 0;
                        $data['ispyt'] = 1;
                        if($data['konsult']){
                            $data['konsult'] = 1;
                        }else{
                            $data['konsult'] = 0;
                        }
                    }
                    $data['KontrRob'] = $this->security->xss_clean($this->input->post('KontrRob'));
                    if(!$data['KontrRob']){
                        $data['KontrRob'] = '0';
                    }else{
                        $data['KontrRob'] = '1';
                    }
                    $data['KursRob'] = $this->security->xss_clean($this->input->post('KursRob'));
                    if($data['KursRob'] == 'KursProj'){
                        $data['KursRob'] = '0';
                        $data['KursProj'] = '1';
                    }else{
                        $data['KursRob'] = '1';
                        $data['KursProj'] = '0';
                    }
                    $this->load->model('main_load_model');
                    $this->main_load_model->addMainTeacherLoad($data);
                }
        }
        public function updateMainLoad(){
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('id', 'Ідентифікатор','trim|required|xss_clean');
            $this->form_validation->set_rules('teacher', 'Викладач','trim|required|xss_clean');
            $this->form_validation->set_rules('lesson', 'Предмет','trim|required|xss_clean');
            $this->form_validation->set_rules('group', 'Група студентів','trim|required|xss_clean');
            $this->form_validation->set_rules('dateStart', 'Початок семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('dateFinal', 'Кінець семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('subgroup', 'Підгрупа','trim|xss_clean');
            $this->form_validation->set_rules('semestr', '№ семестру','trim|xss_clean');
            $this->form_validation->set_rules('cntStud', 'Кількість студентів','trim|required|xss_clean');
            $this->form_validation->set_rules('lection', 'Лекція','trim|xss_clean');
            $this->form_validation->set_rules('lecAud1', 'Лекційна аудиторія 1','trim|xss_clean');
            $this->form_validation->set_rules('lecAud2', 'Лекційна аудиторія 2','trim|xss_clean');
            $this->form_validation->set_rules('practice', 'Практичні','trim|xss_clean');
            $this->form_validation->set_rules('practAud1', 'Практична аудиторія 1','trim|xss_clean');
            $this->form_validation->set_rules('practAud2', 'Практична аудиторія 2','trim|xss_clean');
            $this->form_validation->set_rules('lab', 'Лабораторні','trim|xss_clean');
            $this->form_validation->set_rules('labAud1', 'Лабораторна аудиторія 1','trim|xss_clean');
            $this->form_validation->set_rules('labAud2', 'Лабораторна аудиторія 2','trim|xss_clean');
            $this->form_validation->set_rules('zalik', 'Залік','trim|xss_clean');
            $this->form_validation->set_rules('KontrRob', 'Контрольна робота','trim|xss_clean');
            $this->form_validation->set_rules('KursRob', 'Курсова робота','trim|xss_clean');
            $this->form_validation->set_rules('konsult', 'Курсова робота','trim|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка редагування';
                    $this->load->view('main_view',$data);
                }
                else
                {   
                    $data['id'] = $this->security->xss_clean($this->input->post('id'));
                    $data['teacher'] = $this->security->xss_clean($this->input->post('teacher'));
                    $data['lesson'] = $this->security->xss_clean($this->input->post('lesson'));
                    $data['group'] = $this->security->xss_clean($this->input->post('group'));
                    $data['dateStart'] = $this->security->xss_clean($this->input->post('dateStart'));
                    $data['dateFinal'] = $this->security->xss_clean($this->input->post('dateFinal'));
                    $data['lection'] = $this->security->xss_clean($this->input->post('lection'));
                    $data['subgroup'] = $this->security->xss_clean($this->input->post('subgroup'));
                    $data['semestr'] = $this->security->xss_clean($this->input->post('semestr'));
                    $data['cntStud'] = $this->security->xss_clean($this->input->post('cntStud'));
                    $data['konsult'] = $this->security->xss_clean($this->input->post('konsult'));
                    if(!$data['lection']){
                        $data['lection'] = 0;
                        $data['lecAud1'] = '---';
                        $data['lecAud2'] = '---';
                    }else{
                        $data['lection'] = 1;
                        $data['lecAud1'] = $this->security->xss_clean($this->input->post('lecAud1'));
                        $data['lecAud2'] = $this->security->xss_clean($this->input->post('lecAud2'));
                    }
                    $data['practice'] = $this->security->xss_clean($this->input->post('practice'));
                    if(!$data['practice']){
                        $data['practice'] = 0;
                        $data['practAud1'] = '---';
                        $data['practAud2'] = '---';
                    }else{
                        $data['practice'] = 1;
                        $data['practAud1'] = $this->security->xss_clean($this->input->post('practAud1'));
                        $data['practAud2'] = $this->security->xss_clean($this->input->post('practAud2'));
                    }
                    $data['lab'] = $this->security->xss_clean($this->input->post('lab'));
                    if(!$data['lab']){
                        $data['lab'] = 0;
                        $data['labAud1'] = '---';
                        $data['labAud2'] = '---';
                    }else{
                        $data['lab'] = 1;
                        $data['labAud1'] = $this->security->xss_clean($this->input->post('labAud1'));
                        $data['labAud2'] = $this->security->xss_clean($this->input->post('labAud2'));
                    }
                    $data['zalik'] = $this->security->xss_clean($this->input->post('zalik'));
                    if($data['zalik'] == 'zalik'){
                        $data['zalik'] = 1;
                        $data['ispyt'] = 0;
                        $data['konsult'] = 0;
                    }else{
                        $data['zalik'] = 0;
                        $data['ispyt'] = 1;
                        if($data['konsult']){
                            $data['konsult'] = 1;
                        }else{
                            $data['konsult'] = 0;
                        }
                    }
                    $data['KontrRob'] = $this->security->xss_clean($this->input->post('KontrRob'));
                    if(!$data['KontrRob']){
                        $data['KontrRob'] = '0';
                    }else{
                        $data['KontrRob'] = '1';
                    }
                    $data['KursRob'] = $this->security->xss_clean($this->input->post('KursRob'));
                    if($data['KursRob'] == 'KursProj'){
                        $data['KursRob'] = '0';
                        $data['KursProj'] = '1';
                    }else{
                        $data['KursRob'] = '1';
                        $data['KursProj'] = '0';
                    }
                    $this->load->model('main_load_model');
                    $this->main_load_model->updateMainTeacherLoad($data);
                }
        }
        public function addPersLoad() {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('teacher', 'Викладач','trim|required|xss_clean');
            $this->form_validation->set_rules('dateStart', 'Початок семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('dateFinal', 'Кінець семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('stavka', 'Ставка','trim|numeric|xss_clean');
            $this->form_validation->set_rules('planove_navant', 'Планове навантаження','trim|xss_clean|numeric');
            $this->form_validation->set_rules('dp', 'Дипломне проектування','trim|numeric|xss_clean');
            $this->form_validation->set_rules('rec_dp', 'Рецензія ДП','trim|numeric|xss_clean');
            $this->form_validation->set_rules('magRob', 'магістерська робота','trim|numeric|xss_clean');
            $this->form_validation->set_rules('recMR', 'Рецензія МР','trim|numeric|xss_clean');
            $this->form_validation->set_rules('dek', 'ДЕК','trim|numeric|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка редагування';
                    $this->load->view('main_view',$data);
                }
                else
                {   
                    $data['teacher'] = $this->security->xss_clean($this->input->post('teacher'));
                    $data['dateStart'] = $this->security->xss_clean($this->input->post('dateStart'));
                    $data['dateFinal'] = $this->security->xss_clean($this->input->post('dateFinal'));
                    $data['stavka'] = $this->security->xss_clean($this->input->post('stavka'));
                    $data['planove_navant'] = $this->security->xss_clean($this->input->post('planove_navant'));
                    $data['dp'] = $this->security->xss_clean($this->input->post('dp'));
                    $data['rec_dp'] = $this->security->xss_clean($this->input->post('rec_dp'));
                    $data['magRob'] = $this->security->xss_clean($this->input->post('magRob'));
                    $data['recMR'] = $this->security->xss_clean($this->input->post('recMR'));
                    $data['dek'] = $this->security->xss_clean($this->input->post('dek'));
                    $this->load->model('main_load_model');
                    $this->main_load_model->addPersTeacherLoad($data);
                }
        }
        public function updatePersLoad() {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('id', 'ідентифікатор','trim|required|xss_clean');
            $this->form_validation->set_rules('teacher', 'Викладач','trim|required|xss_clean');
            $this->form_validation->set_rules('dateStart', 'Початок семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('dateFinal', 'Кінець семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('stavka', 'Ставка','trim|numeric|xss_clean');
            $this->form_validation->set_rules('planove_navant', 'Планове навантаження','trim|xss_clean|numeric');
            $this->form_validation->set_rules('dp', 'Дипломне проектування','trim|numeric|xss_clean');
            $this->form_validation->set_rules('rec_dp', 'Рецензія ДП','trim|numeric|xss_clean');
            $this->form_validation->set_rules('magRob', 'магістерська робота','trim|numeric|xss_clean');
            $this->form_validation->set_rules('recMR', 'Рецензія МР','trim|numeric|xss_clean');
            $this->form_validation->set_rules('dek', 'ДЕК','trim|numeric|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка редагування';
                    $this->load->view('main_view',$data);
                }
                else
                {   
                    $data['id'] = $this->security->xss_clean($this->input->post('id'));
                    $data['teacher'] = $this->security->xss_clean($this->input->post('teacher'));
                    $data['dateStart'] = $this->security->xss_clean($this->input->post('dateStart'));
                    $data['dateFinal'] = $this->security->xss_clean($this->input->post('dateFinal'));
                    $data['stavka'] = $this->security->xss_clean($this->input->post('stavka'));
                    $data['planove_navant'] = $this->security->xss_clean($this->input->post('planove_navant'));
                    $data['dp'] = $this->security->xss_clean($this->input->post('dp'));
                    $data['rec_dp'] = $this->security->xss_clean($this->input->post('rec_dp'));
                    $data['magRob'] = $this->security->xss_clean($this->input->post('magRob'));
                    $data['recMR'] = $this->security->xss_clean($this->input->post('recMR'));
                    $data['dek'] = $this->security->xss_clean($this->input->post('dek'));
                    $this->load->model('main_load_model');
                    $this->main_load_model->updatePersTeacherLoad($data);
                }
        }  
         public function addPraktLoad() {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('teacher', 'Викладач','trim|required|xss_clean');
            $this->form_validation->set_rules('group', 'Група студентів','trim|required|xss_clean');
            $this->form_validation->set_rules('practice', 'Практика(тип)','trim|required|xss_clean');
            $this->form_validation->set_rules('cntStud', 'кількість студентів','trim|numeric|xss_clean');
            $this->form_validation->set_rules('dateStart', 'Початок семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('dateFinal', 'Кінець семестру','trim|required|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка редагування';
                    $this->load->view('main_view',$data);
                }
                else
                {   
                    $data['teacher'] = $this->security->xss_clean($this->input->post('teacher'));
                    $data['group'] = $this->security->xss_clean($this->input->post('group'));
                    $data['practice'] = $this->security->xss_clean($this->input->post('practice'));
                    $data['dateStart'] = $this->security->xss_clean($this->input->post('dateStart'));
                    $data['dateFinal'] = $this->security->xss_clean($this->input->post('dateFinal'));
                    $data['cntStud'] = $this->security->xss_clean($this->input->post('cntStud'));
                    $this->load->model('main_load_model');
                    $this->main_load_model->addPraktTeacherLoad($data);
                }
        }
        public function updatePraktLoad() {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('id', 'ідентифікатор','trim|required|xss_clean');
            $this->form_validation->set_rules('teacher', 'Викладач','trim|required|xss_clean');
            $this->form_validation->set_rules('group', 'Група студентів','trim|required|xss_clean');
            $this->form_validation->set_rules('practice', 'Практика(тип)','trim|required|xss_clean');
            $this->form_validation->set_rules('cntStud', 'кількість студентів','trim|numeric|xss_clean');
            $this->form_validation->set_rules('dateStart', 'Початок семестру','trim|required|xss_clean');
            $this->form_validation->set_rules('dateFinal', 'Кінець семестру','trim|required|xss_clean');
                if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка редагування';
                    $this->load->view('main_view',$data);
                }
                else
                {   
                    $data['id'] = $this->security->xss_clean($this->input->post('id'));
                    $data['teacher'] = $this->security->xss_clean($this->input->post('teacher'));
                    $data['group'] = $this->security->xss_clean($this->input->post('group'));
                    $data['practice'] = $this->security->xss_clean($this->input->post('practice'));
                    $data['dateStart'] = $this->security->xss_clean($this->input->post('dateStart'));
                    $data['dateFinal'] = $this->security->xss_clean($this->input->post('dateFinal'));
                    $data['cntStud'] = $this->security->xss_clean($this->input->post('cntStud'));
                    $this->load->model('main_load_model');
                    $this->main_load_model->updatePraktTeacherLoad($data);
                }
        }
        function removeMainLoad() {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('id', 'Ідентифікатор','trim|required|numeric|xss_clean');
            if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка видалення';
                    $this->load->view('main_view',$data);
                }
            else
                {   
                    $id = $this->security->xss_clean($this->input->post('id'));
                    $this->load->model('main_load_model');
                    $this->main_load_model->removeMainTeacherLoad($id);
                }
        }
        function removePersLoad() {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('id', 'Ідентифікатор','trim|required|numeric|xss_clean');
            if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка видалення';
                    $this->load->view('main_view',$data);
                }
            else
                {   
                    $id = $this->security->xss_clean($this->input->post('id'));
                    $this->load->model('main_load_model');
                    $this->main_load_model->removePersonalTeacherLoad($id);
                }
        }
        function removePractLoad() {
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-block">', '</div>');
            $this->form_validation->set_rules('id', 'Ідентифікатор','trim|required|numeric|xss_clean');
            if ($this->form_validation->run() == FALSE)
                {
                    $data['view'] = 'err';
                    $data['title'] = 'Помилка видалення';
                    $this->load->view('main_view',$data);
                }
            else
                {   
                    $id = $this->security->xss_clean($this->input->post('id'));
                    $this->load->model('main_load_model');
                    $this->main_load_model->removePersonalTeacherLoad($id);
                }
        }
        function getTimesheet() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $attrs['kafedra'] = $this->security->xss_clean($this->input->post('kafedra'));
                $attrs['formaNavch'] = $this->security->xss_clean($this->input->post('formaNavch'));
                $attrs['startSem'] = $this->security->xss_clean($this->input->post('startSem'));
                $attrs['endSem'] = $this->security->xss_clean($this->input->post('endSem'));
                $this->load->model('main_load_model');
                $data['timesheet'] = $this->main_load_model->getTimesheet($attrs);
                
            }
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $this->load->model('formaNavch_model');
            $data['formaNavch'] = $this->arrayForSelect($this->formaNavch_model->getFormaNavch(),'id','name');
            $data['view'] = '/loading/timesheet_view';
            $data['title'] = 'Розклад по викладачах';
            $this->load->view('main_view',$data);
        }
        function getKafedraLoading() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $attrs['kafedra'] = $this->security->xss_clean($this->input->post('kafedra'));
                $attrs['startSem'] = $this->security->xss_clean($this->input->post('startSem'));
                $attrs['endSem'] = $this->security->xss_clean($this->input->post('endSem'));
                $this->load->model('main_load_model');
                $data['kafedraLoad'] = $this->main_load_model->getKafedraLoad($attrs);
                
            }
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $data['view'] = '/loading/kafedraLoad_view';
            $data['title'] = 'Навантаження по кафедрі';
            $this->load->view('main_view',$data);
        }
        function getFullTeacherLoading() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $attrs['id'] = $this->security->xss_clean($this->input->post('teacher'));
                $attrs['startSem'] = $this->security->xss_clean($this->input->post('startSem'));
                $attrs['endSem'] = $this->security->xss_clean($this->input->post('endSem'));
                $this->load->model('main_load_model');
                $data['persLoad'] = $this->main_load_model->getPersonalTeacherLoad($attrs);
                $data['mainLoad'] = $this->main_load_model->getMainTeacherLoad($attrs);
                $data['practLoad'] = $this->main_load_model->getPracticeTeacherLoad($attrs);
                $data['sumLoad'] = $this->main_load_model->getTeachersLoadCount($attrs);
                
            }
            $this->load->model('kafedra_model');
            $data['kafedra'] = $this->arrayForSelect($this->kafedra_model->getAllKafedra(),'id','kname');
            $this->load->model('teacher_model');
            $data['teacher'] = $this->arrayForSelect($this->teacher_model->getAllTeachers(),'id','surname');
            $data['view'] = '/loading/fullTeacherLoading_view';
            $data['title'] = 'Навантаження по викладачу';
            $this->load->view('main_view',$data);
        }
}