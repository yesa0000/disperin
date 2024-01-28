<?php

require 'function.php';
require 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Dinas Perindustrian</a>
            <!-- Sidebar Toggle-->
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="beranda.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-house"></i></div>
                                BERANDA
                            </a>
                            <a class="nav-link" href="ikm.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Industri Kecil Menengah
                            </a>
                            <a class="nav-link" href="kategori.php"> 
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kategori
                            </a>
                            <a class="nav-link" href="produk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Produk
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                
                    <?php
                        if(isset($_SESSION["user"])) { 
                            $namah1 = $_SESSION['user']['nama'];
                        }
                        $query= mysqli_query($conn,"SELECT * FROM ikm");
                        $ikm= mysqli_num_rows($query);
                        
                        $query= mysqli_query($conn,"SELECT * FROM kategori");
                        $kategori= mysqli_num_rows($query);

                        $query= mysqli_query($conn,"SELECT * FROM produk");
                        $produk= mysqli_num_rows($query);
                    ?>
                        <h1 class="m-4">Selamat datang <?=$namah1;?></h1>
                    <div class="row p-5 justify-content-around m-0">
                        <div class="col-md-3 ">
                            <div class="card bg-dark text-light" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah IKM </h5>
                                    <h4 class="card-subtitle mb-2 text-body-secondary"><?=$ikm?></h4>
                                    <a href="ikm.php" class="card-link">Kunjungi</a>
                          
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="card bg-dark text-light" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Kategori</h5>
                                    <h4 class="card-subtitle mb-2 text-body-secondary"><?=$kategori?></h4>
                                    <a href="kategori.php" class="card-link">Kunjungi</a>
                          
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="card bg-dark text-light" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Jumlah Produk</h5>
                                    <h4 class="card-subtitle mb-2 text-body-secondary"><?=$produk?></h4>
                                    <a href="produk.php" class="card-link">Kunjungi</a>
                          
                                </div>
                            </div>
                        </div>
                    </div>
                        
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>

                                        <!-- The Modal -->
                                        <div class="modal" id="myModal">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                        
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Tambah Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                <div class="form-grup">
                                                 <label for="Nama">Nama:</label>
                                                <input type="text" name="Nama" id="nama"  class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="FotoProduk">Foto Produk:</label>
                                                <input type="file" name="FotoProduk" id="FotoProduk" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="NamaProduk">Nama Produk:</label>
                                                <input type="text" name="NamaProduk" id="NamaProduk"  class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="Alamat">Alamat:</label>
                                                <input type="text" name="Alamat" id="Alamat"  class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="JenisProduk">Jenis Produk:</label>
                                                <input type="text" name="JenisProduk" id="JenisProduk" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="NoTelpon">NO Telpon:</label>
                                                <input type="text" name="NoTelpon" id="NoTelpon" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                <label for="AsalKota">Asal Kota:</label>
                                                <input type="text" name="AsalKota" id="AsalKotra" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                </div>
                                                <button type="submit" class="btn btn-primary" name="addnewbarang">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                                    
</body>
</html>
