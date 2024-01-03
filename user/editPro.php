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

        <link href="../css/styles.css" rel="stylesheet" />
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
$ambil = $conn->query("SELECT * FROM produk WHERE idProduk='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="row m-0">
    <div class="col-md-12 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ubah Produk</h6>
            </div>
            <div class="card-body">
                <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   
                    <div class="form-group">
                        <label class="control-label">Nama Pemilik</label>
                        <input type="text" name="namaProduk" class="form-control" value="<?= $data['namaProduk'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Nama Brand</label>
                        <select name="namaBrand" class="form-control" required>
                            
                            <?php
                            $ikm = $conn->query("SELECT * FROM ikm");
                            while ($row = $ikm->fetch_assoc()) :
                            ?>
                                <option value="<?php echo $row['idIkm'] ?>" <?= $row['idIkm'] == $data['idIkm'] ? 'selected' : ''; ?>><?php echo  $row['namaBrand'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Deskripsi</label>
                        <input type="text" name="deskripsiProduk" class="form-control" value="<?= $data['deskripsiProduk'] ?>" required>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <br>
                            <button class="btn btn-primary float-right" name="simpan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST["simpan"])) {
  
    $namaProduk = $_POST['namaProduk'];
    $namaBrand = $_POST['namaBrand'];
    $deskripsi = $_POST['deskripsiProduk'];



    // Check if a new image is uploaded
    // if (!empty($_FILES["foto_ktm_update"]["name"])) {
    //     // Handle file upload
    //     $foto_ktm = $_FILES["foto_ktm_update"]["name"];
    //     $foto_ktm_tmp = $_FILES["foto_ktm_update"]["tmp_name"];
    //     move_uploaded_file($foto_ktm_tmp, "upload/" . $foto_ktm);
    // } else {
    //     // No new image uploaded, retain the old image
    //     $queryImage = "SELECT foto_ktm FROM mahasiswa WHERE idmahasiswa='$_GET[id]'";
    //     $resultImage = mysqli_query($koneksi, $queryImage);
    //     $rowImage = mysqli_fetch_assoc($resultImage);
    //     $foto_ktm = $rowImage['foto_ktm'];
    // }
    $sql = "UPDATE produk SET
       
            
                namaProduk = '$namaProduk',
                deskripsiProduk = '$deskripsi',
                idIkm = '$namaBrand'
         
            WHERE idProduk = '$_GET[id]'";
    $conn->query($sql) or die(mysqli_error($conn));

    echo "<script>alert('Data berhasil di ubah')</script>";
    echo "<script>location='produk.php';</script>";
}
?> 




                
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

                                  
                                    
</body>
</html>
  <!-- <div class="form-group">
                        <label class="control-label">Alamat</label>
                        <select name="idangkatan" class="form-control" required>
                            <option value="">-- Pilih --</option>
                        
                    </div> -->