<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/fontawesome-free/css/all.min.css">
<!-- SweetAlert2 -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<!-- Toastr -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/toastr/toastr.min.css">
<!-- Theme style -->
<link rel="stylesheet" href=".<?php echo base_url(); ?>dist/css/adminlte.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List of Instructors</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Instructors </li>
                    </ol>
                </div><!-- /.col -->
        </div><!-- /.row -->
            <?php if ($alert = $this->session->flashdata('success')) : ?>
                <div class="row-group">
                    <div class="alert alert-dismissible alert-success">
                        <?= $alert ?>
                        <?php unset($_SESSION['success']); ?>
                    </div>
                </div>
            <?php elseif ($alert = $this->session->flashdata('error')) : ?>
                <div class="row-group">
                    <div class="alert alert-dismissible alert-danger">
                        <?= $alert ?>
                        <?php unset($_SESSION['error']); ?>
                    </div>
                </div>
            <?php elseif ($alert = $this->session->flashdata('warning')) : ?>
                <div class="row-group">
                    <div class="alert alert-dismissible alert-warning">
                        <?= $alert ?>
                        <?php unset($_SESSION['warning']); ?>
                    </div>
                </div>
            <?php endif ?>
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-2">
                            <table class="table table-head-fixed text-center" id="example1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date of Birth</th>
                                        <th>Department</th>
                                        <th>Employment Status</th>
                                        <th>Action</th>
                                        <th>Deactivate</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($instructors as $rows) { ?>
                                        <tr>
                                            <td> <?= $rows->lastname ?> , <?= $rows->firstname ?>  <?= $rows->middlename ?> </td>
                                            <td> <?= $rows->date_of_birth ?> </td>
                                            <td>  </td>
                                            <td><span class="badge badge-success"><?= $rows->employment_status ?></span></td>
                                            <td><a href="<?php echo base_url('instructors/specialty/'). $rows -> instructors_id ?>"  class="btn btn-warning btn-block"  >Add Specialty</a>
                                            <input type="button" href="#" class="btn btn-info btn-block"  value="Edit Profile"></button></td>
                                            <td><input type="button" href="#" class="btn btn-danger btn-block" value="Deactivate"></button></td>

                                        </tr>

                                                <!-- /.modal-content -->
                                            </div>
                                        </div>

                                    <?php } ?>


                                </tbody>

                            </table>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>
</div>
<!-- /.row -->

<!-- /.col -->
<!-- jQuery -->
<script src="<?= base_url(); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url(); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script> 
<script src="<?= base_url(); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- Page specific script -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        "responsive": true,
        });
    });
</script>