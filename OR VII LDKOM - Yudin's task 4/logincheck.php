<?php
//mulai session
session_start(); 
include "connect.php";

$Username=$_GET['usn'];

//validasi manual kolom input username dan password
if(empty($_POST["Username"]) || empty($_POST["Password"]))  
{            
	echo '<script>alert("Username dan Password Tidak Boleh Kosong!")</script>';  
}  
else  
{  
    //menangkap data dari form login, menggunakan mysqli_real_escape_string
	//untuk mengamankan karakter
    
    $Username = strtolower(mysqli_real_escape_string($connect, $_POST["Username"]));  
    $Password = mysqli_real_escape_string($connect, $_POST["Password"]); 

    //select data sesuai dengan username yang dikirim
    $select = mysqli_query($connect, "SELECT * FROM akun WHERE Username = '$Username'");  
    //mengambil data dari db dan disimpan di variabel $result
    $result = mysqli_fetch_assoc($select);  
	
    //membandingkan password yang dikirim dengan password di db menggunakan
    if($Username==$result["Username"])
    {
        //fungsi password_verify
        if(password_verify($Password, $result["Password"]))  
        {   
            //cek level yang login apakah admin atau user 
            if($result['Kode']=="1")
            {
                // simpan data ke variabel session 
                $_SESSION['Username'] = $Username;
                $_SESSION['Kode'] = "1";
                // alihkan ke halaman dashboard admin
                header("location:adminpage.php");
            }
            else if($result['Kode']=="2")
            {
                $_SESSION['Username'] = $Username;
                $_SESSION['Kode'] = "2";
                header("location:userpage.php");
            }
            else
            {
                $_SESSION['usn'] = $Username;
                $_SESSION['pw'] = $Password;
                header("location:index.php?pesan=gagal");
            }
        }
        else
        {
            
					$_SESSION['usn'] = $Username;
					$_SESSION['pw'] = $Password;
            header("location:index.php?pesan=salahpw");  
        } 
    }
    else{
        
					$_SESSION['usn'] = $Username;
					$_SESSION['pw'] = $Password;
        header("location:index.php?pesan=salahusn");
    }
}  