<h2>Register</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('user/create'); ?>
  <input type="text" name="username" placeholder="username">
  <br>
  <input type="password" name="password">
  <br>
  <input type="submit" name="submit" value="Register">

</form>

<a href="user/login">Login</a>  