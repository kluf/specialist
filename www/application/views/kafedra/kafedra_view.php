<?php foreach($content as $item): ?>
<?php echo "<div class='thumbnail'>
            <img alt='160x120' data-src='holder.js/160x120' style='width: 160px; height:120px;' src='/img/kafedra/".$item['pic']."'>
		  <div class='caption'>
                        <p><strong>{$item['kname']}</strong></p>
			<a class='btn btn-info' href='/index.php/kafedra_controller/getKafedraById/{$item['id']}'>Детальні дані</a>
		  </div>
		</div>";
?>
<?php endforeach; ?>
<?php echo $pages;?>