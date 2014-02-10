<h2>Post List</h2>
<ul class="list">
  <?php foreach($posts as $post) :?>
  <li class="item">
    <h3>
      <a href="./<?php echo $post['pid']; ?>">
        <?php echo $post['title'] ?>
      </a>
    </h3>
    <small>
      <?php echo $post['author']; ?>
    </small>  
    <div class="content">
      <?php echo $post['content']; ?>
    </div>
  </li>
  <?php endforeach ?>
</ul>
