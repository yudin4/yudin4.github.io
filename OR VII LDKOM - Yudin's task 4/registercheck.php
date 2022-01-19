<?php
include("connect.php");
session_start(); 
//validasi manual username dan password
if(empty($_POST["username"]) || empty($_POST["password"]))  
	{  
		echo '<script>alert("Username dan Password Tidak Boleh Kosong")</script>';  
	}  
else  
	{  
		//menangkap data dari form register, menggunakan mysqli_real_escape_string
		//untuk mengamankan karakter
		$nama = mysqli_real_escape_string($connect, $_POST["nama"]);  
		$word = strtolower(mysqli_real_escape_string($connect, $_POST["word"]));  
		$username = strtolower(mysqli_real_escape_string($connect, $_POST["username"]));  
		$password = mysqli_real_escape_string($connect, $_POST["password"]); 
		$password1 = mysqli_real_escape_string($connect, $_POST["password1"]);
		//level diberi manual, bisa diganti jadi user atau admin

		//fungsi hash untuk menyamarkan password
		
		//query insert
		$query = mysqli_query($connect, "SELECT * FROM akun WHERE Username = '$username'");  
		//mengambil data dari db dan disimpan di variabel $result
		$result = mysqli_fetch_assoc($query);  

		if($username!=$result['Username'])
		{
			$pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{4,10}$/';
			if(preg_match($pattern, $password))
			{
				if($password==$password1)
				{
					$kode=2;
					$password = password_hash($password, PASSWORD_DEFAULT);  
					$query = mysqli_query($connect, "INSERT INTO akun (Nama,Username,Kode,Word,Password) VALUES('$nama','$username','$kode','$word','$password')");  
					if($query)  
						{  
						//jika berhasil diarahkan ke halaman login dengan pesan sukses
						header("location:index.php?pesan=sukses");
						session_destroy();
						}
					else
						{
						$_SESSION['usn'] = $username;
						$_SESSION['nama'] = $nama;
						$_SESSION['sw'] = $word;
						$_SESSION['pw'] = $password;
						$_SESSION['pw1'] = $password1;
						echo "<script>
						alert('Registrasi Akun GAGAL! \\nCOBA LAGI ٩(T‿T｡)۶');
	 					</script>";
						header("location:register.php?pesan=gagal");
						}
				}  
				else
				{
					$_SESSION['usn'] = $username;
					$_SESSION['nama'] = $nama;
					$_SESSION['sw'] = $word;
					$_SESSION['pw'] = $password;
					$_SESSION['pw1'] = $password1;
					header("location:register.php?pesan=gagalpw1");
				}
			} 
			else 
			{
				$_SESSION['usn'] = $username;
				$_SESSION['nama'] = $nama;
				$_SESSION['sw'] = $word;
				$_SESSION['pw'] = $password;
				$_SESSION['pw1'] = $password1;
				header("location:register.php?pesan=gagalpw");
			}
		}
		else
		{
			$_SESSION['usn'] = $username;
			$_SESSION['nama'] = $nama;
			$_SESSION['sw'] = $word;
			$_SESSION['pw'] = $password;
			$_SESSION['pw1'] = $password1;
			header("location:register.php?pesan=gagalusn");
		}
	} 

?>