<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Class Schedule Management Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Class Schedule </li>
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

    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Class Schedule Assignment</h3>
            </div>
            <?= form_open('management/class_schedule_add') ?>
            <div class="card-body">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-4 ">
                        <h3 class="text-primary"><i class="fas fa-paint-brush"></i>Class Code: <?= $this->session->userdata('set_section_code') ?></h3>
                        <p class="text-muted">Please check all the details before adding an Intructor to advise this subejct.</p>
                        <br>
                        <div class="text-muted">
                            <p class="text-sm">Subject Description:
                                <b class="d-block"><?= $this->session->userdata('set_subject_code') ?></b>
                            </p>
                            <p class="text-sm">Course Description:
                                <b class="d-block"><?= $this->session->userdata('set_course_code') ?></b>
                            </p>
                            <p class="text-sm">Room and Schedule:
                                <b class="d-block"><?= $this->session->userdata('set_schedule_code') ?></b>
                            </p>
                        </div>

                        <?php $instructors = $this->Instructor_model->get_instructors_within_subject_specialty($this->session->userdata('set_subject_code')); ?>
                        <label>Assign Instructor:
                            <p class="text-muted">Below are the list of Instructors that has specialty for <b></b><?= $this->session->userdata('set_subject_code') ?> . </p>
                        </label>
                        <select name="instructor_code" class="form-control" required>
                            <?php foreach ($instructors as $rows) { ?>
                                <option value="<?= $rows->instructors_id ?>"><?= $rows->lastname ?>, <?= $rows->firstname ?> <?= $rows->middlename ?></option>
                            <?php } ?>
                        </select>

                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-sm btn-success" value="Add">
                            <a href="<?= base_url('Management/class_schedule_cancel') ?>" class="btn btn-sm btn-danger"> CANCEL </a>
                        </div>
                    </div>


                    <div class="col-md-1 ">
                        <p></p>

                    </div>

                </div>
            </div>
            <?= form_close() ?>
        </div>
</div>
</section>

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
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print"]
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