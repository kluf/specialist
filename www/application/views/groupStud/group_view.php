<div class='row-fluid'>
    <div class='thumbnail'>
        <?php
        $this->load->helper('form');
        $selAttr = 'class="span6"';
        echo form_open(base_url() . 'groupStud_controller/getGroupStudByKafedra/');
        echo form_dropdown('kafedra', $kafedra,'some', $selAttr);
        echo form_submit(array('name' => 'updateGroup',
            'type' => 'submit',
            'class' => 'btn btn-success span6',
            'value' => 'Отримати групи з кафедри'
        ));
        echo form_close();
        ?> 
    </div>
</div>
<?php $i = 0;?>
<?php foreach ($content as $item): ?>
<?php
    if ($i == 0) {
        echo '<div class="row-fluid">';
    }
?>
    <?php echo "<div class='span4'>
                <div class='thumbnail'>
            	  <div class='caption'>
                        <p><strong>{$item['GOSname']}</strong></p>
                        <p><strong>{$item['kname']}</strong></p>
                        <p><strong>{$item['sfname']}</strong></p>
                            <div class='forDelUpd'>
                    <a class='btn btn-warning' type='button' href='/index.php/groupStud_controller/updateGroupStudView/" . $item['id'] . "/'>Редагувати </a>
                    <form  method='POST' action='/index.php/groupStud_controller/removeGroupStud/'><input type='hidden' name='id' value = '" . $item['id'] . "'><button class='btn btn-danger' type='submit'>Видалити </button></form>
                  </div>
		  </div></div>
		</div>";
$i++;
?>
<?php
    if ($i == 3) {
        echo '</div>';
        $i = 0;
    }
?>
<?php endforeach; ?>