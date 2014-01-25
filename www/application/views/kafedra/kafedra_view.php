<?php $i = 0;?>
<?php foreach($content as $item): ?>
<?php
    if ($i == 0) {
        echo '<div class="row-fluid">';
    }
?>
<?php echo 
"<div class='span6 thumbnail'>
<img alt='160x120' data-src='holder.js/160x120' style='width: 160px; height:120px;' src='/img/kafedra/".$item['pic']."'>
      <div class='caption'>
            <p class='span12'><strong>{$item['kname']}</strong></p>
            <a class='btn btn-info span12' href='/index.php/kafedra_controller/getKafedraById/{$item['id']}'>Детальні дані</a>
      </div>
</div>";
$i++;
?>
<?php
    if ($i == 2) {
        echo '</div>';
        $i = 0;
    }
?>
<?php endforeach; ?>