<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/b6a084c964.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('styles/admin.css') ?>">
	<title>AdminHub</title>
</head>
<body>

<section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Smart Jogja</span>
        </a>
        <ul class="side-menu top">
            <li class="<?= set_active('dashboard') ?>">
                <a href="<?= base_url('/dashboard'); ?>">
                    <i class="bx fa-solid fa-gauge"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="<?= set_active('list-survey') ?>">
                <a href="<?= base_url('/list-survey'); ?>">
                    <i class="bx fa-solid fa-square-poll-vertical"></i>
                    <span class="text">Survey Result</span>
                </a>
            </li>
            <li class="<?= set_active('list-criteria') ?>">
                <a href="<?= base_url('/list-criteria') ?>">
                    <i class="bx fa-solid fa-file"></i>
                    <span class="text">Master Data Kriteria</span>
                </a>
            </li>
            <li class="<?= set_active('list-sub-criteria') ?>">
                <a href="<?= base_url('/list-sub-criteria') ?>">
                    <i class="bx fa-solid fa-file"></i>
                    <span class="text">Master Data Sub Kriteria</span>
                </a>
            </li>
            <li class="<?= set_active('list-user') ?>">
                <a href="<?= base_url('/list-user') ?>">
                    <i class="bx fa-solid fa-user"></i>
                    <span class="text">Users</span>
                </a>
            </li>
            <li class="<?= set_active('guidline-admin') ?>">
                <a href="<?= base_url('/guidline-admin') ?>">
                    <i class="bx fa-solid fa-file"></i>
                    <span class="text">Guidline</span>
                </a>
            </li>
            <li class="<?= set_active('about-edit') ?>">
                <a href="<?= base_url('/about/edit') ?>">
                    <i class="bx fa-solid fa-file"></i>
                    <span class="text">About</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?= base_url('/logout') ?>" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

	<section id="content">
		<!-- <nav>
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav> -->

		<main>
			<?= $this->renderSection('content') ?>
		</main>
	</section>
	
    <script src="<?= base_url('app.js') ?>"></script>
</body>
</html>