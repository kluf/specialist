<?php $i = 0;?>
<?php foreach($content as $item): ?>
<?php
    if ($i == 0) {
        echo '<div class="row-fluid">';
    }
?>
<?php echo
"<div class='span4'>
    <div class='thumbnail'>
        <div class='row text-center'>
            <img alt='160x120' data-src='holder.js/160x120' style='width: 160px; height:120px;' src='/img/student/".$item['img']."'>
        </div>
        <div class='row text-center'>{$item['surn']}</div>
        <div class='row text-center'>{$item['name']}</div>
        <div class='row text-center'>{$item['patronimic']}</div>
        <div class='row text-center'>№ залікової: {$item['zalikova']}</div>
        <div class='row text-center'>
                <a class='btn btn-info' href='/index.php/student_controller/getStudentById/{$item['id']}'>Детальні дані</a>
        </div>"
."</div></div>";
$i++;
?>
<?php
    if ($i == 3) {
        echo '</div>';
        $i = 0;
    }
?>
<?php  endforeach; ?>
