<?php if( $this->session->flashdata('flash') ) : ?>
<p class="text-danger">*<?= $this->session->flashdata('flash') ?></p>
<?php endif ?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Tambah Admni</h5>
				<hr>
				<form action="<?=base_url() ?>admin/edit_admin" method="post">
					<div class="mb-3">

						<input type="hidden" name="submit" id="submit" required value="TRUE">
						<input type="hidden" name="id_admin" id="id_admin" required value="<?= $admin['id_admin'] ?>">
						<input type="hidden" name="old_pw" id="old_pw" required value="<?= $admin['pw'] ?>">
						<input type="hidden" name="id_user_level" id="id_user_level" required value="<?= $admin['id_user_level'] ?>">

						<label for="username" class="form-label">Username</label>
						<input type="text" class="form-control" name="username" id="username" required value="<?= $admin['username']?>">
					</div>
					<div class="mb-3">
						<label for="pw" class="form-label">Password</label>
						<input type="password" class="form-control" name="pw" id="pw" >
					</div>
					<div class="mb-3">
						<label for="re_pw" class="form-label">Re-password</label>
						<input type="password" class="form-control" name="re_pw" id="re_pw" >
					</div>
					<div class="row">
						<div class="col-sm-1">
							<button type="submit" class="btn btn-primary">Submit</button>

						</div>
						<div class="col-sm-1">
							<a href="<?= base_url()?>admin/data_admin">
								<p class="btn btn-secondary">Kembali</p>
							</a>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
