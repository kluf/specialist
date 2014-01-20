<div class="thumbnail">
<?php 
    echo form_open(base_url().'lesson_controller/getLessonByKafedra/');
    echo '<div class="span4">'.form_dropdown('kafedra',$kafedra).'</div>';
    echo '<div class="span4">'.form_submit(array('name' => 'updateGroup',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Отримати предмети з кафедри'
)).'</div>';
    echo form_close();
?>
</div>
<?php foreach($lesson as $item): ?>
<?php echo "<div class='thumbnail'>
            	  <div class='caption'>
                        <p><strong>{$item['name']}</strong></p>
                        <p>{$item['kname']}</p>
                            <div class='forDelUpd'>
                    <a class='btn btn-warning' type='button' href='/index.php/lesson_controller/updateLessonView/".$item['id']."/'>Редагувати </a>
                    <form  method='POST' action='/index.php/lesson_controller/removeLesson/'><input type='hidden' name='id' value = '".$item['id']."'><button class='btn btn-danger' type='submit'>Видалити </button></form>
                  </div>
		  </div>
		</div>";
?>
<?php endforeach; ?>
