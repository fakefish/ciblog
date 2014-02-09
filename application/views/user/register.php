<h2>Register</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('user/register'); ?>
  <input type="text" name="username" placeholder="username" value="<?php echo set_value('username'); ?>">
  <br>
  <input type="text" name="nickname" placeholder="nickname" value="<?php echo set_value('nickname'); ?>">
  <br>
  <input type="password" name="password" placeholder="password" value="<?php echo set_value('password'); ?>">
  <br>
  <input type="password" name="passconf" placeholder="confirm password" value="<?php echo set_value('passconf'); ?>">
  <br>
  <input type="email" name="email" placeholder="email" value="<?php echo set_value('email'); ?>">
  <br>
  <input type="submit" name="submit" value="Register">

</form>

<a href="./login">Login</a>  