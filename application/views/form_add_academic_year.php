<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Academic Year Management Section</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"> Academic Year </li>
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
                <h3 class="card-title">Management of Academic Year</h3>
            </div>
            <?= form_open('management/academic_add') ?>
            <div class="card-body">
                <div class="row">

                <script>
                    function updateEndYear() {
                        var startYear = document.getElementById('start_year').value;
                        var endYear = parseInt(startYear) + 1;
                        document.getElementById('end_year_display').innerText = endYear;
                    }
                </script>

                    <div class="col-md-3 form-group">

                        <label>Academic Year</label>
                        <input type="number" class="form-control" id="start_year" name="academic_start_year" value="<?php echo set_value('academic_start_year') ?>" oninput="updateEndYear()" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_start_year') ?></label>

                    </div>

                    <div class="col-md-3 form-group">
                        <label for="end_year">Year To:</label>
                        <span class="form-control" id="end_year_display"><?php echo set_value('start_year') ? set_value('start_year') + 1 : ''; ?></span><br>

                    </div>

                    <div class="col-md-2">

                        <label >Semester:</label>
                        <select name="academic_semester" class="form-control" required>
                            <option value=""></option>
                            <option value="first_semester">First Semester</option>
                            <option value="second_semester">Second Semester</option>
                            <option value="summer">Summer</option>
                        </select>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_semester') ?></label>

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
            <h3 class="card-title">List of Academic Years</h3>
        </div>


        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-striped nowrap text-center" id="example1">
                <thead>

                    <tr>
                        <th>No.</th>
                        <th>Academic Year</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>

                <tbody>

                                        <script>
                                            function updateEndYear2() {
                                                var startYear1 = document.getElementById('start_year_edit').value;
                                                var endYear = parseInt(startYear1) + 1;
                                                document.getElementById('end_year_display_edit').innerText = endYear1;
                                            }
                                        </script>
                    <?php $i = 1;
                    foreach ($academics as $row) {  ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $row->academic_start_year; ?> -  <?= $row->academic_end_year; ?>  </td>
                            <td><?= $row->academic_semester; ?>  </td>
                            <td><?= $row->academic_status; ?>  </td>
                            <td>
                                <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#modal-edit-<?php echo str_replace(" ", "", $row->academic_id) ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                            </td>

                        </tr>
                        <!-- /.modal-edit -->
                        <div class="modal fade" id="modal-edit-<?php echo str_replace(" ", "", $row->academic_id) ?>">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content form-group">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Academic Year Management:</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open_multipart("management/academic_update/" . $row->academic_id) ?>
                                    <div class="modal-body">

                                        <div class="row ">

                                            <div class="col">

                                                <label for="inputName">Academic ID:</label>
                                                <input type="text" name="academic_id_edit" class="form-control" value="<?php echo $row->academic_id ?>" readonly>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_id_edit') ?></label>

                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col">

                                                <label for="inputName">Academic Start Year:</label>
                                                <input type="text" id="start_year_edit" name="academic_start_year_edit" class="form-control" value="<?php echo $row->academic_start_year ?>" readonly>
                                                <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_start_year_edit') ?></label>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">

                                        <label >Semester:</label>
                                            <select name="academic_semester_edit" class="form-control" read>
                                                <option value="first_semester"><?= $row->academic_semester ?></option>
                                                <option value="first_semester">First Semester</option>
                                                <option value="second_semester">Second Semester</option>
                                                <option value="summer">Summer</option>
                                            </select>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_semester_edit') ?></label>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col">

                                                <label for="inputName">Status:</label>
                                                <select name="academic_status_edit" class="form-control" required>
                                                <option value="<?= $row->academic_status ?>"><?= $row->academic_status ?></option>
                                                <option value="closed">closed</option>
                                                <option value="open">open</option>

                                                </select>
                                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_status_edit') ?></label>
                                            </div>

                                        </div>
                                        <div class="row ">
                                            <div class="col">
                                                <input type="submit" class="btn btn-success" value="UPDATE"></input>
                                                <!-- <input type="button" class="btn btn-danger" value="DELETE"></input> -->
                                                <a href="<?= base_url('management/academic_delete/') . str_replace(" ", "", $row->academic_id) ?>"><input type="button" class="btn btn-danger" onclick="return  confirm('Are you sure to proceed remove Academic Year:  ' + '<?php echo $row->academic_start_year ?>')" value="Delete"></button></a>


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