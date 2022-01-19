<?php
    include "connect.php";

    $Kode = $_POST['Kode'];
    $Nama = $_POST['Nama'];
    $Tanggal = $_POST['Tanggal'];
    $Kategori = $_POST['Kategori'];
    $Kondisi = $_POST['Kondisi'];
    $Jumlah = $_POST['Jumlah'];
    $eallowed_exts= array('png','jpg','jpeg');
    $Gambar = $_FILES['Gambar']['name'];
    $x = explode('.', $Gambar);
    $ext = strtolower(end($x));
    $ukuran	= $_FILES['Gambar']['size'];
    $file_tmp = $_FILES['Gambar']['tmp_name'];	
    if(in_array($ext, $eallowed_exts) === true){
        if($ukuran < 5000000)
        {			
            move_uploaded_file($file_tmp, 'assets/'.$Gambar);
            $query = mysqli_query($koneksi,"INSERT INTO barang_masuk value ('$Kode','$Nama','$Tanggal','$Kategori','$Kondisi','$Jumlah','$Gambar')");
            if($query){
                echo "<script>
				        alert('DATA BARU BERHASIL DITAMBAHKAN ٩(◕‿◕｡)۶');
				        document.location.href='index.php';
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
				     document.location.href='index.php';
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