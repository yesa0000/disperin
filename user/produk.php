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
                <main>
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
                            <th scope="col">No</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Nama Brand</th>
                            <th scope="col">Deskripsi Produk</th>
                            <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                        <?php
                            $sql = mysqli_query($conn,"select * from produk as p inner join ikm as i on p.idIkm=i.idIkm");
                            

                            $no=1;
                            while($data=mysqli_fetch_array($sql)){
                            
                                $namaproduk = $data['namaProduk'];
                                $idpro = $data['idProduk'];
                                $namaBrand = $data['namaBrand'];
                                $deskripsi= $data['deskripsiProduk'];
                            
                              

                            ?>
                            <tr>
                            <th ><?=$no++?></th>
                            <td><?=$namaproduk;?></td>
                            <td><?=$namaBrand;?></td>
                            
                            <td><?=$deskripsi;?></td>

                            <td>
                                <a href="editPro.php?id=<?=$idpro;?>"><button class="btn btn-primary">Edit</button></a>
                                <a href="hapusPro.php?id=<?=$idpro;?>"><button class="btn btn-danger">Hapus</button></a>
                                
                                </form>

                            </td>
                        </tr>
                          <?php }?>   
                        </tbody>
                    </table>
                </div>
                    <!-- akhir disini -->
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
       
<!-- The Modal -->
<div class="modal" id="tambah">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
                                                    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Produk</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                                            
            <!-- Modal body -->
            <form method="post" action="function.php">
                <div class="modal-body">
                <div class="form-grup">
                <label for="namaproduk">Nama Produk :</label>
                <input type="text" name="namaproduk" id="namaproduk"  class="form-control" required>
                </div>
                <div class="form-group">
           
                <label for="namabrand">Nama Brand :</label>
                <select name="namabrand" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php
                            $angkatan = $conn->query("select * from ikm");
                            while ($row = $angkatan->fetch_assoc()) :
                            ?>
                                <option value="<?php echo $row['idIkm'] ?>"><?php echo  $row['namaBrand'] ?></option>
                            <?php endwhile;?>
                        </select>
                </div>
            
                <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <textarea type="text" name="deskripsi" id="deskripsi"  class="form-control" required></textarea>
                </div>
               
                
                <div class="form-group">
                </div>
                <button type="submit" class="btn btn-primary" name="tambahpro">Submit</button>
                </div>
            </form>
                            
        </div>
    </div>
</div>
</body>
</html>
