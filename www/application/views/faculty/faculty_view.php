<?php foreach($content as $item): ?>
<?php echo "<div class='thumbnail wide'>
            <img alt='160x120' data-src='holder.js/160x120' class='img-circle' src='/img/faculty/".$item['pic']."'>
		  <div class='caption'>
                    <p><strong>{$item['name']}</strong></p>
                    <p>{$item['description']}</p>
                    <div class='forDelUpd'>
                    <a class='btn btn-warning' type='button' href='/index.php/faculty_controller/updateFacultyView/".$item['id']."/'>Редагувати </a>
                    <form  method='POST' action='/index.php/faculty_controller/removeFaculty/'><input type='hidden' name='id' value = '".$item['id']."'><button class='btn btn-danger' type='submit'>Видалити </button></form>
                  </div>
                </div>
		</div>";
?>
<?php endforeach; ?>
<?php echo $pages;?>