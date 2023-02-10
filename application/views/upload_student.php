<!-- Ion Slider -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Upload Database Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Upload Students</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        &nbsp;
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

        <?= form_open_multipart("students/importStudents") ?>
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header float-right">
                    <h3>
                        Add User

                    </h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <h5><label>Filled-out all the fields.</label></h5>

                    <div class="row ">

                        <div class="col-md-2">
                            <label>Upload Excel File</label>
                            <input type="file" class="form-control" name="students">
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('students') ?></label>


                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-success float-right" value="Upload">
                        </div>
                    </div>
                    <?php form_close() ?>
                </div>
            </div>
    </section>
</div>

<!-- Ion Slider -->
<script src="<?php echo base_url(); ?>plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-slider/bootstrap-slider.min.js"></script>

<script src="<?php echo base_url(); ?>plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<script>
    $(function() {
        /* BOOTSTRAP SLIDER */
        $('.slider').bootstrapSlider()


        $('#range_6').ionRangeSlider({
            min: 0,
            max: 100,
            from: 0,
            type: 'single',
            step: 1,
            postfix: '',
            prettify: false,
            hasGrid: true
        })


    })
</script>