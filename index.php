<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Aplikasi Sistem Informasi Surat Perintah Perjalanan Dinas (SPPD)</title>

        <!-- Custom fonts for this template-->
        <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

        <!-- Custom styles for this template-->
        <link href="assets/css/sb-admin-2.min.css" rel="stylesheet" />
    </head>

    <body class="bg-gradient-warning">
        <div class="container py-5">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-5 col-md-9">
                    <div class="text-white text-center font-weight-bold" style="font-size: 60px;"><i class="fas fa-fw fa-envelope"></i></div>
                    <h3 class="text-white text-center font-weight-bold">Aplikasi Sistem Informasi Surat Perintah Perjalanan Dinas (SPPD)</h3>
					<h3 class="text-white text-center font-weight-bold">DPPP Kota Palopo</h3>
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Login Account</h1>
                                        </div>
										<?php 
										$log= isset($_GET['log']) ? $_GET['log'] : "";
										if ($log == 2) {
											echo "<div class='alert alert-danger text-center'>Login gagal, silahkan coba kembali</div>";
										}elseif ($log == 1) {
											echo "<div class='alert alert-danger text-center'>Anda belum login</div>";
										}
										 ?>
                                        <form class="user" action="cek_login.php" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off" required />
                                            </div>
											<div class="form-group">
												<select name="tipe" id="tipe" class="custom-select" required>
													<option value="">--Pilih Level--</option>
													<option value="operator">Operator</option>
													<option value="kabag">Kadis</option>
													<option value="kabag">Sekdis</option>
													<option value="user">Pegawai</option>
												</select>
											</div>
                                            <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-fw fa-sign-in-alt mr-1"></i> Masuk</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>
    </body>
</html>

