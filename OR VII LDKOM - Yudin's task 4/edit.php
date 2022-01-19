<?php
    session_start(); 
    include 'connect.php';
    if(empty($_POST['Kategori']) || empty($_POST['Jumlah'])|| empty($_POST['Keterangan']) || empty($_POST['Tanggal']) )  
  {            
	echo '<script>alert("Tidak Boleh Ada yang Kosong!")</script>';  
  } 
  else{
    if(isset($_POST['submit'])){
        $kategori = $_POST['Kategori'];
        $jumlah = $_POST['Jumlah'];
        $keterangan = $_POST['Keterangan'];
        $tanggal = $_POST['Tanggal'];

        $allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['Bukti']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['Bukti']['size'];
		$fileTemp 			= $_FILES['Bukti']['tmp_name'];
		$base 				= basename ($fileName);
		$bukti   			= str_replace(' ','_',$base);

        if($_FILES['Bukti']['size']>0){
            if(in_array($fileExt, $allowExt) === true){
                if($fileSize < 5000000){			
                    if(move_uploaded_file($fileTemp, 'proofs/'.$bukti))
                      {
                        if($kategori==1)
                        {
                            $debet = $_POST['Jumlah'];
                            $ketd = $_POST['Keterangan'];
                            $kredit = 0;
                            $ketk = '-';
                            
                        }
                        elseif($kategori==2)
                        {
                            $debet = 0;
                            $ketd = '-';
                            $kredit = $_POST['Jumlah'];
                            $ketk = $_POST['Keterangan'];
                            
                        }
                        $query = mysqli_query($connect,"UPDATE kas SET 
                                                    Debet = $debet, KetD = '$ketd',
                                                    Kredit = $kredit, KetK = '$ketk',
                                                    Bukti = '$bukti'
                                                WHERE Tanggal = '$tanggal'");
                        if($query){
                            echo "<script>
                                        alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                                        document.location.href='adminpage.php';
                                 </script>";
                        }
                        else{
                            echo "<script>
                                    alert('DATA GAGAL DIUPDATE o〒﹏〒o');
                                    document.location.href='editpage.php?tgl='$tanggal'';
                             </script>";
                        }
                    }
                    else{
                        echo "<script>
                                    alert('GAMBAR GAGAL DISIMPAN o〒﹏〒o');
                                    document.location.href='editpage.php?tgl=$tanggal';
                             </script>";
                    }
                }
                else{
                    echo "<script>
                                    alert('UKURAN GAMBAR TERLALU BESAR o〒﹏〒o');
                                    document.location.href='editpage.php?tgl=$tanggal';
                        </script>";
                }
            }
            else{
                echo "<script>
                                    alert('EKSTENSI GAMBAR TERLARANG o〒﹏〒o');
                                    document.location.href='editpage.php?tgl=$tanggal';
                     </script>";
            }
        }
        else{
            if($kategori==1)
            {
                $debet = $jumlah;
                $ketd = $keterangan;
                $kredit = 0;
                $ketk = '-';
                
            }
            elseif($kategori==2)
            {
                $debet = 0;
                $ketd = '-';
                $kredit = $jumlah;
                $ketk = $keterangan;
                
            }
            $query = mysqli_query($connect,"UPDATE kas SET 
                                        Debet = $debet, KetD = '$ketd',
                                        Kredit = $kredit, KetK = '$ketk'
                                    WHERE Tanggal = '$tanggal'");
            if($query){
                echo "<script>
                        alert('DATA BERHASIL DIUPDATE ٩(◕‿◕｡)۶');
                        document.location.href='adminpage.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('DATA GAGAL DIUPDATE o〒﹏〒o');
                        document.location.href='editpage.php?tgl=$tanggal';
                    </script>";
            }
        }
    }
}

?>