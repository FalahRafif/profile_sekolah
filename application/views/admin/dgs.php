<?php if( $this->session->flashdata('flash') ) : ?>
<p class="text-danger">*<?= $this->session->flashdata('flash') ?></p>
<?php endif ?>
<div class="row">
	<div class="col-sm-6 mb-3 mt-3">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-9">
						<h5 class="card-title">Data guru</h5>
					</div>
					<div class="col-sm-3">
						<a href="<?=base_url() ?>admin/tambah_guru">
							<p class="badge bg-success">Tambah Guru</p>
						</a>
					</div>
				</div>


				<hr>
				<table class="table_id" class="display">
					<thead>
						<tr>
							<th>NIP</th>
							<th>Nama guru</th>
							<th>Jabatan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($guru as $gr) : ?>
						<tr>
							<td><?= $gr['nip'] ?></td>
							<td><?= $gr['nama_guru'] ?></td>
							<td><?= $gr['jabatan'] ?></td>
							<td>
								<a href="<?=base_url() ?>admin/info_guru/<?= $gr['nip'] ?>">
									<p class="btn btn-info btn-sm">Info</p>
								</a>
								<a href="<?=base_url() ?>admin/delete_guru/<?= $gr['nip']?>">
									<p class="btn btn-danger btn-sm">Delete</p>
								</a>
								<a href="<?=base_url() ?>admin/update_guru/<?= $gr['nip']?>">
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
	<div class="col-sm-6 mb-3 mt-3">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-9">
						<h5 class="card-title">Data Siswa</h5>
					</div>
					<div class="col-sm-3">
						<a href="<?=base_url() ?>admin/tambah_siswa">
							<p class="badge bg-success ">Tambah Siswa</p>
						</a>
					</div>
				</div>
				<hr>
				<table class="table_id" class="display">
					<thead>
						<tr>
							<th>NISN</th>
							<th>Nama siswa</th>
							<th>Kelas</th>
							<th>Jurusan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($siswa as $swa) : ?>
						<tr>
							<td><?= $swa['nisn'] ?></td>
							<td><?= $swa['nama_siswa'] ?></td>
							<td><?= $swa['kelas'] ?></td>
							<td><?= $swa['jurusan'] ?></td>
							<td>
								<a href="<?=base_url() ?>admin/info_siswa/<?= $swa['nisn']?>">
									<p class="btn btn-info btn-sm">Info</p>
								</a>
								<a href="<?=base_url() ?>admin/delete_siswa/<?= $swa['nisn']?>">
									<p class="btn btn-danger btn-sm">Delete</p>
								</a>
								<a href="<?=base_url() ?>admin/update_siswa/<?= $swa['nisn']?>">
									<p class="btn btn-warning btn-sm">Update</p>
								</a>
							</td>
						</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
