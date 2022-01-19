<?php
include "connect.php";

if(empty($_POST["username"]) || empty($_POST["password"]))  
  {            
	echo '<script>alert("Username dan Password Tidak Boleh Kosong!")</script>';  
  }  
else  
  {  
    $username = strtolower(mysqli_real_escape_string($connect, $_POST["username"]));  
    $password = mysqli_real_escape_string($connect, $_POST["password"]); 
    $password1 = mysqli_real_escape_string($connect, $_POST["password1"]); 
    $word = strtolower(mysqli_real_escape_string($connect, $_POST["word"])); 
    $query = mysqli_query($connect, "SELECT * FROM akun WHERE username = '$username'");  
    $result = mysqli_fetch_assoc($query);  
    if($username==$result["Username"])
      {
        if($word==$result["Word"])
          {
            $pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{4,10}$/';
            if(preg_match($pattern, $password))
            {
              if($password==$password1)  
              {
              $password = password_hash($password, PASSWORD_DEFAULT);
              $query = mysqli_query($connect,"UPDATE akun SET password = '$password' WHERE username = '$username'");
              if($query)
                {
                  echo "<script>
                              alert('PASSWORD BERHASIL DIRESET ٩(◕‿◕｡)۶ \\nSILAKAN LOG IN');
                              document.location.href='index.php';
                      </script>";
                }
              else{
                  echo "<script>
                              alert('PASSWORD GAGAL DIRESET o〒﹏〒o');
                              document.location.href='index.php';
                      </script>";
                  }
              }
              else{
                header("location:resetpw.php?pesan=salahpw");
              }
            }
            else{
              header("location:resetpw.php?pesan=pw");
            }
          }
          else
          {
            header("location:resetpw.php?pesan=salahw");
          }
       }
       else{
            header("location:resetpw.php?pesan=salahusn");
       }
}
?>
