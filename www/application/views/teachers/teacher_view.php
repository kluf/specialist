<div>
<?php 
    $this->load->helper('form');
    echo form_open('/teacher_controller/getTeacherByKafedra/');
    echo form_dropdown('kafedra',$kafedra);
    echo form_submit(array('name' => 'teacher',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Отримати викладачів з кафедри'
));
    echo form_close();
?>
</div>
<?php foreach($teacher as $item): ?>
<?php echo "<div class='thumbnail'>
		  <img alt='160x120' data-src='holder.js/160x120' style='width: 160px; height:120px;' src='/img/teacher/".$item['img']."'>
		  <div class='caption'>
                        <p>{$item['surname']}</p><p>{$item['name']}</p><p>{$item['patronimic']}</p>
			<h6>Посада: ".$item['posada']."</h6>
                        <p><a class='btn btn-info' href='/index.php/teacher_controller/getTeacherById/{$item['id']}'>Детальні дані</a></p>
		  </div>
		</div>";
?>
<?php endforeach; ?>
