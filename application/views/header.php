<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" sizes="60x60" href="<?= base_url(); ?>vphotos/icto+logo.png">
  <title>Bayambang Polytechnic College | College Portal </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="<?= base_url(); ?>dist/css/adminlte.min.css?v=3.2.0">
</head>



<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Main Sidebar Container -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url('users/home'); ?> " class="nav-link">Home</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <!-- Navbar right -->

        <li>
          <?php if ($this->session->userdata('status') === 'Deactivated') { ?>
            <button type="button" class=" btn btn-block btn-danger btn-lg disabled">Deactivated</button> <?php } ?>
        </li>
        <li>
          <?php if ($this->session->userdata('status') === 'Active') { ?>
            <button type="button" class="float-right btn btn-block btn-success btn-xs">Active</button> <?php } ?>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link float-right"> <?php echo $this->session->userdata('fullname'); ?> </a>
        </li>
        <li class="nav-item">

          <?php if ($this->session->userdata('category') === 'SUPPLIER') { ?>
            <a href="<?php echo base_url('users/supplier_logout'); ?>" class="nav-link float-right"><i class="nav-link fas fa-sign-out-alt">Logout </i> </a>
          <?php } else { ?>
            <a href="<?php echo base_url('users/logout'); ?>" class="nav-link float-right"><i class="nav-link fas fa-sign-out-alt">Logout </i> </a>
          <?php } ?>
        </li>
      </ul>

    </nav>

    <aside class="main-sidebar sidebar-dark-primary">
      <!-- Brand Logo -->
      <a href=" <?php echo base_url(); ?>/index3.html" class="brand-link">
        <center><span class="brand-text font-weight-light text-align-center">Fuel Application System</span></center>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->

              <li class="nav-item menu-open">
                <a href=" <?php echo base_url(); ?>/#" class="nav-link active">
                  <i class="nav-icon fas fa-cog"></i>
                  <p>
                    User Management
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo base_url('users/manage'); ?>" class="nav-link ">
                      <i class="nav-icon fas fa-user-plus"></i>
                      <p>User Role</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('reports/system_logs'); ?>" class="nav-link ">
                      <i class="nav-icon fas fa-user-plus"></i>
                      <p>System Trail</p>
                    </a>
                  </li>
                </ul>
              </li>

          </ul>
        </nav>
      </div>
    </aside>

    <!-- jQuery -->
    <script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>dist/js/demo.js"></script>

    <script>
      $(function() {
        bsCustomFileInput.init();
      });
    </script>