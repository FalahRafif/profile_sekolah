<div class="row">
	<!-- profile sekolah -->
	<div class="col-sm-12 mb-2">
		<div class="card">
			<img src="<?=base_url() ?>/assets/img/sekolah/1.jpg" class="card-img-top" alt="SMKN 1 Kerjid" width="100%">
			<div class="card-body">
				<h1><?= $sekolah['nama_sekolah'] ?></h1>
				<p><?= $sekolah['nama_sekolah'] ?> adalah sebuah Sekolah Menengah Kejuruan (SMK) Negeri pertama di Kota Depok yang
					menggabungkan antara beberapa kelompok Kejuruan.</p>
				<p>Sekolah ini pada awalnya terdiri dari 2 program studi yaitu Program Studi Mekanik Otomotif dan
					Program Studi Akomodasi Perhotelan. Namun, sekarang sudah bertambah program studi menjadi 6 program
					yaitu Rekayasa Perangkat Lunak, Multimedia, Akomodasi Perhotelan, Akutansi, Teknik Bisnis Sepeda
					Motor, Teknik Kendaraan Ringan.</p>
			</div>
		</div>
	</div>

	<!-- info kepala sekolah -->
	<div class="col-sm-12 mb-2">
		<div class="card mb-3">
			<div class="row g-0">
				<div class="col-md-4">
					<img src="<?=base_url() ?>/assets/img/guru/tony.jpg" class="img-fluid rounded-start" alt="tony.jpg"
						style="height: 200px;widht: 200px;">
				</div>
				<div class="col-md-8">
					<div class="card-body">
						<h5 class="card-title">Bertemu Dengan Kepala Sekolah Kami</h5>
						<p class="card-text">Puji dan syukur marilah kita panjatkan kehadirat Allah SWT. atas limpahan
							rahmat, taufik dan hidayah-Nya, kita semua diberikan kesehatan sehingga dapat melaksanakan
							tugas kita di bidang pendidikan. Para pengunjung situs yang berbahagia, kami ucapkan selamat
							datang di situs SMKN Karjid ini</p>
						<p class="card-text"><small class="text-muted"><?php if($kepsek != NULL){ echo $kepsek['nama_guru']; }else{echo 'NULL';}  ?></small></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- data sekolah -->
	<div class="col-sm-12 mb-2">
		<div class="card text-white bg-dark mb-3">
			<div class="card-body text-center">
				<h5 class="card-title">Data Sekolah</h5>
				<p class="card-text">Kami memiliki banyak siswa di dalam satu gedung yang terbagi dalam 6 Jurusan dengan detail berikut.</p>
                <!-- data card -->
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card text-dark bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Siswa</h5>
                                <h2><?= $tsiswa ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-dark bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Guru</h5>
                                <h2><?= $tguru ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
    
    <!-- footer 1 -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-7">
                        <h3><?= $sekolah['nama_sekolah'] ?></h3>
                        <hr>
                        <p><?= $sekolah['nama_sekolah'] ?> adalah sebuah Sekolah Menengah Kejuruan (SMK) Negeri pertama di Kota Depok yang menggabungkan antara beberapa kelompok Kejuruan.</p>
                    </div>
                    <div class="col-sm-5">
                        <p>No Telephone : <?= $sekolah['no_telp'] ?></p>
                        <p>No Handphone : <?= $sekolah['no_hp'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
