<?php
    echo "<div class='alert alert-error'><noscript>Увімкніть JavaScript!</noscript>".validation_errors()."</div>";
    echo "<div class='alert alert-success'><a href='".$_SERVER['HTTP_REFERER']."'>Повернутися назад і виправити</a></div>";
?>