<?php
echo "<li class='span8 thumbnail'>
    <p><strong>ПІБ: </strong>" . $content['surn'] . ' ' . $content['name'] . ' ' . $content['patronimic'] . "</p>
      <strong>№ залікової: </strong>" . $content['zalikova'] . "<br>" .
 "<strong>Телефон: </strong>" . $content['mobNum'] . "<br>" .
 "<strong>№ паспорту: </strong>" . $content['passport'] . "<br>" .
 "<strong>Група: </strong>" . $content['grp'] . "<br>" .
 "<strong>2-ге прізвище: </strong>" . $content['surn2'] . "<br>" .
 "<strong>№ заліковки(нової): </strong>" . $content['zalik2'] . "<br>
          <div class='forDelUpd'>
            <a class='btn btn-warning' type='button' href='/index.php/student_controller/updateStudentView/{$content['id']}/'>Редагувати </a>
            <form  method='POST' action='/index.php/student_controller/removeStudent/'>
                <input type='hidden' name='idn' value = '{$content['id']}'>
                <button class='btn btn-danger' type='submit'>Видалити</button>
            </form>
    </li>
          <li class='span4 thumbnail'>
          	<img alt='160x120' data-src='holder.js/160x120' src='/img/student/" . $content['img'] . "'>"
        ."</li>";
?>