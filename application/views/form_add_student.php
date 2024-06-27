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
                    </h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <h5><label>Filled-out all the fields.</label></h5>

                    <div class="row ">

                        <div class="col-md-2">

                            <label >Student ID Number:</label>
                            <input type="text" name="student_code" class="form-control" value="<?php echo $this->Student_model->generate_student_id(); ?>" readonly>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('student_id') ?></label>

                        </div>
                        <div class="col-md-2">

                            <label >Lastname:</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo set_value('lastname') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('lastname') ?></label>

                        </div>
                        <div class="col-md-2">

                            <label >Firstname:</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo set_value('firstname') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('firstname') ?></label>

                        </div>

                        <div class="col-md-2">

                            <label >Middlename:</label>
                            <input type="text" name="middlename" class="form-control" value="<?php echo set_value('middelanme') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('middlename') ?></label>

                        </div>
                        <div class="col-md-2">

                            <label >Extension:</label>
                            <input type="text" name="extension" class="form-control" value="<?php echo set_value('extension') ?>" >
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('extension') ?></label>

                        </div>
                        
                        <div class="col-md-1">

                            <label >Sex:</label>
                            <select name="sex" class="form-control" required>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('sex') ?></label>

                        </div>

                        <div class="col-md-2">

                            <label >Civil Status:</label>
                            <select name="civil_status" class="form-control" required>
                                <option value="">Select Civil Status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="widower">Widower</option>
                                <option value="separated">Separated</option>
                                <option value="solo_parent">Solo Parent</option>
                            </select>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('civil_status') ?></label>

                        </div>

                        <div class="col-md-2">

                            <label >Province:</label>
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

                            <label >Town:</label>
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

                            <label >Barangay:</label>
                            <select id="barangay" name="barangay" class="form-control" >
                            <option value=""> Select Barangay </option>
                            </select>

                        </div>

                        <script>
                                $(document).ready(function(){
                                    // When the select option changes
                                    $('#town').change(function(){
                                        var town_id = $(this).val(); // Get the selected town id

                                        if(town_id) { // Check if a valid town id is selected
                                            // AJAX request to fetch data from API
                                            $.ajax({
                                                url: '<?php echo base_url('Students/get_barangays/'); ?>' + town_id,  // Your API endpoint
                                                type: 'GET',  // Use GET since no data is being posted
                                                dataType: 'json',
                                                success: function(response){
                                                    // Clear existing options
                                                    $('#barangay').empty();
                                                    // Check if the response is not empty and is an array
                                                    if(response && Array.isArray(response)) {
                                                        // Add "Select a town" option
                                                        $('#barangay').append('<option value="">Select a barangay ' + town_id + '</option>');
                                                        // Add new options based on API response
                                                        $.each(response, function(index, barangay){
                                                            $('#barangay').append('<option value=' + barangay.code + '>' + barangay.name + '</option>');
                                                        });
                                                    } else {
                                                        $('#barangay').append('<option value="">No barangays available</option>');
                                                    }
                                                },
                                                error: function(xhr, status, error){
                                                    console.error('Error: ' + error);
                                                    $('#barangay').empty();
                                                    $('#barangay').append('<option value="">Error loading barangays</option>');
                                                }
                                            });
                                        } else {
                                            // Clear the town select box if no valid town id is selected
                                            $('#barangay').empty();
                                            $('#barangay').append('<option value="">Select a barangays</option>' );
                                        }
                                    });
                                });
                            </script>

                        <div class="col-md-2">
                            <label>Date of birth</label>
                            <input type="date" name="date_of_birth" class="form-control" value="<?php echo set_value('date_of_birth') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('date_of_birth') ?></label>
                        </div>

                        <div class="col-md-2">

                        <label >Place of Birth:</label>
                        <input type="text" name="place_of_birth" class="form-control" value="<?php echo set_value('place_of_birth') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('place_of_birth') ?></label>

                        </div>

                        <div class="col-md-2">

                        <label >Religion:</label>
                        <input type="text" name="religion" class="form-control" value="<?php echo set_value('religion') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('religion') ?></label>

                        </div>

                        <div class="col-md-2">

                        <label >Mother Tongue:</label>
                        <input type="text" name="mother_tongue" class="form-control" value="<?php echo set_value('mother_tongue') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('mother_tongue') ?></label>

                        </div>
                        <div class="col-md-2">

                        <label >Citizenship:</label>
                        <input type="text" name="citizenship" class="form-control" value="<?php echo set_value('citizenship') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('citizenship') ?></label>

                        </div>

                        <div class="col-md-2">

                            <label >Contact Number:</label>
                            <input type="text" name="s_contact" class="form-control" value="<?php echo set_value('s_contact') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('s_contact') ?></label>

                        </div>

                        <div class="col-md-2">

                            <label >Email:</label>
                            <input type="email" name="email" class="form-control" value="<?php echo set_value('email') ?>" required>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('email') ?></label>

                        </div>

                        <!-- <div class="col-md-2">
                            <label for="inputMessage">Select Course and Section:</label>
                            <select name="course_section" class="form-control" required>
                                <?php foreach ($program_sections as $rows) { ?>
                                    <option value="<?= $rows->section_code ?>"><?= $rows->section_code ?></option>
                                <?php } ?>
                            </select>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('course_section') ?></label>
                        </div> -->

                    </div>

                </div>

                <div class="card-header float-right">
                    <h3>
                        Family Background
                    </h3>
                </div>

                <div class="card-body">
                    <h5><label>Filled-out all the fields.</label></h5>
                    <div class="row ">

                        <div class="col-md-3">

                        <label >Father Guardian First Name :</label>
                        <input type="text" name="father_firstname" class="form-control" value="<?php echo set_value('father_firstname') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('father_firstname') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Middle Name :</label>
                        <input type="text" name="father_middlename" class="form-control" value="<?php echo set_value('father_middlename') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('father_middlename') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Last Name :</label>
                        <input type="text" name="father_lastname" class="form-control" value="<?php echo set_value('father_lastname') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('father_lastname') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Highes Educational Attainment:</label>
                            <select name="father_educational_attainment" class="form-control" required>
                                <option value="">Select Highest Educational Attainment</option>
                                <option value="elementary_graduate">Elementary Graduate</option>
                                <option value="high_school_graduate">High School Graduate</option>
                                <option value="college_graduate">College Graduate</option>
                                <option value="masters_graduate">Master's Graduate</option>
                                <option value="doctorate_graduate">Doctorate Graduates</option>
                            </select>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('civil_status') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Address :</label>
                        <input type="text" name="father_address" class="form-control" value="<?php echo set_value('father_address') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('father_address') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Contact Number :</label>
                        <input type="text" name="father_contact_number" class="form-control" value="<?php echo set_value('father_contact_number') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('father_contact_number') ?></label>

                        </div>
                    </div>
                        <div class="row ">


                        <div class="col-md-3">

                        <label >Mother First Name :</label>
                        <input type="text" name="mother_firstname" class="form-control" value="<?php echo set_value('mother_firstname') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('mother_firstname') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Middle Name :</label>
                        <input type="text" name="mother_middlename" class="form-control" value="<?php echo set_value('mother_middlename') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('mother_middlename') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Last Name :</label>
                        <input type="text" name="mother_lastname" class="form-control" value="<?php echo set_value('mother_lastname') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('mother_lastname') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Highes Educational Attainment:</label>
                            <select name="mother_educational_attainment" class="form-control" required>
                                <option value="">Select Highest Educational Attainment</option>
                                <option value="elementary_graduate">Elementary Graduate</option>
                                <option value="high_school_graduate">High School Graduate</option>
                                <option value="college_graduate">College Graduate</option>
                                <option value="masters_graduate">Master's Graduate</option>
                                <option value="doctorate_graduate">Doctorate Graduates</option>
                            </select>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('mother_educational_attainment') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Address :</label>
                        <input type="text" name="mother_address" class="form-control" value="<?php echo set_value('mother_address') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('mother_address') ?></label>

                        </div>

                        <div class="col-md-3">

                        <label >Contact Number :</label>
                        <input type="text" name="mother_contact_number" class="form-control" value="<?php echo set_value('mother_contact_number') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('mother_contact_number') ?></label>

                        </div>
                        </div>
                        <div class="row ">
                        <div class="col-md-2">

                        <label >4Ps Beneficiary :</label>
                            <select name="4ps_beneficiary" class="form-control" required>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>

                            </select>
                            <label class="text-danger" style="font-size:13px;"> <?php echo form_error('4ps_beneficiary') ?></label>


                        </div>
                        
                    </div>
                    
                </div>
                <div class="card-header float-right">
                    <h3>
                        Academic Information (Last School Attended)
                    </h3>
                </div>
                <div class="col-md-2">

                        <label >School Name:</label>
                        <input type="text" name="last_school_name" class="form-control" value="<?php echo set_value('last_school_name') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('last_school_name') ?></label>
                </div>
                <div class="col-md-2">

                        <label >School Address:</label>
                        <input type="text" name="last_school_address" class="form-control" value="<?php echo set_value('last_school_name') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('last_school_name') ?></label>
                </div>

                <div class="col-md-2">

                        <label >Honor Received:</label>
                        <input type="text" name="honors_received" class="form-control" value="<?php echo set_value('honors_received') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('honors_received') ?></label>
                </div>

                <div class="col-md-2">

                        <label >Year Graduated:</label>
                        <input type="text" name="year_graduated" class="form-control" value="<?php echo set_value('year_graduated') ?>" required>
                        <label class="text-danger" style="font-size:13px;"> <?php echo form_error('year_graduated') ?></label>
                </div>

                <div class="card-body">
                    <div class="row" >
                    <div class="col-md-2">
                         <input type="submit" class="btn btn-block btn-success btn-lg" value="Add">
                    </div>

                    </div>
                </div>
              
            </div>
            
        </div>
        <?php form_close() ?>
       
    </section>
</div>

<!-- Ion Slider -->
<script src="<?php echo base_url(); ?>plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-slider/bootstrap-slider.min.js"></script>

<script src="<?php echo base_url(); ?>plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

