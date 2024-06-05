<!-- Ion Slider -->
<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Student Management</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Student / Add Student</li>
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

        <?= form_open_multipart("students/student_add") ?>
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header float-right">
                    <h3>
                        Student Management
                        <input type="submit" class="btn btn-success float-right" value="Add">
                    </h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <h5><label>Filled-out all the fields.</label></h5>

                    <div class="row ">

                        <div class="col-md-2">

                            <label for="inputName">Student ID Number:</label>
                            <input type="text" name="student_code" class="form-control" value="<?php echo $this->Student_model->generate_student_id(); ?>" readonly>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('student_id') ?></label>

                        </div>
                        <div class="col-md-2">

                            <label for="inputName">Lastname:</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo set_value('lastname') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('lastname') ?></label>

                        </div>
                        <div class="col-md-2">

                            <label for="inputName">Firstname:</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo set_value('firstname') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('firstname') ?></label>

                        </div>

                        <div class="col-md-2">

                            <label for="inputName">Middlename:</label>
                            <input type="text" name="middlename" class="form-control" value="<?php echo set_value('middelanme') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('middlename') ?></label>

                        </div>

                        <div class="col-md-2">

                            <label for="inputName">Province:</label>
                            <!-- <input type="selct" name="province" class="form-control" value="<?php echo set_value('province') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('province') ?></label> -->
                            <select id="province" name="province" class="form-control" >

                                <option value=""> Select Province </option>
                                <?php foreach ($provinces as $province): ?>

                                <option value="<?= $province['code'] ?>"> <?= $province['name'] ?> </option>
                                <?php endforeach ?>

                            </select>

                        </div>

                        <div class="col-md-2">

                            <label for="inputName">Town:</label>
                            <select id="town" name="town" class="form-control" >
                            <option value=""> Select Town </option>
                            </select>
                        </div>

                        <script>
                                $(document).ready(function(){
                                    // When the select option changes
                                    $('#province').change(function(){
                                        var province_id = $(this).val(); // Get the selected province id

                                        if(province_id) { // Check if a valid province id is selected
                                            // AJAX request to fetch data from API
                                            $.ajax({
                                                url: '<?php echo base_url('Students/get_municipalities/'); ?>' + province_id,  // Your API endpoint
                                                type: 'GET',  // Use GET since no data is being posted
                                                dataType: 'json',
                                                success: function(response){
                                                    // Clear existing options
                                                    $('#town').empty();
                                                    // Check if the response is not empty and is an array
                                                    if(response && Array.isArray(response)) {
                                                        // Add "Select a town" option
                                                        $('#town').append('<option value="">Select a town</option>');
                                                        // Add new options based on API response
                                                        $.each(response, function(index, town){
                                                            $('#town').append('<option value="' + town.code + '">' + town.name + '</option>');
                                                        });
                                                    } else {
                                                        $('#town').append('<option value="">No towns available</option>');
                                                    }
                                                },
                                                error: function(xhr, status, error){
                                                    console.error('Error: ' + error);
                                                    $('#town').empty();
                                                    $('#town').append('<option value="">Error loading towns</option>');
                                                }
                                            });
                                        } else {
                                            // Clear the town select box if no valid province id is selected
                                            $('#town').empty();
                                            $('#town').append('<option value="">Select a town</option>');
                                        }
                                    });
                                });
                            </script>

                        <div class="col-md-2">

                            <label for="inputName">Barangay:</label>
                            <input type="text" name="barangay" class="form-control" value="<?php echo set_value('barangay') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('barangay') ?></label>

                        </div>


                        <div class="col-md-2">

                            <label for="inputName">Contact Number:</label>
                            <input type="text" name="s_contact" class="form-control" value="<?php echo set_value('s_contact') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('s_contact') ?></label>

                        </div>

                        <div class="col-md-1">

                            <label for="inputName">Sex:</label>
                            <select name="sex" class="form-control" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('sex') ?></label>

                        </div>
                        <div class="col-md-2">
                            <label>Date of birth</label>
                            <input type="date" name="date_of_birth" class="form-control" value="<?php echo set_value('date_of_birth') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('date_of_birth') ?></label>
                        </div>


                        <div class="col-md-2">
                            <label for="inputMessage">Select Course and Section:</label>
                            <select name="course_section" class="form-control" required>
                                <?php foreach ($program_sections as $rows) { ?>
                                    <option value="<?= $rows->section_code ?>"><?= $rows->section_code ?></option>
                                <?php } ?>
                            </select>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('course_section') ?></label>
                        </div>

                        <div class="col-md-2">
                        <label>Date Enrolled</label>
                            <input type="date" name="date_enrolled" class="form-control" value="<?php echo set_value('date_enrolled') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('date_enrolled') ?></label>
                        </div>

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

