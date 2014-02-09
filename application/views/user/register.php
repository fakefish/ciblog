<h2>Register</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('user/register'); ?>
  <input type="text" name="username" placeholder="username">
  <br>
  <input type="text" name="nickname" placeholder="nickname">
  <br>
  <input type="password" name="password">
  <br>
  <input type="password" name="passconf">
  <br>
  <input type="submit" name="submit" value="Register">

</form>

<a href="./login">Login</a>  