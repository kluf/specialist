<div class="row-fluid">
    <div class="thumbnail">
<?php
    $selAttr = 'class="span6"';
    echo form_open(base_url().'lesson_controller/getLessonByKafedra/');
    echo form_dropdown('kafedra',$kafedra,'kafedra', $selAttr);
    echo form_submit(array('name' => 'updateGroup',
                    'type' => 'submit',
                    'class' => 'btn btn-success span6',
                    'value' => 'Отримати предмети з кафедри'
));
    echo form_close();
?>
    </div>
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
