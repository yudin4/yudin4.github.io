<?php 
include('connect.php');

$Tanggal = $_GET["tgl"];
$del = mysqli_multi_query($connect,"DELETE FROM kas WHERE Tanggal='$Tanggal'");

if($del){
	header("location:adminpage.php?delete");
} 
else{
	header("location:adminpage.php?fail");
}
?>