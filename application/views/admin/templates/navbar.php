
		<!-- ///////////////////////////////////// head ////////////////////////////////////////////////////// -->
		<header class="mb-3 ">
			<nav>
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<a class="navbar-brand" href="#"><b>Dashboard Admin</b> </a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- ///////////////////////////////////// menu ////////////////////////////////////////////////////// -->
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?= base_url() ?>admin/index">Data Sekolah</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?= base_url() ?>admin/dgs">Data Guru dan Siswa</a>
								</li>
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?= base_url() ?>admin/data_admin">Data Admin</a>
								</li>
								<li class="nav-item">
									<?php if($login == TRUE) : ?>
										<a class="nav-link" aria-current="page" href="<?= base_url() ?>login/login">Login</a>
										<?php else : ?>
											<a class="nav-link" aria-current="page" href="<?= base_url() ?>admin/logout">Log-out</a>
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