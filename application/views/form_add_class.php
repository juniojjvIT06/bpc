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
            <?= form_open('Management/class_add') ?>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-2 form-group">

                        <label>Class Code</label>
                        <input type="text" class="form-control" name="class_code" value="<?php echo set_value('class_code') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('class_code') ?></label>

                    </div>

                    <div class="col-md-3 form-group">

                        <label>Course Code</label>
                        <select name="course_code" class="form-control" required>
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
                                <option value="<?= $rows->subject_code ?>"><?= $rows->subject_code ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('subject_code') ?></label>

                    </div>

                    <div class="col-md-2 form-group">

                        <label>Subject Schedule:</label>
                        <select name="schedule_code" class="form-control" required>
                            <?php foreach ($schedules as $rows) { ?>
                                <option value="<?= $rows->schedule_code ?>"><?= $rows->schedule_code ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('schedule_code') ?></label>

                    </div>
                    <div class="col-md-1 form-group">

                        <label>Semester:</label>
                        <select name="semester_code" class="form-control" required>
                            <?php foreach ($semesters as $rows) { ?>
                                <option value="<?= $rows->semester_code ?>"><?= $rows->semester_code ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('course_desc') ?></label>

                    </div>

                </div>
                <div class="row">
                    <div class="col center">
                        <input type="submit" class="btn bg-danger" Value="Generate">
                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>

        <div class="card-header">
            <h3 class="card-title">List of Class Schedules</h3>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped nowrap text-center" id="example1">
                <thead>

                    <tr>
                        <th>No.</th>
                        <th>Class Code</th>
                        <th>Course Code</th>
                        <th>Subject Code</th>
                        <th>Room Assign</th>
                        <th>Day/s</th>
                        <th>Start Time</th>
                        <th>Start End</th>
                        <th>Instructor</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($classes as $row) {  ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row->class_code; ?></td>
                            <td><?= $row->course_code ?></td>
                            <td><?= $row->subject_code ?></td>
                            <td><?php if (!empty($this->Management_model->viewSingleSchedule($row->schedule_code)->room_code)) {
                                    echo $this->Management_model->viewSingleSchedule($row->schedule_code)->room_code;
                                } else {
                                    echo "<span class='badge badge-warning'>Not assigned/remove</span>";
                                } ?> </td>
                            <td><?php if (!$row->schedule_code) {
                                    echo $this->Management_model->viewSingleSchedule($row->schedule_code)->day;
                                } else {
                                    echo "<span class='badge badge-warning'>Not assigned/remove</span>";
                                } ?></td>
                            <td><?php if (!$row->schedule_code) {
                                    echo $this->Management_model->viewSingleSchedule($row->schedule_code)->start_time;
                                } else {
                                    echo "<span class='badge badge-warning'>Not assigned/remove</span>";
                                } ?> </td>
                            <td><?php if (!$row->schedule_code) {
                                    echo $this->Management_model->viewSingleSchedule($row->schedule_code)->end_time;
                                } else {
                                    echo "<span class='badge badge-warning'>Not assigned/remove</span>";
                                } ?> </td>
                            <td><?php if (!$row->instructors_id) {
                                    echo $this->Management_model->viewSingleInstructor($row->instructors_id)->lastname; ?>, <?= $this->Management_model->viewSingleInstructor($row->instructors_id)->firstname; ?><?= $this->Management_model->viewSingleInstructor($row->instructors_id)->middlename;
                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                    echo "<span class='badge badge-warning'>Not assigned/remove</span>";
                                                                                                                                                                                                                } ?>

                            <td>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit-<?php echo str_replace(" ", "", $row->class_code) ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                            </td>

                        </tr>
                        <!-- /.modal-edit -->
                        <div class="modal fade" id="modal-edit-<?php echo str_replace(" ", "", $row->class_code) ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content form-group">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Class Management:</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open_multipart("management/class_schedule_update/" . $row->class_code) ?>
                                    <div class="modal-body">

                                        <div class="row ">

                                            <div class="col">

                                                <label for="inputName">Class Code:</label>
                                                <input type="text" name="class_code_edit" class="form-control" value="<?php echo $row->class_code ?>" readonly>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('semester_id_edit') ?></label>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">

                                                <label>Course Code</label>
                                                <select name="course_code_edit" class="form-control" required>
                                                    <option value="<?= $row->course_code ?>"><?= $row->course_code ?></option>
                                                    <?php foreach ($courses as $rows) { ?>
                                                        <option value="<?= $rows->course_code ?>"><?= $rows->course_code ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('course_code_edit') ?></label>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">

                                                <label>Subject Code:</label>
                                                <select name="subject_code_edit" class="form-control" required>
                                                    <option value="<?= $row->subject_code ?>"><?= $row->subject_code ?></option>
                                                    <?php foreach ($subjects as $rows) { ?>
                                                        <option value="<?= $rows->subject_code ?>"><?= $rows->subject_code ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('subject_code_edit') ?></label>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">

                                                <label>Schedule Code:</label>
                                                <select name="schedule_code_edit" class="form-control" required>
                                                    <?php  if (empty($this->Management_model->viewSchedules())){?> 
                                                        <option value="" class='badge badge-danger'>Please Add Schedule at Schedule Management Section</option>
                                                        <?php } else {?>
                                                    <option value="<?= $row->schedule_code ?>"><?= $row->schedule_code ?></option>
                                                    <?php foreach ($schedules as $rows) { ?>
                                                        <option value="<?= $rows->schedule_code ?>"><?= $rows->schedule_code ?></option>
                                                    <?php }} ?>
                                                </select>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('schedule_code_edit') ?></label>

                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">

                                                <label>Semester:</label>
                                                <select name="semester_code_edit" class="form-control" required>
                                                <option value="<?= $row->semester_code ?>"><?= $row->semester_code ?></option>
                                                    <?php foreach ($semesters as $rows) { ?>
                                                        <option value="<?= $rows->semester_code ?>"><?= $rows->semester_code ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('semester_code_edit') ?></label>


                                            </div>

                                        </div>

                                        <div class="row ">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success" value="UPDATE"></input>
                                                <!-- <input type="button" class="btn btn-danger" value="DELETE"></input> -->
                                                <a href="<?= base_url('management/class_schedule_delete/') . str_replace(" ", "", $row->class_code) ?>"><input type="button" class="btn btn-danger" onclick="return  confirm('Are you sure to proceed remove Class Code:  ' + '<?php echo $row->class_code ?>')" value="Delete"></button></a>


                                            </div>
                                            <div class="col">

                                            </div>
                                        </div>


                                    </div>


                                    <?= form_close() ?>

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
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>