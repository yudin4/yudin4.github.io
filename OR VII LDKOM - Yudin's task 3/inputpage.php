<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD dina</title>
    <link rel="stylesheet" href="inputpage.css">
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

    <h2 class="text-center"> Tambah Data </h2>
    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 bg-light">
                <form action="input.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="Kode" class="form-label">Kode</label>
                        <input type="text" class="form-control" id="Kode" name="Kode" required>
                        <div id="KodeHelp" class="form-text">*kode barang berupa angka, tidak dapat diubah setelah disubmit</div>
                    </div>
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" id="Nama" name="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="Tanggal" class="form-label">Tanggal Masuk</label>
                        <input type="date" class="form-control" id="tanggal" name="Tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="Kategori" class="form-label">Kategori</label>
                        <select class="form-select " name="Kategori" required>
                            <option value="1">Habis Pakai</option>
                            <option value="2">Tidak Habis Pakai</option>
                        </select>
                        <div id="KategoriHelp" class="form-text">*pilih salah satu</div>
                    </div>
                    <div class="mb-3">
                        <label for="Kondisi" class="form-label">Kondisi</label>
                        <select class="form-select " name="Kondisi" required>
                            <option value="Baik">Baik</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Buruk">Buruk</option>
                        </select>
                        <div id="KondisiHelp" class="form-text">*pilih salah satu</div>
                    </div>
                    <div class="mb-3">
                        <label for="Jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" id="Jumlah" name="Jumlah" required min="1">
                        <div id="JumlahHelp" class="form-text">*dalam satuan unit</div>
                    </div>
                    <div class="mb-3">
                        <label for="Gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="Gambar" name="Gambar" required>
                        <text id="GambarHelp" class="form-text">*max. size : 500 MB</text>
                        <div id="GambarHelp" class="form-text">*ext : 'jpg' 'png' 'jpeg'</div>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="index.php" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>