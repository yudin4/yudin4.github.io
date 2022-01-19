<?php
    session_start(); 
    include 'connect.php';
    if(isset($_POST['submit'])){
        $username = $_POST['Username'];
        $id = $_POST['Id'];
        $nama = $_POST['Nama'];
        $jabatan = $_POST['Jabatan'];
        $word = $_POST['Word'];

        $allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['Foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['Foto']['size'];
		$fileTemp 			= $_FILES['Foto']['tmp_name'];
		$base 				= basename ($fileName);
		$foto   			= str_replace(' ','_',$base);

        if($_FILES['Foto']['size']>0){
            if(in_array($fileExt, $allowExt) === true){
                if($fileSize < 5000000){			
                    if(move_uploaded_file($fileTemp, 'account/'.$foto))
                      {
                        $query = mysqli_query($connect,"UPDATE akun SET Foto = '$foto'
                                                WHERE Username = '$username'");
                        if($query){
                            if($_SESSION['Kode']=='1')
                              {
                                echo "<script>
                                            alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                                            document.location.href='adminpage.php';
                                    </script>";
                              }
                            elseif($_SESSION['Kode']=='2')
                             {
                                echo "<script>
                                            alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                                            document.location.href='userpage.php';
                                    </script>";
                             }
                        }
                        else{
                            echo "<script>
                                    alert('DATA GAGAL DIUPDATE o〒﹏〒o');
                                    document.location.href='editpfpage.php?usn=$username';
                             </script>";
                        }
                    }
                    else{
                        echo "<script>
                                    alert('GAMBAR GAGAL DISIMPAN o〒﹏〒o');
                                    document.location.href='editpfpage.php?usn=$username';
                             </script>";
                    }
                }
                else{
                    echo "<script>
                                    alert('UKURAN GAMBAR TERLALU BESAR o〒﹏〒o');
                                    document.location.href='editpfpage.php?usn=$username';
                        </script>";
                }
            }
            else{
                echo "<script>
                                    alert('EKSTENSI GAMBAR TERLARANG o〒﹏〒o');
                                    document.location.href='editpfpage.php?usn=$username';
                     </script>";
            }
        }
        else{
            $query = mysqli_query($connect,"UPDATE akun SET 
                                        ID = '$id',Nama = '$nama',
                                        Jabatan = '$jabatan', Word = '$word'
                                    WHERE Username = '$username'");
            if($query){
                if($_SESSION['Kode']=='1')
                  {
                    echo "<script>
                                alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                                document.location.href='adminpage.php';
                        </script>";
                  }
                elseif($_SESSION['Kode']=='2')
                 {
                    echo "<script>
                                alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                                document.location.href='userpage.php';
                        </script>";
                 }
            }
            else{
                echo "<script>
                        alert('DATA GAGAL DIUPDATE o〒﹏〒o');
                        document.location.href='editpfpage.php?usn=$username';
                    </script>";
            }
        }
    }

?>