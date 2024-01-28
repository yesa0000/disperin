<?php
include '../function.php';
$conn->query("DELETE FROM produk WHERE idProduk='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='produk.php';</script>";

?>