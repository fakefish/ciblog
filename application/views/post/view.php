<h2><?php echo $post->title ;?></h2>
<small>Author: <?php echo $post->nickname; ?></small>
<div class="content" style="padding:20px 0">
  <?php echo $post->content; ?>
</div>
<div class="catetory">
  Catetory: <?php echo $post->catetory; ?>
</div>
<div class="tags">
  Tag: <?php echo $post->tag; ?>
</div>
<a href="../update/<?php echo $post->pid; ?>">Edit This Article</a>
<a href="../delete/<?php echo $post->pid; ?>">Delete</a>