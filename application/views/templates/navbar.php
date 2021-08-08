
		<!-- ///////////////////////////////////// head ////////////////////////////////////////////////////// -->
		<header class="mb-3 ">
			<nav>
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<a class="navbar-brand" href="<?= base_url() ?>profile_sekolah/index"><b>Profile Sekolah</b> </a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- ///////////////////////////////////// menu ////////////////////////////////////////////////////// -->
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?= base_url() ?>home/index">Data Sekolah</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="<?= base_url() ?>home/info_kita">Info Saya</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
										data-bs-toggle="dropdown" aria-expanded="false">
										Profile
									</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
										<li><a class="dropdown-item" href="<?= base_url() ?>home/profile_guru">Guru</a></li>
										<li><a class="dropdown-item" href="<?= base_url() ?>home/profile_siswa">Siswa</a></li>
										<li>
									</ul>
								</li>
								<li class="nav-item">
									<?php if($login == TRUE) : ?>
										<a class="nav-link" aria-current="page" href="<?= base_url() ?>login/login">Login</a>
										<?php else : ?>
											<a class="nav-link" aria-current="page" href="<?= base_url() ?>home/logout">Log-out</a>
										<?php endif?>
								</li>	
							</ul>
						</div>
					</div>
					<!-- ///////////////////////////////////// menu ////////////////////////////////////////////////////// -->
				</nav>
			</nav>
		</header>
		<!-- ///////////////////////////////////// end head ////////////////////////////////////////////////////// -->