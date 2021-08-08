<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Data guru</h5>
				<hr>
				<table class="table_id" class="display">
					<thead>
						<tr>
							<th>NIP</th>
							<th>Nama guru</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($guru as $gr) : ?>
						<tr>
							<td><?= $gr['nip'] ?></td>
							<td><?= $gr['nama_guru'] ?></td>
							<td>
                                <a href="<?=base_url() ?>home/info_guru/<?= $gr['nip'] ?>"><p class="btn btn-info btn-sm">Info</p></a>
                            </td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
