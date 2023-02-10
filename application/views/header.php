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
          <a href="<?php echo base_url('welcome/'); ?> " class="nav-link">Home</a>
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
          <a href="#" class="nav-link float-right"> <?php echo $this->session->userdata('code_id'); ?> </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('users/logout'); ?>" class="nav-link float-right"><i class="nav-link fas fa-sign-out-alt">Logout </i> </a>
        </li>
      </ul>

    </nav>

    <aside class="main-sidebar sidebar-dark-primary">
      <!-- Brand Logo -->
      <a href="<?= base_url('users') ?>" class="brand-link">
        <img src="<?= base_url('./assets/BPC-LOGO.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-heavy">BPC Portal</span>
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
                  Administrator
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('users/dashboard'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>Dashboard</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('instructors/classes'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-chart-pie"></i>
                    <p>Subject Loads</p>
                  </a>
                </li>
              </ul>
            </li>

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
                  <a href="<?php echo base_url('instructors/add'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Add Faculty User</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('students/add'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Add Student</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-open">
              <a href=" <?php echo base_url(); ?>/#" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Instructor Management
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('instructors/list'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-list-ol"></i>
                    <p>List of Instructors</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item menu-open">
              <a href=" <?php echo base_url(); ?>/#" class="nav-link active">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Management Settings
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('subjects/add'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Subject Management</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('management/add'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-chair"></i>
                    <p>College Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('management/room'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-door-open"></i>
                    <p>Rooms Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('management/course'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-plus"></i>
                    <p>Course Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('management/schedule'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>Schedule Management</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('management/academic'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-folder-plus"></i>
                    <p>AcademicYear Managmnt</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('management/semester'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Semester Management</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('management/class'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Class Management</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url('management/section'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Class Management</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('students/upload'); ?>" class="nav-link ">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>Upload</p>
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