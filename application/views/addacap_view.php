    <?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '','onsubmit' => 'return validate_addacap();');
$submit = array('name' => 'submit', 'id' => 'submit', 'value' => 'SUBMIT'); ?>
<div id="formbox"><?php
echo form_open('addacap', $attributes); ?>
<div class="row"><p>
        <label for="song">SONG: <span class="required">*</span></label>
        <?php echo form_error('song'); ?>
        <input id="song" type="text" name="song" maxlength="255" value="<?php echo set_value('song'); ?>"  />
    </p></div>

<div class="rowText"><p>
        <label for="correct_lyric">CORRECT LYRIC: <span class="required">*</span></label>
        <?php echo form_error('correct_lyric'); ?>
        <textarea id="correct_lyric" rows="5" name="correct_lyric"  value="<?php echo set_value('correct_lyric'); ?>"  ></textarea>
    </p></div>

<div class="rowText"><p>
        <label for="misheard_as">MISHEARD AS: <span class="required">*</span></label>
        <?php echo form_error('misheard_as'); ?>
        <textarea id="misheard_as" rows="5" name="misheard_as"  value="<?php echo set_value('misheard_as'); ?>"  ></textarea>
</p></div>

<div class="row"><p>
        <label for="misheard_by">YOUR NAME OR E-MAIL:</label>
        <?php echo form_error('misheard_by'); ?>
        <input id="misheard_by" type="text" name="misheard_by" maxlength="255" value="<?php echo set_value('misheard_by'); ?>"  />
</p></div>

<div class="row"><p>
	
        <?php echo form_error('anonymous'); ?>
        
        <?php // Change the values/css classes to suit your needs ?>
        <input type="checkbox" id="anonymous" name="anonymous" value="enter_value_here" class="" <?php echo set_checkbox('anonymous', 'enter_value_here'); ?>> 
                   
	<label for="anonymous">CHECK HERE IF YOU WISH TO BE ANONYMOUS</label>
</p></div>
<div class="row"><p>
        <input type="button" id="cancel" value="CANCEL"/>        <?php echo form_submit($submit); ?>
</p></div>
</div>
<?php echo form_close(); ?>
<div id='contribute_box'>
Have a Beach Boys mondegreen to contribute?<br />
<button id='contribute_btn'>I want to contribute!</button>
</div>
<div id="cap_list">
    <?php
    $getCap = $this->addacap_model->getCap();
    foreach($getCap as $capData) {
        echo $capData['song'].' | '.$capData['correct_lyric'].' | '.$capData['misheard_as'].' | '.$capData['misheard_by'].'<br />';        
    }
    ?>
</div>