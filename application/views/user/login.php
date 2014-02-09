<h2>login</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('user/login') ?>
  <input type="text" name="username" placeholder="username" value="<?php echo set_value('username'); ?>">
  <br>
  <input type="password" name="password" value="<?php echo set_value('username'); ?>">
  <br>
  <input type="submit" name="submit" value="Login">

</form>

<a href="./register">register</a>