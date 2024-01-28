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
            <main>
                <?php
                     if(isset($_SESSION["user"])) { 
                        $iduser = $_SESSION['user']['idAkun'];
                        $qry = $conn->query( "select * from ikm where idAkun = '$iduser'");
                        $row = $qry->fetch_assoc();
                        if($row != null ){
                            $idIkm = $row['idIkm'];
                        }
                        
                    }?>
                <!-- mulai disini -->

                <?php
                    if($row == null){?>
                <h1 class="m-5"> ISI DATA IKM TERLEBIH DAHULU</h1>

                <?php
                    }else{
                        ?>
                <div class="io p-2">
                    <h1>Produk Brand</h1>
                    <hr style="border:2px solid black; width:80%;">
                </div>
                <div class="row px-3 py-1 m-0">
                    <button type="button" class="btn btn-success col-md-2 m-2" data-bs-toggle="modal"
                        data-bs-target="#tambah">Tambah</button>
                    <table class="table  table-striped">
                        <thead class="table-dark">

                            <!-- form data barang -->
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto Produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Nama Brand</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Deskripsi Produk</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $sql = mysqli_query($conn, "SELECT * FROM produk AS p INNER JOIN ikm AS i ON p.idIkm = i.idIkm WHERE p.idIkm = $idIkm");
                            $no = 1;
                            while ($data = mysqli_fetch_array($sql)) {
                                $namaproduk = $data['namaProduk'];
                                $idpro = $data['idProduk'];
                                $kategori = $data['kategori'];
                                $namaBrand = $data['namaBrand'];
                                $deskripsi = $data['deskripsiProduk'];
                                $fotoProduk = $data['fotoproduk'];

        ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><img src="<?=$fotoProduk ?>" alt="Foto Produk" style="max-width: 300px;"></td>
                                <td><?= $namaproduk; ?></td>
                                <td><?= $namaBrand; ?></td>
                                <td><?php
            $kategori_id = $data['idKategori'];
            $kategori_result = $conn->query("SELECT kategori FROM kategori WHERE idKategori = $kategori_id");
            $kategori_data = $kategori_result->fetch_assoc();
            echo $kategori_data['kategori'];
        ?></td>
                                <td><?= $deskripsi; ?></td>
                                <td>
                                    <a href="editPro.php?id=<?= $idpro; ?>"><button
                                            class="btn btn-primary">Edit</button></a>
                                    <a href="hapusPro.php?id=<?= $idpro; ?>"><button
                                            class="btn btn-danger">Hapus</button></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <?php
                    }
                    ?>
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

                <form method="post" action="" enctype="multipart/form-data" onsubmit="return showSuccessPopup()">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaproduk">Nama Produk :</label>
                            <input type="text" name="namaproduk" id="namaproduk" class="form-control" required>
                        </div>

                        <!-- Tambahkan input file untuk foto produk -->
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
                            <label for="kategori">Kategori :</label>
                            <select disabled name="kategori" class="form-control" required>
                                <?php
        // Ambil kategori yang telah dipilih sebelumnya (gantilah dengan ID kategori yang sesuai)
        $selectedCategoryId = $row['idKategori']; // Sesuaikan ini dengan ID kategori yang sesuai
        $result = $conn->query("SELECT * FROM kategori");

        
        // Cek apakah ada hasil dari query
        if ($result->num_rows > 0) {
            while ($kategori = $result->fetch_assoc()) {
                // Tandai opsi yang dipilih jika ID kategori sesuai
                $selected = ($kategori['idKategori'] == $selectedCategoryId) ? 'selected' : '';
                ?>

                                <option value="<?php echo $kategori['idKategori'] ?>" <?php echo $selected ?>>
                                    <?php echo $kategori['kategori'] ?>
                                </option>

                                <?php
            }
        }
        ?>
                            </select>
                        </div>


                        <button type="submit" class="btn btn-primary" name="tambahproS">Submit</button>
                    </div>
                </form>
          

            </div>
        </div>
    </div>
</body>
<?php



if (isset($_POST['tambahproS'])) {
    
    $namaproduk = $_POST['namaproduk'];
    $namabrand = $idIkm;
    $deskripsi = $_POST['deskripsi'];
    $kategori = $selectedCategoryId;
    
   

    // Pengaturan untuk menyimpan foto ke penyimpanan lokal
     if (!empty($_FILES["fotoproduk"]["name"])) {
        // Handle file upload
       $uploadDir = 'uploads/';  // Ganti dengan nama folder yang diinginkan
        $fotoProduk = $uploadDir . basename($_FILES['fotoproduk']['name']);
        move_uploaded_file($_FILES['fotoproduk']['tmp_name'],$fotoProduk);
    } else {
        // No new image uploaded, retain the old image
        $queryImage = "SELECT fotoproduk FROM produk WHERE idProduk='$_GET[id]'";
        $resultImage = mysqli_query($conn, $queryImage);
        $rowImage = mysqli_fetch_assoc($resultImage);
        $fotoProduk = $rowImage['fotoproduk'];
    }

    // Simpan informasi produk ke database
    $addtotable = mysqli_query($conn, "INSERT INTO produk(namaProduk, idIkm, deskripsiProduk, kategori, fotoproduk) VALUES ('$namaproduk', '$namabrand', '$deskripsi', '$kategori', '$fotoProduk')");

    if ($addtotable) {
        echo "<script>alert('Data berhasil di tambah')</script>";
        echo "<script>location='produk.php';</script>";
    } else {
          echo "<script>alert('Data gagal di tambah')</script>";
        echo "<script>location='produk.php';</script>";
    }
}
?>

</html>