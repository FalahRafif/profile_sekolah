<?php if( $this->session->flashdata('flash') ) : ?>
<p class="text-danger">*<?= $this->session->flashdata('flash') ?></p>
<?php endif ?>
<div class="row-col-sm-12">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Tambah Siswa</h5>
			<hr>
			<form action="" method="post">
				<div class="row">
					<!-- //////////////////////////////////////////////// form siswa //////////////////////////////// -->
					<div class="col-sm-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title text-center">Data Siswa</h5>
								<hr>

								<input type="hidden" name="submit" id="submit" required value="TRUE">

								<div class="mb-3">
									<label for="nisn" class="form-label">NISN</label>
									<input type="number" class="form-control" name="nisn" id="nisn" required>
								</div>
								<div class="mb-3">
									<label for="nama_siswa" class="form-label">Nama Siswa</label>
									<input type="text" class="form-control" name="nama_siswa" id="nama_siswa" required>
								</div>
								<div class="mb-3">
									<label for="jk" class="form-label">Jenis Kelamin</label>
									<select class="form-select" name="jk" id="jk" required>
										<option selected value="" disabled>Pilih Jenis Kelamin</option>
										<option value="Laki-Laki">Laki-Laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="tmp_lhr" class="form-label">Tempat Lahir</label>
											<input type="text" class="form-control" name="tmp_lhr" id="tmp_lhr"
												required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="tgl_lhr" class="form-label">Tanggal Lahir Lahir</label>
											<input type="date" class="form-control" name="tgl_lhr" id="tgl_lhr"
												required>
										</div>
									</div>
								</div>
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
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="kelas" class="form-label">Kelas</label>
											<select class="form-select" name="kelas" id="kelas" aria-label="" required>
												<option selected value="" disabled>Pilih kelas</option>
												<option value="X">X</option>
												<option value="XI">XI</option>
												<option value="XII">XII</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="sub_kelas" class="form-label">Sub Kelas</label>
											<input type="text" class="form-control" name="sub_kelas" id="sub_kelas"
												required>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<label for="jurusan" class="form-label">Jurusan</label>
									<select class="form-select" name="jurusan" id="jurusan" aria-label="" required>
										<option selected value="" disabled>Pilih kelas</option>
										<option value="RPL">RPL</option>
										<option value="MM">MM</option>
										<option value="TKR">TKR</option>
										<option value="TSM">TSM</option>
										<option value="APH">APH</option>
										<option value="AK">AK</option>
									</select>
								</div>
							</div>
						</div>
					</div>

					<!-- //////////////////////////////////////////////// end form siswa //////////////////////////////// -->
					<!-- ////////////////////////////////////////////////  form ortu siswa //////////////////////////////// -->

					<div class="col-sm-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title text-center">Data Orantua</h5>
								<hr>
								<small>jika orangtua memiliki 2 anak dan anak pertama sudah terdaftar di sekolah maka
									data orangtua yang sudah ada akan di update oleh data baru</small>
								<p><b>Data Ayah</b></p>
								<div class="mb-3">
									<label for="nama_ayah" class="form-label">Nama Ayah</label>
									<input type="text" class="form-control" name="nama_ayah" id="nama_ayah" required>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="tmp_lhr_ayh" class="form-label">Tempat Lahir Ayah</label>
											<input type="text" class="form-control" name="tmp_lhr_ayh" id="tmp_lhr_ayh"
												required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="tgl_lhr_ayh" class="form-label">Tanggal Lahir Ayah</label>
											<input type="date" class="form-control" name="tgl_lhr_ayh" id="tgl_lhr_ayh"
												required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="pekerjaan_ayh" class="form-label">Pekerjaan Ayah</label>
											<input type="text" class="form-control" name="pekerjaan_ayh"
												id="pekerjaan_ayh" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="pend_akh_ayh" class="form-label">Pend. Terakhir Ayah</label>
											<select class="form-select" name="pend_akh_ayh" id="pend_akh_ayh"
												aria-label="" required>
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
									</div>
								</div>
								<p><b>Data Ibu</b></p>
								<div class="mb-3">
									<label for="nama_ibu" class="form-label">Nama Ibu</label>
									<input type="text" class="form-control" name="nama_ibu" id="nama_ibu" required>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="tmp_lhr_ibu" class="form-label">Tempat Lahir Ibu</label>
											<input type="text" class="form-control" name="tmp_lhr_ibu" id="tmp_lhr_ibu"
												required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="tgl_lhr_ibu" class="form-label">Tanggal Lahir Ayah</label>
											<input type="date" class="form-control" name="tgl_lhr_ibu" id="tgl_lhr_ibu"
												required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="pekerjaan_ibu" class="form-label">Pekerjaan ibu</label>
											<input type="text" class="form-control" name="pekerjaan_ibu"
												id="pekerjaan_ibu" required>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="mb-3">
											<label for="pend_akh_ibu" class="form-label">Pend. Terakhir ibu</label>
											<select class="form-select" name="pend_akh_ibu" id="pend_akh_ibu"
												aria-label="" required>
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
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- ////////////////////////////////////////////////  end form ortu siswa //////////////////////////////// -->
					<!-- ////////////////////////////////////////////////  form akun siswa //////////////////////////////// -->
					<div class="col-sm-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title text-center">Data Akun Siswa</h5>
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
									<label for="re_pw" class="form-label">Re-password</label>
									<input type="password" class="form-control" name="re_pw" id="re_pw" required>
								</div>
							</div>
						</div>
					</div>
					<!-- ////////////////////////////////////////////////  end form akun siswa //////////////////////////////// -->

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
