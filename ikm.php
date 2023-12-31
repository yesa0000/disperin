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
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
            
                  
                   
                    <!-- mulai disini -->
                <div class="io p-2">    
                    <h1>Industri Kecil Menengah</h1>
                    <hr  style="border:2px solid black; width:80%;">
                </div>
                <div class="row px-3 py-1 m-0">
                    <button type="button" class="btn btn-success col-md-2 m-2" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                    <table class="table  table-striped">
                        <thead class="table-dark">
                            <tr>
                        
                            <th >No</th>
                            <th >Nama Pemilik</th>
                            <th >Nama Brand</th>
                            <th >Kategori</th>
                            <th >Logo</th>
                            <th >Tahun Berdiri</th>
                            <th >Alamat</th>
                            <th >No. Telpon</th>
                            <th >Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <?php
                            $sql = mysqli_query($conn,"select * from ikm as i inner join kategori as k on i.idKategori = k.idKategori");
                    
                            $no=1;
                            while($data=mysqli_fetch_array($sql)){
                            
                            
                                $namapemilik = $data['namaPemilik'];
                                $namabrand = $data['namaBrand'];
                                $logo= $data['logo'];
                                $kategori= $data['kategori'];
                                $tahunberdiri = $data['tahunBerdiri'];
                                $alamat = $data['alamat'];
                                $notelp = $data['noTelp'];
                                $idikm = $data['idIkm'];
                              
                           

                            ?>
                            <tr>
                            <th ><?=$no++?></th>
                            <td><?=$namapemilik;?></td>
                            <td><?=$namabrand;?></td>
                            <td><?=$kategori;?></td>
                            <td><?=$logo;?></td>
                            <td><?=$tahunberdiri;?></td>
                            <td><?=$alamat;?></td>
                            <td><?=$notelp;?></td>
                            <td>
                                <a href="editikm.php?id=<?=$idikm;?>"><button class="btn btn-primary">Edit</button></a>
                                <a href="hapusikm.php?id=<?=$idikm;?>"><button class="btn btn-danger">Hapus</button></a>
                                
                                </form>

                            </td>
                        </tr>
                          <?php }?>      
                          
                        </tbody>
                    </table>
                </div>
                    <!-- akhir disini -->
              
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
       <!--MODAL -->


<!-- The Modal -->
<div class="modal" id="tambah">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                                                    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Barang</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                                            
            <!-- Modal body -->
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-body">
                <div class="form-grup">
                <label for="namapemilik">Nama Pemilik :</label>
                <input type="text" name="namapemilik" id="namapemilik"  class="form-control" required>
                </div>
                <div class="form-group">
                <label for="namabrand">Nama Brand :</label>
                <input type="text" name="namabrand" id="namabrand" class="form-control" required>
                </div>

                <div class="form-group">
           
                <label for="kategori">Kategori :</label>
                <select name="kategori" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <?php
                    $angkatan = $conn->query("select * from kategori");
                    while ($row = $angkatan->fetch_assoc()) :
                    ?>
                        <option value="<?php echo $row['idKategori'] ?>"><?php echo  $row['kategori'] ?></option>
                    <?php endwhile;?>
                </select>
           </div>
                <div class="form-group">
                <label for="logo">Logo :</label>
                <input type="file" name="logo" id="logo"  class="form-control" required>
                </div>
               
                <div class="form-group">
                <label for="tahunberdiri">Tahun Berdiri :</label>
                <input type="month" name="tahunberdiri" id="tahunberdiri" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" id="alamat"  class="form-control" required>
                </div>
                <div class="form-group">
                <label for="notelp">NO. Telpon :</label>
                <input type="text" name="notelp" id="notelp" class="form-control" required>
                </div>
                
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-primary" name="tambahikm">Submit</button>
                </div>
            </form>
                            
        </div>
    </div>
</div>
<?php
if(isset($_POST['tambahikm'])){
    $namapemilik = $_POST['namapemilik'];
    $namabrand = $_POST['namabrand'];
    $kategori = $_POST['kategori'];
  
    $tahunberdiri = $_POST['tahunberdiri'];
    $alamat = $_POST['alamat'];
    $notelp = $_POST['notelp'];
    // hendel foto
    $logo = $_FILES["logo"]["name"];
    $logo_tmp = $_FILES["logo"]["tmp_name"];
    if(move_uploaded_file($logo_tmp, "upload/$logo")){
        echo "<script>alert('foto berhasil di upload')</script>";
    }else{
        echo "<script>alert('foto Gagal di upload')</script>";
    }
    
   
    
    $addtotable = mysqli_query($conn, "insert into ikm(namaPemilik, namaBrand, idKategori, logo, tahunBerdiri, alamat, noTelp) values('$namapemilik', '$namabrand', '$kategori', '$logo', '$tahunberdiri', '$alamat', '$notelp')");
    if($addtotable){
        echo "<script>alert('Data berhasil di tambah')</script>";
        echo "<script>location='ikm.php';</script>";
    } else {
        echo "<script>alert('Data Gagal di tambah')</script>";
        echo "<script>location='ikm.php';</script>";
    } 
         
};
?>
</body>
</html>
