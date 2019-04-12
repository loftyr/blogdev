<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('plugin/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Sweet Alert 2 CSS -->
    <link rel="stylesheet" href="<?= base_url('plugin/sweetalert2.min.css') ?>">
    <!-- My Style CSS -->
    <link rel="stylesheet" href="<?= base_url('plugin/MyStyle.css') ?>">

    <title>Welcome To Job Medan</title>
  </head>
  <body>
    
    <div class="container bg-container">

    	<!-- Navbar -->
    	<div class="navigasi">
		 	<ul class="nav justify-content-end">
				<li class="nav-item">
			    	<a class="nav-link aktif" href="#">Home</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link" href="#">Tentang</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link" href="#">Follow US</a>
			  	</li>
			</ul>
		</div>
    	<!-- Akhir Navbar -->
    	
        <!-- Body -->
    	<div class="main-body">
            <ul class="list-group list-group-flush">
                <?php foreach ($data->result() as $thread): ?>
                    <li class="list-group-item">
                        <a href="<?= base_url('detail/id/'.$thread->id.''); ?>" target="_blank">
                            <h5 class="card-title"><?= $thread->judul_thread; ?></h5>
                        </a>
                        <div class="detail">
                            <img class="card-img-top" src="<?= base_url(''.$thread->url_logo.''); ?>" alt="Card image cap">
                            <p class="card-text ">
                                <?= substr($thread->ket_thread, 0, 250); ?>..... <a href="<?= base_url('detail/id/'.$thread->id.''); ?>" target="_blank">Lihat Selengkapnya</a>
                            </p>
                            <div class="footer-thread text-muted">
                                <?= time_ago($thread->tanggal); ?>
                            </div>

                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
            <div class="row">
                <div class="col">
                    <!--Tampilkan pagination-->
                    <?php echo $pagination; ?>
                </div>
            </div>
    	</div>

        <!-- Footer -->
        <div class="footer">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 text-center">
                    <h2>About Us</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi odit nemo ex totam repellendus quam animi placeat dolores pariatur omnis.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5 text-center">
                    <h5>Follow Us</h5>
                    <div class="box-follow-us">
                        <a href="" class="list-follow">Facebook</a>
                        <a href="" class="list-follow">Instagram</a>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <h5>Want Post A Job Vacancy</h5>
                    <div class="box-post-job">
                        <a href="">Click Me</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('plugin/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('plugin/popper.min.js') ?>"></script>
    <script src="<?= base_url('plugin/bootstrap/js/bootstrap.min.js') ?>"></script>
  </body>
</html>