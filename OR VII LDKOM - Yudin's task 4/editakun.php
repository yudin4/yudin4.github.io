<?php
    session_start(); 
    include 'connect.php';
    if(empty($_POST['Level']))  
  {            
	echo '<script>alert("Pilih salah satu!")</script>';  
  } 
  else{
    if(isset($_POST['submit'])){
        $kategori = $_POST['Username'];
        $level = $_POST['Level'];
        if($level==1)
            {
                $kode = 1;
            }
        elseif($level==2)
            {
                $kode = 2;
            }
            $query = mysqli_query($connect,"UPDATE akun SET Kode = $kode WHERE Username = '$username'");
            if($query)
            {
                echo "<script>
                        alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                        document.location.href='akunpage.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('DATA GAGAL DIUPDATE o〒﹏〒o');
                        document.location.href='editakunpage.php?usn=$username';
                    </script>";
            }
        }
    }

?>