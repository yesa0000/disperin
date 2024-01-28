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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

                    <h1>Produk</h1>
                    <hr style="border:2px solid black; width:80%;">
                </div>
                <div class="row px-3 py-1 m-0">
                    <button type="button" class="btn btn-success col-md-2 m-2" data-bs-toggle="modal"
                        data-bs-target="#tambah">Tambah</button>
                    <div class="col-md-3 ms-auto">
                    <form class="row justify-content-around" action="" method="GET">
                        
                            <input type="text" name="tblCari" id="tblCari" class="form-control col-md-8" placeholder="Search">
                            <button type="submit"  class="btn btn-primary col-md-3">Cari</button>
                       
                    </form>
                    <form action="cetak.php" method="GET" >
                            <?php
                             if(isset($_GET['tblCari'])){
                                $isi= "sss";
                                $_SESSION[$_GET['tblCari']] = $isi;
                             }else{
                                echo"TIdak ada";
                                die();
                             }
                            ?>
                        <button type="submit"  class="btn btn-primary col-md-3">Cari</button>
                    </form>
                    </div>
                   
                            <?php

                            
                            if(isset($_GET['tblCari'])){
                             
                                $kunci = $_GET['tblCari'];
                                if($kunci == null){
                                    $sql = mysqli_query($conn,"select * from produk as p inner join ikm as i on p.idIkm=i.idIkm inner join kategori as k on p.kategori=k.idKategori");
                                    
                                    
                                }else{
                                    $sql = mysqli_query($conn,"select * from produk as p inner join ikm as i on p.idIkm=i.idIkm inner join kategori as k on p.kategori=k.idKategori where namaProduk like '%$kunci%' OR k.kategori like '%$kunci%' OR i.namaBrand like '%$kunci%'");
                                }
                            }else{
                                 $sql = mysqli_query($conn,"select * from produk as p inner join ikm as i on p.idIkm=i.idIkm inner join kategori as k on p.kategori=k.idKategori");
                            }
                           
                            
                            

                            $no=1;
                            
                            if (mysqli_num_rows($sql)==0){

                                 ?>
                                    <div class="col-12 d-flex justify-content-center mt-5">
                                        <h1>Produk Tidak Ada</h1>
                                    </div>
                               <?php } else{
                               
                           
                           
                            ?>
                            
                             <table class="table  table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama Brand</th>
                                <th scope="col">Nama Owner</th>
                                <th scope="col">Logo Brand</th>
                                <th scope="col">Deskripsi Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">

                            <?php
                            
                           
                            while(
                                $data=mysqli_fetch_array($sql)){
                              
                               
                          
                                    
                                $namaproduk = $data['namaProduk'];
                                $idpro = $data['idProduk'];
                                $namaBrand = $data['namaBrand'];
                                $deskripsi= $data['deskripsiProduk'];
                                $kategori= $data['kategori'];
                                $namaPemilik = $data['namaPemilik'];
                                $logo = $data['fotoproduk'];


                              
                            
                          
                            ?>
                            
                            <tr>
                                <th><?=$no++?></th>
                                <td><?=$namaproduk;?></td>
                                <td><?=$namaBrand;?></td>
                                <td><?=$namaPemilik;?></td>
                                <td><img style="width:100px;" src="<?="user/". $logo?>"></td>
                                <td><?=$deskripsi;?></td>
                                <td><?=$kategori;?></td>



                                <td>
                                    <button class="btn btn-primary" data-bs-target="#detil<?=$idpro;?>" data-bs-toggle="modal">Detail</button>
                                    <a href="editPro.php?id=<?=$idpro;?>"><button
                                            class="btn btn-primary">Edit</button></a>
                                    <a href="hapusPro.php?id=<?=$idpro;?>"><button
                                            class="btn btn-danger">Hapus</button></a>
                                            

                                   <div class="modal fade" id="detil<?=$idpro;?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel"><?=$namaproduk;?></h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table>
                                                <tr>
                                                    <td style="width:40%;">Nama Brand</td>
                                                    <td><?=$namaBrand;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:40%;">Nama Pemilik</td>
                                                    <td><?=$namaPemilik;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:40%;">Kategori</td>
                                                    <td><?=$kategori;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:40%;">Deskripsi</td>
                                                    <td><?=$deskripsi;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="width:40%;">FOTO</td>
                                                    <td><img style="width:300px;" src="<?="user/". $logo?>"></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">

                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Hide this modal and show the first with the button below.
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

                                </td>
                            </tr>

                            
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php 
                     
                              
                            }
                    ?>
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
                <form method="post" action="function.php" enctype="multipart/form-data" >
                    <div class="modal-body">
                        <div class="form-grup">
                            <label for="namaproduk">Nama Produk :</label>
                            <input type="text" name="namaproduk" id="namaproduk" class="form-control" required>
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
                            <label for="fotoproduk" class="form-label">Foto Produk</label>
                            <input type="file" name="fotoproduk" id="fotoproduk" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi :</label>
                            <textarea type="text" name="deskripsi" id="deskripsi" class="form-control"
                                required></textarea>

                        </div>
                        <div class="form-group">

                            <label for="namabrand">Kategori :</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $baru = $conn->query("select * from kategori");
                                while ($pecah = $baru->fetch_assoc()) :
                                ?>
                                <option value="<?php echo $pecah['idKategori'] ?>"><?php echo  $pecah['kategori'] ?>
                                </option>
                                <?php endwhile;?>
                            </select>
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