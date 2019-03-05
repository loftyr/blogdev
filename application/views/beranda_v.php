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
    	
    	<div class="main-body">
    		<ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="#">
                        <h5 class="card-title">Judul Lowongan</h5>
                    </a>
                    <div class="detail">
                        <img class="card-img-top" src="<?= base_url('file/img_upload/logo1.jpg'); ?>" alt="Card image cap">
                        <p class="card-text ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius provident architecto sed quibusdam at commodi voluptates eligendi asperiores quam? Iste necessitatibus numquam voluptatum doloremque magni perspiciatis quae, consectetur, omnis.</p>
                    </div>
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <h5 class="card-title">Judul Lowongan</h5>
                    </a>
                    <div class="detail">
                        <img class="card-img-top" src="<?= base_url('file/img_upload/logo2.png'); ?>" alt="Card image cap">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius provident architecto sed quibusdam at commodi voluptates eligendi asperiores quam? Iste necessitatibus numquam voluptatum doloremque magni perspiciatis quae, consectetur, omnis.</p>
                    </div>      
                </li>
                <li class="list-group-item">
                    <a href="#">
                        <h5 class="card-title">Judul Lowongan</h5>
                    </a>
                    <div class="detail">
                        <img class="card-img-top" src="<?= base_url('file/img_upload/logo3.jpg'); ?>" alt="Card image cap">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam eius provident architecto sed quibusdam at commodi voluptates eligendi asperiores quam? Iste necessitatibus numquam voluptatum doloremque magni perspiciatis quae, consectetur, omnis.</p>
                    </div>  
                </li>
            </ul>
    	</div>

    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('plugin/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('plugin/popper.min.js') ?>"></script>
    <script src="<?= base_url('plugin/bootstrap/js/bootstrap.min.js') ?>"></script>
  </body>
</html>