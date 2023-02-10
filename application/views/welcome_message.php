<link rel="stylesheet" href="<?php echo base_url(); ?>plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
<div class="content-wrapper">

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
		<div class="container-fluid form-group">


			<div class="card card-default m-auto">
				<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-bullhorn"></i>
						Welcome to Bayambang Polytechnic Portal
					</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="callout callout-info">
						<h5>Academic School Year : </h5>

						<h1><?php

							$format = "%Y-%M-%d %H:%i";
							echo mdate($format) ?></h1>
					</div>
				</div>

			</div>
			<!-- /.card-body -->

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