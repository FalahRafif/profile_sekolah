<?php if( $this->session->flashdata('flash') ) : ?>
<p class="text-danger">*<?= $this->session->flashdata('flash') ?></p>
<?php endif ?>
<!-- ///////////////////////////////////// content ////////////////////////////////////////////////////// -->
<div class="row">
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title"><?= $sekolah['nama_sekolah'] ?></h5>
				<hr>
				<div class="row">

					<!-- ///////////////////////////////////// info ////////////////////////////////////////////////////// -->
					<div class="col-sm-12">
						<!-- ///////////////////////////////////// card ////////////////////////////////////////////////////// -->
						<div class="row">
							<div class="col-sm-6">
								<div class="card text-dark bg-white mb-3">
									<div class="card-body">
										<h5 class="card-title">Total Guru</h5>
										<h1><?= $tguru ?></h1>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card text-dark bg-white mb-3">
									<div class="card-body">
										<h5 class="card-title">Total Siswa</h5>
										<h1><?= $tsiswa?></h1>
									</div>
								</div>
							</div>
						</div>
						<!-- ///////////////////////////////////// end card ////////////////////////////////////////////////////// -->
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


				</div>
			</div>
		</div>
	</div>
	<!-- ///////////////////////////////////// card edit ////////////////////////////////////////////////////// -->
	<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
				<div class="col-sm-12">
					<h5 class="card-title">Edit Data Sekolah</h5>
					<hr>
					<form action="" method="post">
						<div class="mb-3">
							<label for="nisekolah" class="form-label">NIS</label>
							<input type="hidden"  name="submit" id="submit" required value="TRUE">
							<input type="hidden"  name="gambar" id="gambar" required value="<?= $sekolah['gambar'] ?>">
							<input type="number" class="form-control" name="nisekolah" id="nisekolah" required value="<?= $sekolah['nisekolah'] ?>">
						</div>
						<div class="mb-3">
							<label for="nama_sekolah" class="form-label">Nama Sekolah</label>
							<input type="text" class="form-control" name="nama_sekolah" id="nama_sekolah" required value="<?= $sekolah['nama_sekolah'] ?>">
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="mb-3">
									<label for="jenjang" class="form-label">Jenjang</label>
									<select class="form-select" name="jenjang" id="jenjang" aria-label="" required>
										<option selected value="<?= $sekolah['id_jenjang'] ?>"><?= $sekolah['nama_jenjang'] ?></option>
										<?php foreach($jenjang as $jjng) : ?>
											<option value="<?= $jjng['id_jenjang'] ?>"><?= $jjng['nama_jenjang']?></option>
											<?php endforeach ?>
										
									</select>
								</div>

							</div>
							<div class="col-sm-4">
								<div class="mb-3">
									<label for="akreditasi" class="form-label">Akreditasi</label>
									<select class="form-select" name="akreditasi" id="akreditasi" aria-label=""
										required>
										<option selected value="<?= $sekolah['akreditasi'] ?>"><?= $sekolah['akreditasi'] ?></option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
										<option value="D">D</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mb-3">
									<label for="bentuk_sekolah" class="form-label">Bentuk Sekolah</label>
									<select class="form-select" name="bentuk_sekolah" id="bentuk_sekolah" aria-label=""
										required>
										<option selected value="<?= $sekolah['bentuk_sekolah'] ?>"><?= $sekolah['bentuk_sekolah'] ?></option>
										<option value="Negeri">Negeri</option>
										<option value="Swasta">Swasta</option>
									</select>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<label for="wps" class="form-label">Waktu Penyelenggaraan Sekolah</label>
							<select class="form-select" name="wps" id="wps" aria-label="" required>
								<option selected value="<?= $sekolah['waktu_peneylenggaraan_sekolah'] ?>"><?= $sekolah['waktu_peneylenggaraan_sekolah'] ?></option>
								<option value="Pagi">Pagi</option>
								<option value="Siang">Siang</option>
								<option value="Sore">Sore</option>
								<option value="Malam">Malam</option>
							</select>
						</div>
						<div class="mb-3">
							<label for="alamat" class="form-label">Alamat</label>
							<input type="text" class="form-control" name="alamat" id="alamat" required value="<?= $sekolah['alamat'] ?>">
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="mb-3">
									<label for="no_telp" class="form-label">No Telephone</label>
									<input type="number" class="form-control" name="no_telp" id="no_telp" required value="<?= $sekolah['no_telp'] ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="mb-3">
									<label for="no_hp" class="form-label">No Handphone</label>
									<input type="number" class="form-control" name="no_hp" id="no_hp" required value="<?= $sekolah['no_hp'] ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-4">
								<div class="mb-3">
									<label for="kelurahan" class="form-label">Kelurahan</label>
									<input type="text" class="form-control" name="kelurahan" id="kelurahan" required value="<?= $sekolah['kelurahan'] ?>">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mb-3">
									<label for="Kecamatan" class="form-label">Kecamatan</label>
									<input type="text" class="form-control" name="Kecamatan" id="Kecamatan" required value="<?= $sekolah['kecamatan'] ?>">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="mb-3">
									<label for="Kota" class="form-label">Kota</label>
									<input type="text" class="form-control" name="Kota" id="Kota" required value="<?= $sekolah['kota'] ?>">
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- ///////////////////////////////////// end card edit ////////////////////////////////////////////////////// -->
</div>
