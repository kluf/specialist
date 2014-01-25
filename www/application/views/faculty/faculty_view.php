<?php foreach ($content as $item): ?>
<?php echo
"<div class='row-fluid'>
    <div class='thumbnail'>
    <div class='row-fluid'>
        <div class='span8'>
            <div class='row-fluid thumbnail'>{$item['name']}</div>
            <div class='row-fluid'>{$item['description']}</div>
            <div class='row-fluid thumbnail'>
                <a class='btn btn-warning' type='button' href='/index.php/faculty_controller/updateFacultyView/" . $item['id'] . "/'>Редагувати </a>
                <form  method='POST' action='/index.php/faculty_controller/removeFaculty/'><input type='hidden' name='id' value = '" . $item['id'] . "'><button class='btn btn-danger' type='submit'>Видалити </button></form>
            </div>
        </div>
            <img alt='smth' data-src='holder.js/64x64' class='img-circle span4' src='/img/faculty/".$item['pic']."'>
    </div>"."</div></div>";
?>
<?php endforeach; ?>