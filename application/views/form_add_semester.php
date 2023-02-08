<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Semester Management Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Semester </li>
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
                <h3 class="card-title">Management of Semester</h3>
            </div>
            <?= form_open('management/semester_add') ?>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-2 form-group">

                        <label>Semester Code</label>
                        <input type="text" class="form-control" name="semester_code" value="<?php echo set_value('academic_year') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_year') ?></label>

                    </div>
                    <div class="col-md-2 form-group">

                        <label>Year level</label>
                        <select name="year_level" class="form-control" required>
                            <option value="1stYear">1stYear</option>
                            <option value="2ndYear">2ndYear</option>
                            <option value="3rdYear">3rdYear</option>
                            <option value="4thYear">4thYear</option>
                            <option value="5thYear">5thYear</option>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_year') ?></label>

                    </div>
                    <div class="col-md-2 form-group">

                        <label>Semester Term</label>
                        <select name="semester_term" class="form-control" required>
                            <option value="1stSemester">1stSemester</option>
                            <option value="2ndSemester">2ndSemester</option>
                            <option value="3rdSemester">2ndSemester</option>

                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_year') ?></label>

                    </div>
                    <div class="col-md-3 form-group">

                        <label>Academic Year</label>
                        <select name="academic_year" class="form-control" required>
                            <?php foreach ($academics as $rows) { ?>
                                <option value="<?= $rows->academic_id ?>"><?= $rows->academic_year ?></option>
                            <?php } ?>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_year') ?></label>

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
            <h3 class="card-title">List of Semesters</h3>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped nowrap text-center" id="example1">
                <thead>

                    <tr>
                        <th>No.</th>
                        <th>Semester Code</th>
                        <th>Year Level</th>
                        <th>Semester Term</th>
                        <th>Academic Year</th>

                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
                    foreach ($semesters as $row) {  ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row->semester_code; ?></td>
                            <td><?= $row->year_level; ?></td>
                            <td><?= $row->semester_term ?></td>
                            <td><?= $this->Management_model->viewSingleAcademic($row->academic_id)->academic_year; ?></td>
                            <td>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit-<?php echo str_replace(" ", "", $row->semester_code) ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                            </td>

                        </tr>
                        <!-- /.modal-edit -->
                        <div class="modal fade" id="modal-edit-<?php echo str_replace(" ", "", $row->semester_code) ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content form-group">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Academic Year Management:</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open_multipart("management/semester_update/" . $row->semester_code) ?>
                                    <div class="modal-body">

                                        <div class="row ">

                                            <div class="col">

                                                <label for="inputName">Academic Id:</label>
                                                <input type="text" name="semester_id_edit" class="form-control" value="<?php echo $row->semester_code ?>" readonly>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('semester_id_edit') ?></label>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">


                                                <label>Year level</label>
                                                <select name="year_level_edit" class="form-control" required>
                                                    <option value="<?= $row->year_level ?>"><?= $row->year_level ?></option>
                                                    <option value="1stYear">1stYear</option>
                                                    <option value="2ndYear">2ndYear</option>
                                                    <option value="3rdYear">3rdYear</option>
                                                    <option value="4thYear">4thYear</option>
                                                    <option value="5thYear">5thYear</option>
                                                </select>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('year_level_edit') ?></label>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">

                                                <label>Semester Term</label>
                                                <select name="semester_term_edit" class="form-control" required>
                                                    <option value="<?= $row->semester_term ?>"><?=  $row->semester_term ?></option>
                                                    <option value="1stSemester">1stSemester</option>
                                                    <option value="2ndSemester">2ndSemester</option>
                                                    <option value="3rdSemester">2ndSemester</option>

                                                </select>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_year') ?></label>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">

                                                <label>Academic Year</label>
                                                <select name="academic_year_edit" class="form-control" required>
                                                    <option value="<?= $row->academic_id ?>"><?= $this->Management_model->viewSingleAcademic($row->academic_id)->academic_year; ?></option>
                                                    <?php foreach ($academics as $rows) { ?>
                                                        <option value="<?= $rows->academic_id ?>"><?= $rows->academic_year ?></option>
                                                    <?php } ?>
                                                </select>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_year_edit') ?></label>

                                            </div>
                                        </div>
                                        <div class="row ">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success" value="UPDATE"></input>
                                                <!-- <input type="button" class="btn btn-danger" value="DELETE"></input> -->
                                                <a href="<?= base_url('management/semester_delete/') . str_replace(" ", "", $row->semester_code) ?>"><input type="button" class="btn btn-danger" onclick="return  confirm('Are you sure to proceed remove Academic Year:  ' + '<?php echo $row->semester_code ?>')" value="Delete"></button></a>


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