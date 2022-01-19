<?php 
include('connect.php');

$Kode = $_GET["id"];
$hasil = mysqli_multi_query($koneksi,"DELETE FROM barang_masuk WHERE Kode='$Kode'");

if($hasil){
	header("location:index.php?berhasil");
} 
else{
	header("location:index.php?gagal");
}
?>