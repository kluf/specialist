<div class="row-fluid">
<?php foreach($content as $item): ?>
<?php echo "<div class='span12'>
            <div class='row-fluid'>
            <div class='span8'>
                <div class='row-fluid'>{$item['name']}</div>
                <div class='row-fluid'>{$item['description']}</div>
                <div class='row-fluid'>
                    <a class='btn btn-warning' type='button' href='/index.php/faculty_controller/updateFacultyView/".$item['id']."/'>Редагувати </a>
                    <form  method='POST' action='/index.php/faculty_controller/removeFaculty/'><input type='hidden' name='id' value = '".$item['id']."'><button class='btn btn-danger' type='submit'>Видалити </button></form>
                </div>
            </div>
                <div class='span4'><img alt='160x120' data-src='holder.js/160x120' class='img-circle' src='/img/faculty/".$item['pic']."'></div>
            </div>
            </div>";
?>
<?php endforeach; ?>
</div>
