<?php
$page = 1;
if(!isset($_GET['id'])){
  header("Location: index.php");
}

include('component/header.php') ?>



<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('component/topbar.php') ?>

  <?php include('component/sidebar.php') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('container/component-view.php') ?>
  </div>
  <!-- /.content-wrapper -->



  <?php include('component/footer.php') ?>
