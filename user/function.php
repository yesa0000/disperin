<?php
session_start();

//membuat koneksi ke database
$conn = mysqli_connect("localhost:3308","root","","dbdisperin");


if(isset($_POST['tambahkate'])){
    $kategori = $_POST['kategori'];
 
   
    
    $addtotable = mysqli_query($conn, "insert into kategori(kategori) values('$kategori')");
    if($addtotable){
        header('location:kategori.php');
    } else {
        echo 'Gagal';
        header('location:kategori.php');
    } 
         
};

if(isset($_POST['tambahpro'])){
    $namaproduk = $_POST['namaproduk'];
    $namabrand = $_POST['namabrand'];
    $deskripsi = $_POST['deskripsi'];

   
    
    $addtotable = mysqli_query($conn, "insert into produk(namaProduk, idIkm, deskripsiProduk) values('$namaproduk', '$namabrand', '$deskripsi')");
    if($addtotable){
        header('location:produk.php');
    } else {
        echo 'Gagal';
        header('location:produk.php');
    } 
         
};


// //Menambahkan barang masuk
// if(isset($_POST['barangmasuk'])){
//     $barangnya = $_POST['barangnya'];
//     $penerima = $_POST['penerima'];
//     $qty = $_POST['qty'];

//     $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
//     $ambildatanya = mysqli_fetch_array($cekstocksekarang);

//     $stocksekarang = $ambildatanya['Stock'];
//     $tambahkanstocksekarangdenganquantity = $stocksekarang + $qty;

//     $addtomasuk = mysqli_query($conn, "insert into masuk (idbarang, keterangan, qty) values('$barangnya','$penerima','$qty')");
//     $updatestockmasuk = mysqli_query($conn,"update stock set Stock=$tambahkanstocksekarangdenganquantity where idbarang='$barangnya'");
//     if($addtomasuk&$updatestockmasuk){
//         header('location:masuk.php');
//     } else {
//         echo 'Gagal';
//         header('location:masuk.php');
//     } 
// }


// //Menambahkan barang masuk
// if(isset($_POST['addbarangkeluar'])){
//     $barangnya = $_POST['barangnya'];
//     $penerima = $_POST['penerima'];
//     $qty = $_POST['qty'];

//     $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
//     $ambildatanya = mysqli_fetch_array($cekstocksekarang);

//     $stocksekarang = $ambildatanya['Stock'];
//     $tambahkanstocksekarangdenganquantity =$stocksekarang-$qty;
    

//     $addtokeluar = mysqli_query($conn, "insert into keluar (idbarang, penerima, qty) values('$barangnya','$penerima','$qty')");
//     $updatestockmasuk = mysqli_query($conn,"update stock set Stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
//     if($addtokeluar&$updatestockmasuk){
//         header('location:keluar.php');
//     } else {
//         echo 'Gagal';
//         header('location:keluar.php');
//     } 
// }


// //Update info barang
// if(isset($_POST['updatebarang'])) {
//     $idbarang = $_POST['idb'];
//     $Nama = $_POST['Nama'];
//     $fotoproduk = $_POST['FotoProduk'];
//     $namaproduk = $_POST['NamaProduk'];
//     $alamat = $_POST['Alamat'];
//     $notelpon = $_POST['NoTelpon'];
//     $jenisproduk = $_POST['JenisProduk'];
//     $asalkota = $_POST['AsalKota'];
//     $update = mysqli_query($conn, "update stock set Nama='$Nama', FotoProduk='$fotoproduk', NamaProduk='$namaproduk', Alamat='$alamat', NoTelpon='$notelpon', JenisProduk='$jenisproduk', AsalKota='$asalkota' where idbarang='$idbarang'");
//     if($update) {
        
//         header('location:index.php');
//     } else {
//         echo 'Gagal';
//         header('location:index.php');
//     }
// }


// //Menghapus barang dari stock
// if(isset($_POST['hapusbarang'])){ 
//     $idb = $_POST['idb'];

//     $hapus = mysqli_query($conn,"delete from stock where idbarang='$idb'");
//     if($hapus){
//         header('location:index.php');
//     } else {
//         echo 'Gagal';
//         header('location:index.php');
//     }
// };







// //Mengubah data barang keluar
// if(isset($_POST['updatebarangkeluar'])){
//     $idb = $_POST['idb'];
//     $idk = $_POST['idk'];
//     $penerima = $_POST['penerima'];
//     $qty = $_POST['qty'];

//     $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
//     $stocknya = mysqli_fetch_array($lihatstock);
//     $stockskrg = $stocknya['Stock'];

//     $qtyskrg = mysqli_query($conn, "select * from keluar where idkeluar='$idk'");
//     $qtynya = mysqli_fetch_array($qtyskrg);
//     $qtyskrg = $qtynya['qty'];

//     if($qty>$qtyskrg){
//         $selisih = $qty-$qtyskrg;
//         $kurangin = $stockskrg - $selisih;
//         $kurangistocknya = mysqli_query($conn, "update stock set Stock='$kurangin' where idbarang='$idb'");
//         $updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
//             if($kurangistocknya&&$updatenya){
//                 header('location:keluar.php');
//                 } else {
//                     echo 'Gagal';
//                     header('location:keluar.php');
//             }
//     } else {   
//         $selisih = $qtyskrg-$qty;
//         $kurangin = $stockskrg + $selisih;
//         $kurangistocknya = mysqli_query($conn, "update stock set Stock='$kurangin' where idbarang='$idb'");
//         $updatenya = mysqli_query($conn,"update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");
//             if($kurangistocknya&&$updatenya){
//                 header('location:keluar.php');
//                 } else {
//                     echo 'Gagal';
//                     header('location:keluar.php');
//             } 
//     }

// }


// //Menghapus barang keluar
// if(isset($_POST['hapusbarangkeluar'])){
//     $idb = $_POST['idb'];
//     $qty = $_POST['kty'];
//     $idk = $_POST['idk'];

//     $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
//     $data = mysqli_fetch_array($getdatastock);
//     $stock = $data['Stock'];

//     $selisih = $stock-$qty;

//     $update = mysqli_query($conn, "update stock set Stock='$selisih' where idbarang='$idb'");
//     $hapusdata = mysqli_query($conn, "delete from keluar where idkeluar='$idk'");

//     if($update&&$hapusdata){
//         header('location;keluar.php');
//     } else {
//         header('location;keluar.php');

//     }

// }


?>