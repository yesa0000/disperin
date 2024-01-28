<?php
require '../function.php';
require '../cek.php';

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

                        <a class="nav-link" href="produk.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Produk
                        </a>
                        <a class="nav-link" href="../logout.php">
                            Logout
                        </a>
                    </div>
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">

            <?php
                     if(isset($_SESSION["user"])) { 
                        $iduser = $_SESSION['user']['idAkun'];
                    }?>


            <!-- mulai disini -->
            <div class="io p-2">
                <h1>Industri Kecil Menengah</h1>
                <hr style="border:2px solid black; width:80%;">
            </div>
            <div class="row px-3 py-1 m-0">


                <?php
                    
                    $qry = $conn->query( "select * from ikm where idAkun = '$iduser'");
                    $row = $qry->fetch_assoc();
                        if($row == NULL)
                        
                        
                        {?>

                <div class="row justify-content-center">
                    <form class="mb-3 col-md-8" method="post" action="" enctype="multipart/form-data">
                        <div>
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">

                        </div>
                        <div class="mb-3">
                            <label for="namaBrand" class="form-label">Nama Brand</label>
                            <input type="text" class="form-control" name="namaBrand">
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo">
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori :</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <?php
                                $angkatan = $conn->query("select * from kategori");
                                while ($row = $angkatan->fetch_assoc()) :
                                ?>
                                <option value="<?php echo $row['idKategori'] ?>"><?php echo  $row['kategori'] ?>
                                </option>
                                <?php endwhile;?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tahunBerdiri" class="form-label">Tahun Berdiri</label>
                            <input type="month" class="form-control" name="tahunBerdiri">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat">
                        </div>
                        <div class="mb-3">
                            <label for="noTelp" class="form-label">No Telpon</label>
                            <input type="number" class="form-control" name="noTelp">
                        </div>

                        <button type="submit" class="btn btn-primary" name="tambahikmU">Submit</button>
                    </form>
                </div>
                <?php
                        }else{
                            $qry ="select * from ikm as i inner join kategori as k on i.idKategori = k.idKategori where idAkun = $iduser";
                            $mulai = mysqli_query($conn, $qry);
                            $row = mysqli_fetch_assoc($mulai);
                            ?>
                <div class="row justify-content-center">
                    <table class="table table-striped col-md-9">
                        <tr>
                            <td style="width: 10%;">nama</td>
                            <td><?=$row['namaPemilik']?></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">nama Brand</td>
                            <td><?=$row['namaBrand']?></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Kategori</td>
                            <td><?=$row['kategori']?></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">logo</td>
                            <td><img style="width:300px;" src="<?=$row['logo']?>" alt=""></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">tahun Berdiri</td>
                            <td><?=$row['tahunBerdiri']?></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">Alamat</td>
                            <td><?=$row['alamat']?></td>
                        </tr>
                        <tr>
                            <td style="width: 10%;">No Telpon</td>
                            <td><?=$row['noTelp']?></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="editikm.php?id=<?=$row['idIkm'];?>"><button
                                        class="btn btn-primary">Edit</button></a>
                            </td>

                        </tr>
                    </table>

                </div>


                <?php
                    } ?>
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



    <?php

if(isset($_POST['tambahikmU'])){
    $idAkun = $iduser;
    $namapemilik = $_POST['nama'];
    $namabrand = $_POST['namaBrand'];
    $kategori = $_POST['kategori'];
  
    $tahunBerdiri = $_POST['tahunBerdiri'];
    $alamat = $_POST['alamat'];
    $noTelp = $_POST['noTelp'];
    // hendel foto
    $logo = 'uploads/'.$_FILES["logo"]["name"];
    $logo_tmp = $_FILES["logo"]["tmp_name"];
    if(move_uploaded_file($logo_tmp, $logo)){
        echo "<script>alert('foto berhasil di upload')</script>";
    }else{
        echo "<script>alert('foto Gagal di upload')</script>";
    }
    
   
    
    $addtotable = mysqli_query($conn, "insert into ikm(idAkun,namaPemilik, namaBrand, idKategori, logo, tahunBerdiri, alamat, noTelp) values('$idAkun','$namapemilik', '$namabrand', '$kategori', '$logo', '$tahunBerdiri', '$alamat', '$noTelp')");
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