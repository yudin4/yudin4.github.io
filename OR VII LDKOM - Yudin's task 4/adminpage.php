<?php
    session_start(); 
    include 'connect.php';
    
    $Username=$_SESSION['Username'];
    $select = mysqli_query($connect, "SELECT * FROM akun WHERE Username = '$Username'");  
    $akun=mysqli_fetch_assoc($select);
        
    $delete = isset($_GET['delete']);
    $fail = isset($_GET['fail']);

    if($_SESSION['Kode']!="1"){
		header("location:index.php?pesan=gagal2");
	}
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
    <style>
        *{
        padding-bottom: 0.25%;
        margin: 0;
        }
        hr{
            height: 5pt solid black;
            position: static;
        }
        .container{
            background-color: #ebebeb;
            border-radius: 1.5%;
            padding: 2%;
        }
        h1{
            color: wheat;
            font-family: segoe script; 
            font-weight: bolder;
            outline: blue;
            font-size: 35pt;
            margin-top: 1cm;
            margin-bottom: 1cm;
        }
        body{
            background: #474A59;
        }
        .btn2{
            margin-left: 96%;
            margin-bottom: -1.5%;
        }
        .profile{
            position: fixed;
            background-color: transparent;
            height: 4cm;
            width: 4cm;
            margin-left: 3.3cm;
            margin-top: -4.5cm;
            padding-top: 1cm;
        }
        h3{
            font-family: UD Digi Kyokasho N-R;
            font-size: 10pt;
            color: black;
        }
        a{
            text-decoration: none;
            color: black;
        }
        .offcanvas{
            border-top-right-radius: 10%;
            border-bottom-right-radius: 10%;
            width: 7cm;
            background: wheat;
        }
        .btn0{
            position: fixed;
            font-size: 8pt;
            margin-left: 2mm;
            font-family: UD Digi Kyokasho N-R;
            color: white;
            margin-bottom: 1cm;
        }
        .tabel{
            color: white;
            background-color: #474A59;
            font-family: UD Digi Kyokasho N-R;
        }
        .table{
            border-color: #474A59;
        }
        table{
            margin-top: 5mm;
        }
        td{
            font-family: UD Digi Kyokasho N-R;
        }
        .tbody{
            margin-top: 60cm;
        }
        .alert{
            margin-top: 5mm;
            margin-bottom: -5mm;
        }
        .saldo{
            background-color: #303030;
            color: white;
            width : 5cm;
            padding-left: 5mm;
            padding-top: 1mm;
            font-family: UD Digi Kyokasho N-R;
            margin-left: 78%;
            margin-bottom: -3.3%;
            border-radius: 5%;
        }
    </style>
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.minmjs"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://stackpath.bootsrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <h1 class="text-center"> KAS LDKOM </h1>
    
    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
        <div class="offcanvas-header">
             <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Hai <?php echo $akun['Nama']; ?> (✿◠‿◠) Selamat Datang!</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <hr>
            <?php
                if($akun)
                 {
                  ?><th >
                    <img src="account/<?php echo $akun['Foto'];?>" alt="" style="width: 3cm;heigth:4cm">
                    </th>
            <hr>
                 <?php
                 }
            ?>
            <td> 
                <div class="profile">
                       <h3>@<?php echo $akun['Username'];?> </h3>
                       <h3>ID. <?php echo $akun['ID'];?></h3>
                       <h3>Level. <?php if($akun['Kode']==1){echo 'admin';}elseif($akun['Kode']==2){echo 'user';}?></h3> 
                       <h3>Jabatan. <?php echo $akun['Jabatan'];?></h3>  
                </div>
            </td>
            <div class="btn0">
                <a href="logout.php" class="btn btn-dark btn-sm"  onclick="return confirm(' Yakin mau keluar? ⊹⋛⋋( ●´⌓`●)⋌⋚⊹')">Sign Out</a>
                <a href="editpfpage.php?usn=<?php echo $Username?>" class="btn btn-dark btn-sm">Edit Profile</a>   
                <br>
                <br>
                <a href="inputpage.php" class="btn btn-dark btn-sm">+Add Kas</a>
                <a href="akunpage.php " class="btn btn-dark btn-sm">Account</a> 
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="saldo">
            Saldo : Rp.<?php
                $debett = mysqli_query($connect, "SELECT SUM(Debet) AS TotalDebet FROM Kas");
                $debet = mysqli_fetch_assoc($debett);
                $kreditt = mysqli_query($connect, "SELECT SUM(Kredit) AS TotalKredit FROM Kas");
                $kredit = mysqli_fetch_assoc($kreditt);
                $saldo = $debet['TotalDebet'] - $kredit['TotalKredit'];
                echo $saldo;
            ?>,-
        </div>
        <div class="btn2">
        <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" style="font-weight: bold;">☰</button>
        </div>
        <div class="row">
            <div class="col">
            <?php if($delete){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>HORRAY ٩◕‿◕｡۶</strong> Data berhasil dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div><?php }
                elseif($fail){ ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>YAHHH o〒﹏〒o </strong> Data gagal dihapus.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            <?php } ?> 
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-hover mydatatable">
                <thead class="tabel">
                    <tr>
                        <th class="tabel" scope="col" style="text-align: center;">Tanggal</th>
                        <th class="tabel" scope="col" style="text-align: center;">Debet (Rp)</th>
                        <th class="tabel" scope="col" style="text-align: center;">Keterangan</th>
                        <th class="tabel" scope="col" style="text-align: center;">Kredit (Rp)</th>
                        <th class="tabel" scope="col" style="text-align: center;">Keterangan</th>
                        <th class="tabel" scope="col" style="text-align: center;">Bukti</th>
                        <th class="tabel" scope="col" style="text-align: center;"></th>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                <?php
                    $select = mysqli_query($connect,"SELECT * FROM kas ORDER BY Tanggal DESC");
                    $i=1;
                    while ($show = mysqli_fetch_assoc($select)){
                ?>
                    <tr>
                            <td ><?php echo $show ['Tanggal'];?></td>
                            <td ><?php echo $show ['Debet'];?></td>
                            <td ><?php echo $show ['KetD'];?></td>
                            <td ><?php echo $show ['Kredit'];?></td>
                            <td ><?php echo $show ['KetK'];?></td>
                            <td >
                                <img src="proofs/<?php echo $show['Bukti'];?>" alt="" style="width: 3cm;heigth:4cm">
                            </td>
                            <td>
                                <a  href="editpage.php?tgl=<?php echo $show ['Tanggal'];?>"><span class="btn btn-outline-warning btn-sm">Edit</span></a>
                                <a  href="delete.php?tgl=<?php echo $show ['Tanggal'];?>" onclick="return confirm(' Yakin mau dihapus? ⊹⋛⋋( ●´⌓`●)⋌⋚⊹')"><span class="btn btn-outline-danger btn-sm " >Delete</span> </a>
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