<?php
    session_start(); 
    include 'connect.php';
    $Username=$_GET['usn'];
    $select=mysqli_query($connect, "SELECT * FROM akun WHERE Username='$Username'");
    $show=mysqli_fetch_assoc($select);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>KAS LDKOM</title>
    <link rel="stylesheet" href="editpage.css">
  </head>
  <style>     
     body {
            background: #474A59;
            width: fit-content;
        }
        h2{
            font-family: Segoe Script;
                font-weight: bold;
                margin-left: 4cm;
                font-size: 25pt;
                color: #474A59;
        }
     .container{
         margin-top: 1cm;
         margin-bottom: 1cm;
            margin-left: 10cm;
            border-radius: 4%;
    		background: #f5f3f2;
            box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
            color: #F1F1F2;
            width: 60%;
            padding: 1cm;
            }
            .form-control{
			font-family: UD Digi Kyokasho N-R;
            border: 0;
            color: #474A59;
            height: 30px;
            font-size: 12pt;
            width: 11cm;
			margin-left: 0.3cm;
            }
            .form-select{
            padding-top: -1cm;
			font-family: UD Digi Kyokasho N-R;
            border: 0;
            color: #474A59;
            font-size: 12pt;
            height: 30px;
            width: 11cm;
			margin-left: 0.3cm;
			outline: none ;
            }
            .form-text{
                margin-left: 0.5cm;
                font-family: UD Digi Kyokasho N-R;
                font-size: 10pt;
            }
            img{
                margin-left: 0.8cm;
                margin-bottom: 2mm;
            }
            label {
            font-family: UD Digi Kyokasho N-R;
            margin-top: 1.5mm;
			margin-left: 0.5cm;
            color:  black;
            display: block;
            font-size: 17px;
            font-weight: lighter;
            height: 20px;
            }
  </style>
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
        <div class="row text-center">
            <div class="col">
                
            </div>
        </div>
            <div class="container">
            <h2>Edit Profil</h2>
                        <form action="editakun.php" method="post" enctype="multipart/form-data">
                                <label for="Username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="Username" id="Username" readonly value="<?php echo $show['Username'];?>" required>
                                
                                <label for="Nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" name="Nama" id="Nama" value="<?php echo $show['Nama'];?>" required>
                                
                                <label for="Level" class="form-label">Level</label>
                                <select class="form-select" name="Level" id="Level"  required aria-label="Default select example" > 
                                    <?php
                                    if ($show['Kode']==1)
                                    {
                                        ?><option readonly selected value="1">Admin</option>
                                          <option value="2">User</option><?php
                                    }
                                    elseif($show['Kode']==2)
                                    {
                                        ?><option value="1">Admin</option>
                                        <option readonly selected value="2">User</option>
                                          <?php
                                    }
                                    ?>
                                </select>
                                <div id="LevelHelp" class="form-text">*pilih salah satu</div>
                                <br>
                            <button type="submit" name="submit" class="btn btn-success" style="margin-top: 3mm; margin-left:5mm;">Update</button>
                            <a <?php if($_SESSION['Kode']==1)
                                    {?>
                                        href="akunpage.php"<?php 
                                    }?> class="btn btn-dark" style="margin-top: 3mm;">Back</a>
                        </form>
    </div>
</section>



  </body>
</html>