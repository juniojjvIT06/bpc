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
                                        <th>Instructor ID</th>
                                        <th>Name</th>
                                        <th>Professional Number</th>
                                        <th>Specialities</th>
                                        <th>Employment Status</th>
                                        <th>Specialty</th>
                                        <th>Actions</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($instructors as $rows) { ?>
                                        <tr>
                                            <td> <?= $rows->instructors_id ?> </td>
                                            <td> <?= $rows->lastname ?> , <?= $rows->salutation ?>. <?= $rows->firstname ?> <?= $rows->middlename ?> </td>
                                            <td> <?= $rows->professional_no ?> </td>
                                            <td>
                                                <?php
                                                $specialities = $this->Instructor_model->show_instructor_specialty($rows->instructors_id);

                                                foreach ($specialities as $row) { ?>
                                                    <span class="badge badge-info"> <?= $row->subject_code ?></span>
                                                <?php } ?>
                                            </td>
                                            <td><span class="badge badge-success"><?= $rows->employment_status ?></td>
                                            <td>
                                                <a href="<?php echo base_url('instructors/specialty/') . $rows->instructors_id ?>" class="btn btn-app bg-info">
                                                    <i class="fas fa-users"></i> Manage Specialty
                                                </a>
                                            </td>
                                            <td class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm" href="#">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View Assign Classes
                                                </a>
                                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit-<?php echo $rows->instructors_id ?>">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>

                                                <a href="<?= base_url('instructors/instructor_delete/' .  $rows->instructors_id) ?>"><input type="button" class="btn btn-danger btn-sm" onclick="return  confirm('Are you sure to proceed remove Instructor:  ' + '<?= $rows->lastname ?> , <?= $rows->salutation ?>. <?= $rows->firstname ?> <?= $rows->middlename ?>')" value="Delete">

                                                    </button></a>

                                            </td>

                                        </tr>

                                        <!-- /.modal-content -->


                        </div>
                    </div>

                    <!-- /.modal-edit -->
                    <div class="modal fade" id="modal-edit-<?php echo $rows->instructors_id ?>">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update details below:</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?= form_open_multipart("Instructors/update_instructor/" . $rows->instructors_id) ?>
                                <div class="modal-body">

                                    <div class="row ">

                                        <div class="col">

                                            <label for="inputName">Intructor ID:</label>
                                            <input type="text" name="instructor_id" class="form-control" value="<?php echo $rows->instructors_id ?>" readonly>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('instructor_id') ?></label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">

                                            <label for="inputName">Salutation:</label>
                                            <select name="salutation" class="form-control" required>
                                                <option value="<?php echo $rows->salutation ?>"><?php echo $rows->salutation ?></option>
                                                <option value="MR">Mr.</option>
                                                <option value="MS">Ms.</option>
                                                <option value="DR">Dr.</option>
                                            </select>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('salutation') ?></label>

                                        </div>
                                        <div class="col">

                                            <label for="inputName">Lastname:</label>
                                            <input type="text" name="lastname" class="form-control" value="<?php echo $rows->lastname ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('lastname') ?></label>

                                        </div>
                                        <div class="col">

                                            <label for="inputName">Firstname:</label>
                                            <input type="text" name="firstname" class="form-control" value="<?php echo $rows->firstname ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('par_no') ?></label>

                                        </div>

                                        <div class="col">

                                            <label for="inputName">Middlename:</label>
                                            <input type="text" name="middlename" class="form-control" value="<?php echo $rows->middlename ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('middlename') ?></label>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">

                                            <label for="inputName">Barangay:</label>
                                            <input type="text" name="barangay" class="form-control" value="<?php echo $rows->barangay ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('barangay') ?></label>

                                        </div>

                                        <div class="col">

                                            <label for="inputName">Town:</label>
                                            <input type="text" name="town" class="form-control" value="<?php echo $rows->town ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('town') ?></label>

                                        </div>

                                        <div class="col">

                                            <label for="inputName">Province:</label>
                                            <input type="text" name="province" class="form-control" value="<?php echo $rows->province ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('province') ?></label>

                                        </div>

                                        <div class="col">

                                            <label for="inputName">Sex:</label>
                                            <select name="sex" class="form-control" required>
                                                <option value="<?php echo $rows->sex ?>"><?php echo $rows->sex ?></option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('sex') ?></label>

                                        </div>
                                        <div class="col">
                                            <label>Date of birth</label>
                                            <input type="date" name="date_of_birth" class="form-control" value="<?php echo $rows->date_of_birth ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('date_of_birth') ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">

                                            <label for="inputMessage">College Assign:</label>
                                            <select name="college_assign" class="form-control" required>
                                                <option value="<?php echo $rows->college_code ?>"><?php echo $rows->college_code ?></option>
                                                <?php foreach ($colleges as $row) { ?>
                                                    <option value="<?= $row->college_code  ?>"><?= $row->college_code ?></option>
                                                <?php } ?>
                                            </select>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('department_ass') ?></label>

                                        </div>
                                        <div class="col">

                                            <label>Profession Number:</label>
                                            <input type="text" name="professional_no" class="form-control" value="<?php echo $rows->professional_no ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('professional_no') ?></label>
                                        </div>
                                        <div class="col">
                                            <label>Hired Date</label>
                                            <input type="date" name="date_hired" class="form-control" value="<?php echo $rows->date_hired ?>" required>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('date_hired') ?></label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">

                                            <label>Nature of Appointment</label>
                                            <select name="appointment_nature" class="form-control" required>
                                                <option value="<?php echo $rows->appointment_nature ?>"><?php echo $rows->appointment_nature ?></option>
                                                <option value="Temporary">Temporary</option>
                                                <option value="Permanent">Permanent</option>
                                            </select>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('appointment_nature') ?></label>

                                        </div>
                                        <div class="col">

                                            <label>Employment Status</label>
                                            <select name="employment_status" class="form-control" required>
                                                <option value="<?php echo $rows->employment_status ?>"><?php echo $rows->employment_status ?></option>
                                                <option value="part_time">Part-time</option>
                                                <option value="full_time">Full-time</option>
                                            </select>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('employment_status') ?></label>

                                        </div>
                                        <div class="col">
                                            <label>Profile Picture</label>
                                            <input type="file" class="form-control" name="pp_image">
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('pp_image') ?></label>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="submit" class="btn btn-success" value="UPDATE"></input>
                                        </div>
                                    </div>
                                    <?= form_close() ?>

                                </div>

                            </div>
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