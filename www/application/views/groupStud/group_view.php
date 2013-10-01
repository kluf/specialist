<div>
<?php 
    $this->load->helper('form');
    echo form_open(base_url().'groupStud_controller/getGroupStudByKafedra/');
    echo form_dropdown('kafedra',$kafedra);
    echo form_submit(array('name' => 'updateGroup',
                    'type' => 'submit',
                    'class' => 'btn btn-success',
                    'value' => 'Отримати групи з кафедри'
));
    echo form_close();
?>
</div>
<?php foreach($content as $item): ?>
<?php echo "<div class='thumbnail'>
            	  <div class='caption'>
                        <p><strong>{$item['GOSname']}</strong></p>
                        <p><strong>{$item['kname']}</strong></p>
                        <p><strong>{$item['sfname']}</strong></p>
                            <div class='forDelUpd'>
                    <a class='btn btn-warning' type='button' href='/index.php/groupStud_controller/updateGroupStudView/".$item['id']."/'>Редагувати </a>
                    <form  method='POST' action='/index.php/groupStud_controller/removeGroupStud/'><input type='hidden' name='id' value = '".$item['id']."'><button class='btn btn-danger' type='submit'>Видалити </button></form>
                  </div>
		  </div>
		</div>";
?>
<?php endforeach; ?>
<?php if(isset($pages)){
    echo $pages;
    }else{
    unset($pages);
};
?>