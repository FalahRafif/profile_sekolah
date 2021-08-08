
<?php if( $this->session->flashdata('flash') ) : ?>
							<p class="text-danger">*<?= $this->session->flashdata('flash') ?></p>
							<?php endif ?>
		<!-- ///////////////////////////////////// content ////////////////////////////////////////////////////// -->
		<div class="card">
			<div class="card-body">
				<h5 class="card-title"><?= $sekolah['nama_sekolah'] ?></h5>
				<hr>
				<div class="row">

					<!-- ///////////////////////////////////// info ////////////////////////////////////////////////////// -->
					<div class="col-sm-6">
						
						<p class="fw-bold">Informasi Sekolah</p>
						<p>NIS : <?= $sekolah['nisekolah'] ?></p>
						<p>Jenjang : <?= $sekolah['nama_jenjang'] ?></p>
						<p>Waktu Penyelenggaraan Sekolah : <?= $sekolah['waktu_peneylenggaraan_sekolah'] ?></p>
						<p>Akreditasi : <?= $sekolah['akreditasi'] ?></p>
						<p>Alamat : <?= $sekolah['alamat'] ?></p>
						<p>No Telephone : <?= $sekolah['no_telp'] ?></p>
						<p>No Handphone : <?= $sekolah['no_hp'] ?></p>
						<p>Kelurahan : <?= $sekolah['kelurahan'] ?></p>
						<p>Kecamatan : <?= $sekolah['kecamatan'] ?></p>
						<p>Kota : <?= $sekolah['kota'] ?></p>
						<p>Bentuk Sekolah : <?= $sekolah['bentuk_sekolah'] ?></p>
					</div>
					<!-- ///////////////////////////////////// end info ////////////////////////////////////////////////////// -->
					<!-- ///////////////////////////////////// card ////////////////////////////////////////////////////// -->
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-12">
								<div class="card text-dark bg-white mb-3">
									<div class="card-body">
										<h5 class="card-title">Total Guru</h5>
										<h1><?= $tguru ?></h1>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="card text-dark bg-white mb-3">
								<div class="card-body">
									<h5 class="card-title">Total Siswa</h5>
									<h1><?= $tsiswa?></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
</div>
			<!-- ///////////////////////////////////// end card ////////////////////////////////////////////////////// -->
		

