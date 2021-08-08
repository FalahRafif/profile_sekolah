

		<!-- ///////////////////////////////////// content ////////////////////////////////////////////////////// -->
		<div class="card">
			<div class="card-body">
				<h5 class="card-title"><?= $siswa['nama_siswa'] ?></h5>
				<hr>
				<div class="row">
					<!-- ///////////////////////////////////// info ////////////////////////////////////////////////////// -->
					<div class="col-sm-6">
						<p class="fw-bold">Informasi Siswa</p>
						<p>NISN : <?= $siswa['nisn'] ?></p>
						<p>Jenis Kelamin : <?= $siswa['jk'] ?></p>
						<p>TTL : <?= $siswa['tempat_lahir'] . " " . $siswa['tanggal_lahir'] ?></p>
						<p>Agama : <?= $siswa['agama'] ?></p>
						<p>Kelas : <?= $siswa['kelas'] ?></p>
						<p>Jurusan : <?= $siswa['jurusan'] ?></p>
					</div>
					<div class="col-sm-6">
						<p class="fw-bold">Informasi Orangtua</p>
						<p class="fw-bold">Ayah</p>
						<p>Nama Ayah : <?= $ortu['nama_ayah'] ?></p>
						<p>TTL : <?= $ortu['tempat_lahir_ayh'] . " " . $ortu['tanggal_lahir_ayh'] ?></p>
						<p>Pekerjaan : <?= $ortu['pekerjaan_ayh'] ?></p>
						<p>Pendidikan Terakhir : <?= $ortu['pend_akh_ayh'] ?></p>
						<p class="fw-bold">Ibu</p>
						<p>Nama Ibu : <?= $ortu['nama_ibu'] ?></p>
						<p>TTL : <?= $ortu['tempat_lahir_ibu'] . " " . $ortu['tanggal_lahir_ibu'] ?></p>
						<p>Pekerjaan : <?= $ortu['pekerjaan_ibu'] ?></p>
						<p>Pendidikan Terakhir : <?= $ortu['pend_akh_ibu'] ?></p>
					</div>
					<!-- ///////////////////////////////////// end info ////////////////////////////////////////////////////// -->
				</div>
                <div class="row">
                    <div class="col-sm-2">
                    <a class=" " href="<?=base_url() ?>home/profile_siswa"><p class="btn btn-secondary">Kembali</p></a>
                    </div>
                </div>
                
                
			</div>
</div>

		

