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

                    <div class="col-md-3 form-group">

                        <label>Semester Code</label>
                        <input type="text" class="form-control" name="semester_code" value="<?php echo set_value('academic_year') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('academic_year') ?></label>

                    </div>
                    <div class="col-md-3 form-group">

                        <label>Year level</label>
                        <select name="year_level" class="form-control" required>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                            <option value="5th Year">5th Year</option>
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
                            <td><?= $this->Management_model->viewSingleAcademic($row->academic_id)->academic_year; ?></td>
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