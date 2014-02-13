<!doctype html>
<html lang="zh-cmn-hans">
<head>
  <meta charset="UTF-8">
  <title><?php echo $title ?></title>
</head>
<body>
  <nav>
    <?php if($this->session->userdata('logged_in')): ?>
    <span>Hello <?php echo $this->session->userdata('nickname'); ?></span>
    <?php endif ?>
    <a href="<?php echo page_url(''); ?>">Index</a>
    <?php if(!$this->session->userdata('logged_in')): ?>
    <a href="<?php echo page_url('login'); ?>">Login</a>
    <a href="<?php echo page_url('register'); ?>">Register</a>
    <?php else: ?>
    <a href="<?php echo page_url('write'); ?>">Write</a>
    <a href="<?php echo page_url('logout'); ?>">Logout</a>
    <?php endif ?>
    
  </nav>
