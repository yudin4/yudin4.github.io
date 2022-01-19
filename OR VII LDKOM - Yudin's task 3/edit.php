<?php
    include 'connect.php';

    if(isset($_POST['submit'])){
        $Kode = $_POST['Kode'];
        $Nama = $_POST['Nama'];
        $Tanggal = $_POST['Tanggal'];
        $Kategori = $_POST['Kategori'];
        $Kondisi = $_POST['Kondisi'];
        $Jumlah = $_POST['Jumlah'];

        $allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['Gambar']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['Gambar']['size'];
		$fileTemp 			= $_FILES['Gambar']['tmp_name'];
		$base 				= basename ($fileName);
		$Gambar 			= str_replace(' ','_',$base);


        if($_FILES['Gambar']['size']>0){
            if(in_array($fileExt, $allowExt) === true){
                if($fileSize < 5000000){			
                    if(move_uploaded_file($fileTemp, 'assets/'.$Gambar)){
                        $query = mysqli_query($koneksi,"UPDATE barang_masuk SET 
                            Kode = '$Kode',
			                Nama = '$Nama',
			                Tanggal = '$Tanggal',
			                Kategori = '$Kategori',
			                Kondisi = '$Kondisi',
			                Jumlah = '$Jumlah',
                            Gambar = '$Gambar' 
			                WHERE Kode = '$Kode'");
                        if($query){
                            echo "<script>
                                        alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                                        document.location.href='index.php';
                                 </script>";
                        }
                        else{
                            echo "<script>
                                    alert('DATA GAGAL DIUPDATE o〒﹏〒o');
                                    document.location.href='index.php';
                             </script>";
                        }
                    }
                    else{
                        echo "<script>
                                    alert('GAMBAR GAGAL DISIMPAN o〒﹏〒o');
                                    document.location.href='editpage.php?id=$Kode';
                             </script>";
                    }
                }
                else{
                    echo "<script>
                                    alert('UKURAN GAMBAR TERLALU BESAR o〒﹏〒o');
                                    document.location.href='editpage.php?id=$Kode';
                        </script>";
                }
            }
            else{
                echo "<script>
                                    alert('EKSTENSI GAMBAR TERLARANG o〒﹏〒o');
                                    document.location.href='editpage.php?id=$Kode';
                     </script>";
            }
        }
        else{
            $query = mysqli_query($koneksi,"UPDATE barang_masuk SET 
            Kode = '$Kode',
			                Nama = '$Nama',
			                Tanggal = '$Tanggal',
			                Kategori = '$Kategori',
			                Kondisi = '$Kondisi',
			                Jumlah = '$Jumlah'
			                WHERE Kode = '$Kode'");

            if($query){
                echo "<script>
                        alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                        document.location.href='index.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('DATA GAGAL DIUPDATE o〒﹏〒o');
                        document.location.href='index.php';
                    </script>";
            }
        }
    }

?>