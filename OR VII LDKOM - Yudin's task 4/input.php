<?php
    include "connect.php";
    
    $Kategori = $_POST['Kategori'];
    $Jumlah= $_POST['Jumlah'];
    $Keterangan = $_POST['Keterangan'];

    $eallowed_exts= array('png','jpg','jpeg');
    $Bukti = $_FILES['Bukti']['name'];
    $x = explode('.', $Bukti);
    $ext = strtolower(end($x));
    $ukuran	= $_FILES['Bukti']['size'];
    $file_tmp = $_FILES['Bukti']['tmp_name'];	

    if(in_array($ext, $eallowed_exts) === true){
        if($ukuran < 5000000)
        {	
            date_default_timezone_set('Asia/Jakarta');
            $Tanggal = date('Y-m-d H:i:s');	 
            move_uploaded_file($file_tmp, 'proofs/'.$Bukti);
            if($Kategori==1)
            {	
                $Debet = $Jumlah;
                $KetD = $Keterangan;
                $Kredit = 0;
                $KetK = 0;
            }
            elseif($Kategori==2)
            {	
                $Debet = 0;
                $KetD = 0;
                $Kredit = $Jumlah;
                $KetK = $Keterangan;
            }
            $insert = mysqli_query($connect,"INSERT INTO kas value ('$Tanggal','$Debet','$KetD','$Kredit','$KetK','$Bukti')");
            if($insert){
                echo "<script>
                        alert('DATA BARU BERHASIL DITAMBAHKAN ٩(◕‿◕｡)۶');
                        document.location.href='adminpage.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('DATA BARU GAGAL DITAMBAHKAN o〒﹏〒o');
                        document.location.href='inputpage.php';
                    </script>";
            }
        }
        else{
            echo "<script>
				     alert('UKURAN GAMBARNYA TERLALU BESAR! \nHARAP ISI ULANG FORM YANG TERSEDIA o〒﹏〒o');
				     document.location.href='inputpage.php';
		          </script>";
        }
    }
    else{
        echo "<script>
				     alert('EKSTENSI FILE TERLARANG! \\nHARAP ISI ULANG FORM YANG TERSEDIA o〒﹏〒o');
				     document.location.href='inputpage.php';
		      </script>";
    }
?>