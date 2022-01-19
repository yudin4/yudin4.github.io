<?php
    include 'connect.php';
    $berhasil = isset($_GET['berhasil']);
    $gagal = isset($_GET['gagal']);
    $i=1;
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
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <h1 class="text-center"> Inventaris LDKOM </h1>
    <div class="container">
                <div class="btn0">
                     <a href="inputpage.php" class="btn btn-dark">+ Add</a>  
                </div>
                <div class="row">
            <div class="col">
            <?php if($berhasil) {?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>HORRAY ٩◕‿◕｡۶</strong> Data berhasil dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><?php }
                elseif($gagal){?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>YAHHH o〒﹏〒o </strong> Data gagal dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            </div>
        </div>
        <div class="row text-center">
            <div class="col">
                <table class="table table-bordered border-dark">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Masuk</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Kondisi</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Gambar</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $ambil = mysqli_query($koneksi,"SELECT * from barang_masuk ORDER BY Tanggal DESC ");
                            while($tampil=mysqli_fetch_assoc($ambil))
                            { 
                        ?>
                        <tr>
                            <td><?php echo $tampil['Kode'];?> </td>
                            <td><?php echo $tampil['Nama'];?></td>
                            <td><?php echo $tampil['Tanggal'];?></td>
                            <td><?php 
                                    if ($tampil['Kategori']=='1'){
                                        echo "Habis Pakai";
                                    }
                                    else{
                                        echo "Tidak Habis Pakai";
                                    }
                                ?></td>
                            <td><?php echo $tampil['Kondisi'];?></td>
                            <td><?php echo $tampil['Jumlah'];?></td>
                            <td><img src="assets/<?php echo $tampil['Gambar'];?>" alt="" style="width: 3cm;heigth:4cm"></td>
                            <td>
                                <a  href="editpage.php?id=<?php echo $tampil['Kode'];?>"><span class="btn btn-outline-warning btn-sm">Edit</span></a>
                                <a  href="delete.php?id=<?php echo $tampil['Kode'];?>" onclick="return confirm(' Yakin mau dihapus? ⊹⋛⋋( ●´⌓`●)⋌⋚⊹')"><span class="btn btn-outline-danger btn-sm " >Delete</span> </a>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html>