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
    <link rel="stylesheet" href="<?= base_url('plugin/StylePageRequest.css') ?>">

    <!-- jquery CSS -->
    <link rel="stylesheet" href="<?= base_url('plugin/JqueryUI/jquery-ui.css') ?>">

    <!--  -->

    <title>Request Loker</title>
  </head>
  <body>
    
    <div class="container">

    	<!-- Navbar -->
    	<div class="navigasi">
		 	<ul class="nav justify-content-end">
				<li class="nav-item">
			    	<a class="nav-link" href="<?= base_url(); ?>">Home</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link" href="#">Tentang</a>
			  	</li>
			  	<li class="nav-item">
			    	<a class="nav-link" href="#">Follow US</a>
			  	</li>
                <li class="nav-item">
                    <a class="nav-link aktif" href="<?= base_url('/request/') ?>">Ajukan Loker</a>
                </li>
			</ul>
		</div>
    	<!-- Akhir Navbar -->
    	
        <!-- Body -->
    	<div class="body-background rounded shadow pr-3 pl-3 mt-1 mb-1">
            <form action="" id="form" link="<?= base_url(); ?>" enctype="multipart/form-data">
                <input type="hidden"  value="" id="id" name="id">
                 <div class="form-group">
                    <label for="Judul">Judul</label>
                    <input type="text" class="form-control" id="Judul" name="Judul">
                </div>
                <div class="form-group">
                    <label for="Ket">Keterangan</label>
                    <textarea class="form-control" name="Ket" id="Ket" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="Tgl">Tanggal</label>
                    <input type="text" class="form-control tgl-entry col-sm-3" id="Tgl" name="Tgl" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" class="form-control" id="Alamat" name="Alamat">
                </div>
                <div class="form-group">
                    <label for="Logo">Logo</label>
                    <input type="file" class="form-control-file col-sm-4" id="Logo" name="Logo">
                    <img src="" class="img-preview">
                    <small id="info" class="form-text text-muted">Max Ukuran Logo 250 x 150</small>
                </div>
                <div class="form-group">
                    <label for="Brosur">Brosur</label>
                    <input type="file" class="form-control-file col-sm-4" id="Brosur" name="Brosur">
                    <small id="info" class="form-text text-muted">Max Ukuran 2.5MB</small>
                </div>
                <div class="form-group">
                    <label for="Link">Link</label>
                    <input type="text" class="form-control" id="Link" name="Link">
                </div>
            </form>

            <div class="progress" style="display: none;">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="pb-2 pt-2">
                <button class="btn btn-primary w-100" id="btn-save">Save</button>
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
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('plugin/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('plugin/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('plugin/bootstrap/js/bootstrap.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('plugin/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('plugin/sb-admin-2.js'); ?>"></script>

    <!-- Datepicker -->
    <script src="<?= base_url('plugin/JqueryUI/jquery-ui.js') ?>"></script>

    <!-- Popper -->
    <script src="<?= base_url('plugin/popper.min.js') ?>"></script>

    <!-- Sweet Alert -->
    <script src="<?= base_url('plugin/sweetAlert2/sweetAlert2.min.js') ?>"></script>

    <!-- Costum JS -->
    <script type="text/javascript" src="<?= base_url('plugin/request.js') ?>"></script>
  </body>
</html> 