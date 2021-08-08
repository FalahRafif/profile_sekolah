

		<!-- ///////////////////////////////////// content ////////////////////////////////////////////////////// -->
		<div class="card">
			<div class="card-body">
				<h5 class="card-title"><?= $guru['nama_guru'] ?></h5>
				<hr>
				<div class="row">
					<!-- ///////////////////////////////////// info ////////////////////////////////////////////////////// -->
					<div class="col-sm-6">
						<p class="fw-bold">Informasi guru</p>
						<p>NIP : <?= $guru['nip'] ?></p>
						<p>Jenis Kelamin : <?= $guru['jk'] ?></p>
						<p>TTL : <?= $guru['tempat_lahir'] . " " . $guru['tanggal_lahir'] ?></p>
						<p>Agama : <?= $guru['agama'] ?></p>
						<p>Jabatan : <?= $guru['jabatan'] ?></p>
						<p>Mapel Diajar : <?= $guru['mapel_diajar'] ?></p>
					</div>
					<!-- ///////////////////////////////////// end info ////////////////////////////////////////////////////// -->
				</div>
                <div class="row">
                    <div class="col-sm-2">
                    <a class=" " href="<?=base_url() ?>home/profile_guru"><p class="btn btn-secondary">Kembali</p></a>
                    </div>
                </div>
                
                
			</div>
</div>

		

