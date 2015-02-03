<div class="form2">
<?php echo form_open(base_url().'index.php/login/')?>
<div class="formtitle">Login to your account</div>
<div class="error">
<?php echo validation_errors(); ?>
</div>
<span class="error"><b><?php echo $login_failed; ?></b></span>

<div class="inputtextbox">
<div class="inputtext">Username Or Email: </div>
<div>
<input type="text" name="username" value="<?php echo set_value('username'); ?>"/>

</div>
</div>

<div class="inputtextbox">
<div class="inputtext">Password: </div>
<div>
<div >
<input type="password" name="password" value="<?php echo set_value('password'); ?>" /><br/>
</div>
</div>
</div>

<div>
<input type="submit" class="orangebutton orangebuttonhover" value="Submit" name="submit_login"/>
</div>

<?php echo form_close()?>
</div>