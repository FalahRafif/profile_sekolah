<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Data siswa</h5>
				<hr>
				<table class="table_id" class="display">
					<thead>
						<tr>
							<th>NISN</th>
							<th>Nama siswa</th>
							<th>Jurusan</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($siswa as $swa) : ?>
						<tr>
							<td><?= $swa['nisn'] ?></td>
							<td><?= $swa['nama_siswa'] ?></td>
							<td><?= $swa['jurusan'] ?></td>
							<td>
                                <a href="<?=base_url() ?>home/info_siswa/<?= $swa['nisn']?>"><p class="btn btn-info btn-sm">Info</p></a>
                            </td>
						</tr>
						<?php endforeach?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
