<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- link -->
	<!-- datatable -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
	<!-- css -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!-- endlink -->


	<title>Login</title>
</head>

<body>

	<div class="container">
		<div class="col d-flex justify-content-center">
			<div class="card mt-5" style="width: 500px;">
				<div class="card-body">
					<h3>Profile Sekolah</h3>
					<hr>
					<?php if( $this->session->flashdata('flash') ) : ?>
							<p class="text-danger">*<?= $this->session->flashdata('flash') ?></p>
							<?php else : ?>
							<p class="">Silahkan Login Terlebih Dahulu</p>
							<?php endif ?>
					<form action="<?=base_url() ?>login/login" method="post">
						<input type="hidden" name="submit" id="submit" value="TRUE">
						<div class="mb-3">
							<label for="username" class="form-label">Username</label>
							<input type="text" class="form-control" name="username" id="username" required> 
							
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Password</label>
							<input type="password" class="form-control" name="password" id="password" required>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<button type="submit" class="btn btn-primary">Submit</button>

							</div>
							<div class="col-sm-3">
								<a href="<?= base_url()?>profile_sekolah"><p class="btn btn-secondary">Kembali</p></a>

							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>












	<!-- script -->
	<script src="<?=base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<!-- datatable -->
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
	</script>
	<script src="<?=base_url() ?>assets/js/datatable.js"></script>
	<!-- end script -->
</body>

</html>
