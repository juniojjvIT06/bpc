<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Classes Management Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Class </li>
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
                <h3 class="card-title">Management of Classes</h3>
            </div>
            <?= form_open('management/class_add') ?>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3 form-group">

                        <label>Class Code</label>
                        <input type="text" class="form-control" name="class_code" value="<?php echo set_value('class_code') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('class_code') ?></label>

                    </div>
                    <script>
                        function updateSelection() {
                            var select = document.getElementById("course_select");
                            var selectedValue = select.options[select.selectedIndex].value;
                            <?php $this->session->set_userdata('selectedValue', 'selectedValue'); ?>
                        }
                    </script>
                    <div class="col-md-3 form-group">

                        <label>Course Code</label>
                        <select name="course_code" class="form-control" id="course_select" required>
                            <?php foreach ($courses as $rows) { ?>
                                <option value="<?= $rows->course_code ?>"><?= $rows->course_description ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('course_code') ?></label>

                    </div>

                    <div class="col-md-3 form-group">

                        <label>Subject Code</label>
                        <select name="subject_code" class="form-control" id="subject_select" required>
                            <?php foreach ($subjects as $rows) { ?>
                                <option value="<?= $rows->subject_code ?>"><?= $rows->subject_description ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('subject_code') ?></label>

                    </div>

                    <div class="col-md-3 form-group">

                        <label>Subject Schedule:</label>
                        <select name="schedule_code" class="form-control" required>
                            <?php foreach ($schedules as $rows) { ?>
                                <option value="<?= $rows->schedule_code ?>"><?= $rows->schedule_code ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('schedule_code') ?></label>

                    </div>
                    <div class="col-md-3 form-group">

                        <label>Semester:</label>
                        <select name="semester_code" class="form-control" required>
                            <?php foreach ($semesters as $rows) { ?>
                                <option value="<?= $rows->semester_code ?>"><?= $rows->semester_code ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('course_desc') ?></label>

                    </div>

                    <?php $instructors = $this->Instructor_model->get_instructors_within_subject_specialty($this->session->userdata('selectedValue')); ?>

                    <div class="col-md-3 form-group">

                        <label>Assign Instructor:</label>
                        <select name="instructor_code" class="form-control" required>

                            <?php
                    
                            foreach ($instructors as $rows) { ?>
                                <option value="<?= $rows->instructors_id ?>"><?= $rows->lastname ?> , <?= $rows->firstname ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('course_desc') ?></label>

                    </div>

                    <div class="col-md-1 ">
                        <p></p>
                        <input type="submit" class="btn btn-app bg-info" value="Add">


                    </div>

                </div>
            </div>
            <?= form_close() ?>
        </div>

        <div class="card-header">
            <h3 class="card-title">List of Schedule</h3>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped nowrap text-center" id="example1">
                <thead>

                    <tr>
                        <th>No.</th>
                        <th>Schedule Code</th>
                        <th>Day/s</th>
                        <th>Room Assign</th>
                        <th>From</th>
                        <th>To</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($schedules as $row) {  ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row->schedule_code; ?></td>
                            <td><?= $row->day; ?></td>
                            <td><?= $this->Management_model->viewSingleRoom($row->room_code)->room_description; ?></td>
                            <td><?= $row->start_time; ?></td>
                            <td><?= $row->end_time; ?></td>
                        <?php $i++;
                    } ?>
                        </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
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

<!-- Page specific script -->

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