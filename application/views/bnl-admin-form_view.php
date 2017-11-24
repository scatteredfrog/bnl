<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('banadmin', $attributes); ?>

<p>
        <label for="bnl_admin_username">User name <span class="required">*</span></label>
        <?php echo form_error('bnl_admin_username'); ?>
        <br /><input id="bnl_admin_username" type="text" name="bnl_admin_username"  value="<?php echo set_value('bnl_admin_username'); ?>"  />
</p>

<p>
        <label for="bnl_admin_password">Password <span class="required">*</span></label>
        <?php echo form_error('bnl_admin_password'); ?>
        <br /><input id="bnl_admin_password" type="password" name="bnl_admin_password"  value="<?php echo set_value('bnl_admin_password'); ?>"  />
</p>


<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>

<?php echo form_close(); ?>
