<?php if( $this->session->flashdata('flash') ) : ?>
<p class="text-danger">*<?= $this->session->flashdata('flash') ?></p>
<?php endif ?>
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
			<div class="row">
					<div class="col-sm-10">
						<h5 class="card-title">Data Admin</h5>
					</div>
					<div class="col-sm-2">
						<a href="<?=base_url() ?>admin/tambah_admin">
							<p class="badge bg-success">Tambah admin</p>
						</a>
					</div>
				</div>


				<hr>
				<table class="table_id" class="display">
					<thead>
						<tr>
							<th>Username</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($admin as $adm) : ?>
						<tr>
							<td><?= $adm['username'] ?></td>
							<td>
								</a>
								<a href="<?=base_url() ?>admin/delete_admin/<?= $adm['id_admin']?>">
									<p class="btn btn-danger btn-sm">Delete</p>
								</a>
								<a href="<?=base_url() ?>admin/update_admin/<?= $adm['id_admin']?>">
									<p class="btn btn-warning btn-sm">Update</p>
								</a>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
