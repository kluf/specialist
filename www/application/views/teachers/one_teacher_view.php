<?php 
echo "<div class='thumbnail wide'>
		  <img alt='160x120' data-src='holder.js/160x120' style='width: 160px; height:120px;' src='/img/teacher/".$teacher['img']."'>
		  <div class='caption'>
                        <p>{$teacher['surname']}</p><p>{$teacher['name']}</p><p>{$teacher['patronimic']}</p>
			<h6><strong>Посада: </strong>".$teacher['posada']."</h6>
                        <h6><strong>№ паспорта: </strong>".$teacher['passport']."</h6>
                        <h6><strong>Телефон: </strong>".$teacher['mobPhn']."</h6>
                        <h6><strong>Друге прізвище(якщо є): </strong>".$teacher['surname2']."</h6>
                        <h6><strong>№ телефону 2(якщо є): </strong>".$teacher['mobPhn2']."</h6>
                        <div class='forDelUpd'>
                            <a class='btn btn-warning' type='button' href='/index.php/teacher_controller/updateTeacherView/{$teacher['id']}/'>Редагувати </a>
                            <form  method='POST' action='/index.php/teacher_controller/removeTeacher/'><input type='hidden' name='id' value = '{$teacher['id']}'><button class='btn btn-danger' type='submit'>Видалити </button></form>
                        </div>
		  </div>
		</div>";
?>