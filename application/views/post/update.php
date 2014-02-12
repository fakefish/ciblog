<h2>Edit A Article</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('post/update/'.$post->pid); ?>
  <input type="text" name="title" placeholder="title" value="<?php echo $post->title; ?>">
  <br>
  <textarea name="content" cols="30" rows="10"><?php echo $post->content; ?></textarea>
  <br>
  <input type="text" name="catetory" placeholder="catetory" value="<?php echo $post->catetory; ?>">
  <br>
  <input type="text" name="tag" placeholder="tag" value="<?php echo $post->tag; ?>">
  <br>
  <select name="type" id="">
    <option value="1">Draft</option>
    <option value="2">Release</option>
  </select>
  <br>
  <input type="submit" value="Done">

</form>