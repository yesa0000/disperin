<?php
include 'function.php';
$conn->query("DELETE FROM ikm WHERE idikm='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='ikm.php';</script>";

?>