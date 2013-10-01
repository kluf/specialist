<div class='thumbnail wide'>
          <img alt='160x120' data-src='holder.js/160x120' src="/img/kafedra/<?php echo $content['kafedra']['pic'];?>">
          <p><strong>Назва кафедри:</strong> <?=$content['kafedra']['kname'];?></p>
          <p><strong>Назва факультету:</strong> <?=$content['kafedra']['fname'];?></p>
          <p><strong>Детальний опис:</strong> <?=nl2br($content['kafedra']['description']);?></p>
          <div class="forDelUpd">
            <a class='btn btn-warning' type='button' href='/index.php/kafedra_controller/updateKafedraView/<?=$content["kafedra"]["id"];?>/'>Редагувати </a>
            <form  method='POST' action='/index.php/kafedra_controller/removeKafedra/'><input type='hidden' name='id' value = '<?=$content["kafedra"]["id"];?>'><button class='btn btn-danger' type='submit'>Видалити </button></form>
          </div>
</div>

