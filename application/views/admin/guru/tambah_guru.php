<?php if( $this->session->flashdata('flash') ) : ?>
<p class="text-danger">*<?= $this->session->flashdata('flash') ?></p>
<?php endif ?>
<div class="row">
	<div class="col-sm-12 mt-3 mb-3">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title">Tambah Data Guru</h5>
				<hr>
				<form action="" method="post">
					<div class="row">
						<!-- ///////////////////////////////////// data guru ///////////////////////// -->
						<div class="col-sm-6">
							<h5 class="text-center"><b>Data Guru</b></h5>
							<hr>
							<div class="mb-3">
								<input type="hidden" name="submit" id="submit" value="TRUE">
								<label for="nip" class="form-label">NIP</label>
								<input type="number" class="form-control" name="nip" id="nip" required>
							</div>
							<div class="mb-3">
								<label for="nama_guru" class="form-label">Nama Guru</label>
								<input type="text" class="form-control" name="nama_guru" id="nama_guru" required>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="mb-3">
										<label for="jk" class="form-label">Jenis Kelamin</label>
										<select class="form-select" name="jk" id="jk" required>
											<option selected value="" disabled>Pilih Jenis Kelamin</option>
											<option value="Laki-Laki">Laki-Laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="mb-3">
										<label for="tmp_lhr" class="form-label">Tempat Lahir</label>
										<input type="text" class="form-control" name="tmp_lhr" id="tmp_lhr" required>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="mb-3">
										<label for="tgl_lhr" class="form-label">Tanggal Lahir Lahir</label>
										<input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<!--  -->
									<div class="mb-3">
										<label for="pend_akh" class="form-label">Pendidikan Terakhir</label>
										<select class="form-select" name="pend_akh" id="pend_akh" aria-label=""
											required>
											<option selected value="" disabled>Pilih Pendidikan</option>
											<option value="SMK">SMK</option>
											<option value="SMA">SMA</option>
											<option value="D1">D1</option>
											<option value="D2">D2</option>
											<option value="D3">D3</option>
											<option value="D4">D4</option>
											<option value="S1">S1</option>
											<option value="S2">S2</option>
											<option value="S3">S3</option>
										</select>
									</div>
									<!--  -->
								</div>

								<div class="col-sm-6">
									<div class="mb-3">
										<label for="agama" class="form-label">Agama</label>
										<select class="form-select" name="agama" id="agama" aria-label="" required>
											<option selected value="" disabled>Pilih Agama</option>
											<option value="Islam">Islam</option>
											<option value="Katolik">Katolik</option>
											<option value="Protestan">Protestan</option>
											<option value="Hindu">Hindu</option>
											<option value="Budha">Budha</option>
											<option value="khonghucu">khonghucu</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="mb-3">
										<label for="jabatan" class="form-label">Jabatan</label>

										<select class="form-select" name="jabatan" id="jabatan" aria-label="" required>
											<option selected value="" disabled>Pilih Jabatan</option>
											<option value="Kepala Sekolah">Kepala Sekolah</option>
											<option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
											<option value="Guru">Guru</option>
										</select>
										<small class="text-danger">memilih Jabatan Kepsek/Wakepsek maka akan mengganti
											kepemilikan jabatan itu dari guru yang menjabat nya sekarang</small>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="mb-3">
										<label for="mapel_diajar" class="form-label">Mapel Diajar</label>
										<select class="form-select" name="mapel_diajar" id="mapel_diajar" aria-label=""
											required>
											<option selected value="" disabled>Pilih Mapel</option>
											<option value="Bahasa Indonesia">Bahasa Indonesia</option>
											<option value="Bahasa Inggris">Bahasa Inggris</option>
											<option value="Bahasa Sunda">Bahasa Sunda</option>
											<option value="MTK">MTK</option>
											<option value="Sejarah Indonesia">Sejarah Indonesia</option>
											<option value="Pemograman Dasar">Pemograman Dasar</option>
											<option value="Pemograman Berbasis Object">Pemograman Berbasis Object
											</option>
											<option value="Basis Data">Basis Data</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<!-- ///////////////////////////////////// end data guru ///////////////////////// -->
						<!-- ///////////////////////////////////// akun guru ///////////////////////// -->
						<div class="col-sm-6">
							<h5 class="text-center"><b>Akun Guru</b></h5>
							<hr>
							<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input type="text" class="form-control" name="username" id="username" required>
							</div>
							<div class="mb-3">
								<label for="pw" class="form-label">Password</label>
								<input type="password" class="form-control" name="pw" id="pw" required>
							</div>
							<div class="mb-3">
								<label for="re_pw" class="form-label">Re-Password</label>
								<input type="password" class="form-control" name="re_pw" id="re_pw" required>
							</div>
						</div>
						<!-- ///////////////////////////////////// end akun guru ///////////////////////// -->
					</div>
					<div class="row">
						<div class="col-sm-1">
							<button type="submit" class="btn btn-primary">Submit</button>

						</div>
						<div class="col-sm-1">
							<a href="<?= base_url()?>admin/dgs">
								<p class="btn btn-secondary">Kembali</p>
							</a>

						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
