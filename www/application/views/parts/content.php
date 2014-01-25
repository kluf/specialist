    <div class="row-fluid">
        <!--Sidebar content-->
        <div class="span3">
            <p class="menu_site">Навігація</p>
            <ul class="nav nav-list bs-docs-sidenav affix-top">
                <li><a href="<?=base_url().'faculty_controller/';?>">Факультети</a></li>
                <li><a href="<?=base_url().'kafedra_controller/';?>">Кафедри</a></li>
                <li><a href="<?=base_url().'groupStud_controller/';?>">Групи студентів</a></li>
                <li><a href="<?=base_url().'student_controller/';?>">Студенти</a></li>
                <li><a href="<?=base_url().'lesson_controller/';?>">Предмети</a></li>
                <li><a href="<?=base_url().'teacher_controller/';?>">Викладачі</a></li>
               
                <li class="accordion"><a href="#"><i class=" icon-eye-open"></i> - навантаження для огляду</a>
                    <ul>
                        <li><a href="<?=base_url().'main_load/getTimesheet/';?>">Розклад</a></li>
                        <li><a href="<?=base_url().'main_load/getFullTeacherLoading/';?>">Навантаження викладача</a></li>
                        <li><a href="<?=base_url().'main_load/getKafedraLoading/';?>">Навантаження по кафедрі</a></li>
                    </ul>
                </li>
                <li class="accordion"><a href="#"><i class="icon-edit"></i><i class="icon-trash"></i> - навантаження для редагування та видалення</a>
                    <ul>
                        <li><a href="<?=base_url().'main_load/';?>">Головне навантаження</a></li>
                        <li><a href="<?=base_url().'main_load/personalLoading/';?>">Персональне навантаження</a></li>
                        <li><a href="<?=base_url().'main_load/practiceLoading/';?>">Навантаження по практиці</a></li>
                    </ul>
                </li>
                <li class="accordion"><a href="#"><i class="icon-plus-sign"></i> - додати інформацію</a>
                    <ul>
                        <li><a href="<?=base_url().'student_controller/addStudentView/';?>"><i class="icon-plus"></i> Студента</a></li>
                        <li><a href="<?=base_url().'Main_load/addMainLoadView/';?>"><i class="icon-plus"></i> Головне навантаження </a></li>
                        <li><a href="<?=base_url().'Main_load/addPersLoadView/';?>"><i class="icon-plus"></i> Персональне навантаження </a></li>
                        <li><a href="<?=base_url().'Main_load/addPraktLoadView/';?>"><i class="icon-plus"></i> Навантаження по практиці </a></li>
                        <li><a href="<?=base_url().'faculty_controller/addFacultyView/';?>"><i class="icon-plus"></i> Факультет</a></li>
                        <li><a href="<?=base_url().'kafedra_controller/addKafedraView/';?>"><i class="icon-plus"></i> Кафедру</a></li>
                        <li><a href="<?=base_url().'groupStud_controller/addGroupStudView/';?>"><i class="icon-plus"></i> Групу студентів</a></li>
                        <li><a href="<?=base_url().'lesson_controller/addLessonView/';?>"><i class="icon-plus"></i> Предмет</a></li>
                        <li><a href="<?=base_url().'teacher_controller/addTeacherView/';?>"><i class="icon-plus"></i> Викладача</a></li>
                    </ul>
                    
                </li>
            </ul>

        </div>
        <div class="span9">
            <div class="row-fluid">
                <?php $this->load->view($view, $content = 0); ?>
            </div>
            <div class="row-fluid text-center">
                    <?php 
                    if (isset($pages)) {
                        echo $pages;
                    }
                    ?>
            </div>
        </div>
    </div>
