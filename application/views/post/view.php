<h2><?php echo $post->title ;?></h2>
<small>Author: <?php echo $post->nickname; ?></small>
<br>
<small>Time: <?php echo unix_to_human($post->time); ?></small>
<div class="content" style="padding:20px 0">
  <?php echo $post->content; ?>
</div>
<div class="catetory">
  Catetory: <?php echo $post->catetory; ?>
</div>
<div class="tags">
  Tag: <?php echo $post->tag; ?>
</div>

<?php if($this->session->userdata('uid') === $post->uid): ?>
<a href="../update/<?php echo $post->pid; ?>">Edit This Article</a>
<a href="../delete/<?php echo $post->pid; ?>">Delete</a>
<?php endif ?>