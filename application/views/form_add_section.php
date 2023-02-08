<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Class Sections Management Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Class Sections </li>
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
                <h3 class="card-title">Management of Class Sections</h3>
            </div>
            <?= form_open('management/section_add') ?>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3 form-group">

                        <label>Course Code</label>
                        <select name="course_code" class="form-control" required>
                            <?php foreach ($courses as $rows) { ?>
                                <option value="<?= $rows->course_code ?>"><?= $rows->course_code ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-md-3 form-group">

                        <label>Semester Code</label>
                        <select name="semester_code" class="form-control" required>
                            <?php foreach ($semesters as $rows) { ?>
                                <option value="<?= $rows->semester_code ?>"><?= $rows->semester_code ?></option>
                            <?php } ?>
                        </select>

                    </div>
                    <div class="col-md-1 form-group">

                        <label>Section</label>
                        <select name="section" class="form-control" required>
                            <option value="I">I</option>
                            <option value="II">II</option>
                            <option value="III">III</option>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('section') ?></label>
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
            <h3 class="card-title">List of Courses Section</h3>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped nowrap text-center" id="example1">
                <thead>

                    <tr>
                        <th>No.</th>
                        <th>Section Code</th>
                        <th>Course Code</th>
                        <th>Section</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($sections as $row) {  ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row->section_code; ?></td>
                            <td><?= $row->course_code; ?></td>
                            <td><?= $row->section; ?></td>
                            <td><?= $row->semester_code; ?></td>
                            <td>

                                <a class="btn btn-primary btn-sm" href="<?= base_url('management/class/'). $row->section_code ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    View Subjects
                                </a>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit-<?php echo $row->section_code ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                            </td>


                            <!-- /.modal-edit -->
                            <div class="modal fade" id="modal-edit-<?php echo $row->section_code ?>">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content form-group">
                                        <div class="modal-header">
                                            <h4 class="modal-title">College Code Management:</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <?= form_open_multipart("Management/section_update/" . $row->section_code) ?>
                                        <div class="modal-body">

                                            <div class="row ">

                                                <div class="col">

                                                    <label for="inputName">College Code:</label>
                                                    <input type="text" name="college_code_edit" class="form-control" value="<?php echo $row->section_code ?>" readonly>
                                                    <label class="text-danger" style="font-size:13px;"> <?php echo form_error('instructor_id') ?></label>

                                                </div>
                                            </div>
                                            <div class="row">


                                                <div class="col">

                                                    <label for="inputName">College Description:</label>
                                                    <input type="text" name="college_desc_edit" class="form-control" value="<?php echo $row->college_description ?>" required>
                                                    <label class="text-danger" style="font-size:13px;"> <?php echo form_error('college_desc_edit') ?></label>

                                                </div>
                                            </div>

                                            <div class="row ">
                                                <div class="col">
                                                    <input type="submit" class="btn btn-success" value="UPDATE"></input>
                                                    <!-- <input type="button" class="btn btn-danger" value="DELETE"></input> -->
                                                    <a href="<?= base_url('management/college_delete/' . $row->college_code) ?>"><input type="button" class="btn btn-danger" onclick="return  confirm('Are you sure to proceed remove College Code:  ' + '<?php echo $row->college_code ?>')" value="Delete"></button></a>


                                                </div>
                                                <div class="col">

                                                </div>
                                            </div>


                                        </div>


                                        <?= form_close() ?>

                                    </div>

                                </div>
                                <!-- /.modal-content -->
                            </div>
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