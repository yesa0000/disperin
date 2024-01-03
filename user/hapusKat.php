<?php
include 'function.php';
$conn->query("DELETE FROM kategori WHERE idKategori='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='kategori.php';</script>";

?>