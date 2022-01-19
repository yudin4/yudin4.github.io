<?php
include 'connect.php';
$Kode=$_GET['id'];
$query=mysqli_query($koneksi, "SELECT * FROM barang_masuk WHERE Kode='$Kode'");
$tampil=mysqli_fetch_assoc($query);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD dina</title>
    <link rel="stylesheet" href="editpage.css">
  </head>
  <body>
    <!-- <h1>Hello, worldnlkfw!</h1> -->
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
<section id="form">
    <div class="container ">
        <div class="row text-center">
            <div class="col">
                <h2>Edit Data</h2>
            </div>
        </div>
        <div class="row  justify-content-center">
            <div class="col-md-6 bg-light">
                <div class="container mt-4 mb-4">
                    <form action="edit.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="Kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" readonly name="Kode" id="Kode" value="<?php echo $tampil['Kode']; ?>"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" name="Nama"  id="Nama"  value="<?php echo $tampil['Nama']; ?> " required>
                    </div>
                    <div class="mb-3">
                        <label for="Tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="Tanggal" id="Tanggal" value="<?php echo $tampil['Tanggal']; ?>"  required>
                    </div>
                    <div class="mb-3">
                        <label for="Kategori" class="form-label">Kategori</label>
                        <select class="form-select" name="Kategori" id="Kategori" required aria-label="Default select example" > 
                        <?php
                        if ($tampil['Kategori']=='1'){
                            $Kategori = "Habis Pakai";
                        }
                        else{
                            $Kategori = "Tidak Habis Pakai";
                        }
                        ?>
                        <option selected value="<?php echo $tampil["Kategori"]?>"><?=$Kategori?></option>
                            <option value="1" >Habis Pakai</option>
                            <option value="2" >Tidak Habis Pakai</option>
                        </select>
                        <div id="KategoriHelp" class="form-text">*pilih salah satu</div>
                    </div>
                    <div class="mb-3">
                        <label for="Kondisi" class="form-label">Kondisi</label>
                        <select class="form-select" name="Kondisi" aria-label="Default select example"> 
                        <?php
                        if ($tampil['Kondisi']=='Baik'){
                            $Kondisi = "Baik";
                        }
                        elseif($tampil['Kondisi']=='Sedang'){
                            $Kondisi = "Sedang";
                        }
                        else{
                            $Kondisi = "Buruk";
                        }
                        ?>
                        <option selected value="<?php echo $tampil["Kondisi"]?>"><?=$Kondisi?></option>
                            <option value="Baik" required>Baik</option>
                            <option value="Sedang" required>Sedang</option>
                            <option value="Buruk" required>Buruk</option>
                        </select>
                        <div id="KondisiHelp" class="form-text">*pilih salah satu</div>
                    </div>
                    <div class="mb-3">
                        <label for="Jumlah" class="form-label">Jumlah</label>
                        <input value="<?php echo $tampil["Jumlah"];?>" class="form-control" name="Jumlah" id="Jumlah" type="number" min="1" required>
                        <div id="JumlahHelp" class="form-text">*dalam satuan unit</div>
                    </div> 
                    <label for="Gambar" class="form-label">Gambar</label>
                    <div class="mb-3">
                       <img src="assets/<?php echo $tampil['Gambar']; ?>" alt="" style="width:3cm;height:4cm;">
                        <input type="file" class="form-control" name="Gambar" id="Gambar">
                        <div id="GambarHelp" class="form-text">*ekstensi gambar : 'jpg' 'png' 'jpeg'</div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                    <a href="index.php" class="btn btn-dark">Back</a>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</section>



  </body>
</html>