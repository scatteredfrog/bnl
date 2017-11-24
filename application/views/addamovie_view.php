<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('addamovie', $attributes); ?>
        <script src="<?php echo base_url('js/jquery-1.10.1.min.js') ?>" ></script>
        <script src="<?php echo base_url('js/jquery.blockUI.js') ?>" ></script>
        <script src="<?php echo base_url('js/redalert.js') ?>" ></script>

<p>
        <label for="movieThought">What I THOUGHT I knew <span class="required">*</span></label>
        <?php echo form_error('movieThought'); ?>
        <br /><input id="movieThought" type="text" name="movieThought" maxlength="255" value="<?php echo set_value('movieThought'); ?>"  />
</p>

<p>
        <label for="movieLearned">What I learned <span class="required">*</span></label>
        <?php echo form_error('movieLearned'); ?>
        <br /><input id="movieLearned" type="text" name="movieLearned" maxlength="2555" value="<?php echo set_value('movieLearned'); ?>"  />
</p>

<p>
	
        <?php echo form_error('movieWhich'); ?>
        
        <?php // Change the values/css classes to suit your needs ?>
        <br /><input type="checkbox" id="movieSD" name="movieWhich" value="1" class="" <?php echo set_checkbox('movieWhich', 'enter_value_here'); ?>> 
                   
	<label for="movieSD">Summer Dreams</label>
</p> 
<p>
	
        <?php echo form_error('movieWhich'); ?>
        
        <?php // Change the values/css classes to suit your needs ?>
        <br /><input type="checkbox" id="movieAF" name="movieAF" value="2" class="" <?php echo set_checkbox('movieWhich', 'enter_value_here'); ?>> 
                   
	<label for="movieAF">An American Family</label>
        <input type="hidden" id="movieWhich" name="movieWhich" value=""/>
</p> 

<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
<script>
    $(document).ready(function() {
        populateHidden();
        $('[type=checkbox]').each(function() {
            $(this).click(function() {
                populateHidden();
            });
        });
    });
    
    function populateHidden() {
                var total = 0;
                $('[type=checkbox]').each(function() {
                    if ($(this).prop('checked')) {
                        total += parseInt($(this).val());
                    }
                });
                $('[name=movieWhich]').val(total);
    }
</script>