<?php foreach($content as $item): ?>
<?php echo "<div class='thumbnail'>
		  <img alt='160x120' data-src='holder.js/160x120' style='width: 160px; height:120px;' src='/img/student/".$item['img']."'>
		  <div class='caption'>
                        <p>{$item['surn']}</p><p>{$item['name']}</p><p>{$item['patronimic']}</p>
			<h6>№ залікової: ".$item['zalikova']."</h6>
                        <p><a class='btn btn-info' href='/index.php/student_controller/getStudentById/{$item['id']}'>Детальні дані</a></p>
		  </div>
		</div>";
?>
<?php endforeach; ?>
<?php echo $pages;?>