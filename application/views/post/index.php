<h2>Post List</h2>
<ul class="list">
  
  <?php foreach($posts as $post) :?>
  <li class="item">
    <h3>
      <a href="./view/<?php echo $post->pid; ?>">
        <?php echo $post->title ?>
      </a>
    </h3>
    <small>
      <?php echo $post->nickname; ?>
    </small>  
    <div class="content">
      <?php echo $post->content; ?>
    </div>
  </li>
  <?php endforeach ?>
</ul>
<nav>
  <?php 
  for ($i=0; $i <= intval($total_rows/5); $i++) { 
    if($i == $current_page) {
      echo "<a class='current'>".($i+1)."</a>";
    } elseif($i==0) {
      echo "<a href='".page_url()."'>1</a>";
    } else {
      echo "<a href='".page_url('list/'.$i)."'>".($i+1)."</a>";
    }
    
  }
  ?>
</nav>