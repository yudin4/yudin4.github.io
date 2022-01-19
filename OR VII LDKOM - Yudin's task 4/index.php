<?php
session_start(); 
?>
<html>
<head>
	<title>KAS LDKOM</title>
	<link rel="stylesheet" type="text/css" href="">
    <style>
			hr{
				width: 6cm;
				margin-top: -0.7cm;
				border-top: 2px solid #474A59;
			}
			h1{
				color: #474A59;
				margin-top: 1cm;
                font-family: Segoe Script;
				font-size: 25pt;
				font-weight: bolder;
				text-align: center;
			}
        a{
            text-decoration: none;
            color: black;
        }
			h2{
				color: #f54242;
				margin-top: -2mm;
				margin-left: 1.3cm;
				font-family: UD Digi Kyokasho N-R;
				font-size: 8pt;
				position: relative;
				word-wrap: inherit;
			}
			.btn_signin{
				font-family: UD Digi Kyokasho N-R;
				background: #474A59;
				color: wheat;
				font-size: 11pt;
				border: none;
				border-radius: 3px;
				padding: 10px 20px;
				margin-left: 3cm;
				width: 100px;
				margin-top: 1cm;
				cursor: pointer;
			}
			body {
			background: #cfcfcf;
			font-family: sagoe script;
			margin: 0;
			padding: 20px;
			}
			.container {
			display: flex;
			height: 320px;
			margin-top: 3cm;
			margin-left: 8cm;
			width: 640px;
			}
			.left {
			border-top-left-radius: 20%;
			border-bottom-left-radius: 20%;
			background: #474A59;
			height: calc(100% - 40px);
			top: 20px;
			position: relative;
			width: 50%;
			}
			.login {
				color: wheat;
				word-spacing: 15%;
				text-align: center;
				font-size: 50px;
				margin: 50px 40px 40px;
			}
			.eula {
			color: #999;
			font-size: 14px;
			margin-left: 50px;
			margin-top: -50px;
			line-height: 1.5;
			}
			.right {
    		background: #ebebeb;
			box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
			color: #F1F1F2;
			position: relative;
			width: 50%;
			}
            .above {
            margin-top: -7.38cm;
            margin-left: 5.5cm;
            background: #474A59;
            height: 12pt;
            width: 2.7cm;
            }
            .signin{
			font-family: UD Digi Kyokasho N-R;
            color: wheat;
            opacity: 50%;
            margin-top: 1mm;
            font-size: 10px;
            line-height: 1.5;
            margin-left: 2mm;
            }
			.form {
			margin: 40px;
			position: absolute;
			}
			input {
			font-family: UD Digi Kyokasho N-R;
			background: transparent;
			border: 0;
			color: #474A59;
			font-size: 18px;
			height: 25px;
			line-height: 30px;
			outline: none !important;
			margin-bottom: 0.65cm;
			margin-left: 1.5cm;
			}
			.alert{
				opacity: 85%;
			font-family: UD Digi Kyokasho N-R;
				font-weight: lighter;
				margin-top: -120px;
				margin-bottom: 80px;
				background-color:#ffe3e3;
				color: #b32929;
				padding: 8px;
				text-align: center;
				border:1px solid #b32929;
			}
        a{
            color: red;
			
        }
    </style>
</head>
<body>
<div class="page">
  <div class="container">
    <div class="left">
      <div class="login">Keuangan LDKOM</div>
      <div class="eula">Laboratorium Dasar Komputasi JSI UNAND</div>
    </div>
    <div class="right">
	   <h1>Sign In</h1>
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	  <form action="logincheck.php" method="post">
			<?php 
			if(isset($_GET['pesan']))
			{
				if($_GET['pesan']=="gagal2")
				{?>
					<div class='alert'>Silahkan masuk terlebih dahulu !</div>
				<?php 
				}
				elseif($_GET['pesan']=="gagal")
				{
					echo "<script>
						alert('LOG IN GAGAL ٩(T‿T｡)۶ \\nMASUKKAN DATA DENGAN BENAR! ');
	 					</script>";
				}
			}?>
			<input type="text" name="Username" autofocus="" class="form_signin" placeholder="Username" required="required" value="<?php if(isset($_SESSION['usn'])=='True'){echo $_SESSION['usn'];}?>">
	  		<hr>
			<?php 
			if(isset($_GET['pesan']))
			{
				if($_GET['pesan']=="salahusn")
				{?>
					<h2>Username tidak ada TT</h2>
				<?php 
				}
				else if($_GET['pesan']=="sukses")
				{
					echo "<script>
						alert('Registrasi Akun Berhasil! \\nSilakan masuk ٩(◕‿◕｡)۶');
	 					</script>";
				} 
			}?>
			<input type="Password" name="Password" class="form_signin" id="Password" placeholder="Password" required="required" value="<?php if(isset($_SESSION['usn'])=='True'){echo $_SESSION['pw'];}?>">
			<i class="far fa-eye" id="togglePassword" style="margin-left: -5px; cursor:pointer; color: #474A59;"></i>
			<hr>
			<?php 
			if(isset($_GET['pesan']))
			{
				if($_GET['pesan']=="salahpw")
				{?>
					<h2>Password salah TT <a class="h2" href="resetpw.php">Lupa password?</a>
					</h2><?php 
				}
			}?>
			<button type="submit" class="btn_signin" >Sign In</button>
       		<div class="above">    
            <a href="register.php">
				<?php
					$_SESSION['nama']='NULL';
				?>
                <div class="signin">Belum punya akun?</div>
            </a>
        </div>
		</form>
		<script>
			 const togglePassword = document.querySelector('#togglePassword');
				const Password = document.querySelector('#Password');
				
				togglePassword.addEventListener('click', function (e) {
					// toggle the type attribute
					const type = Password.getAttribute('type') === 'Password' ? 'text' : 'Password';
					Password.setAttribute('type', type);
					// toggle the eye slash icon
					this.classList.toggle('fa-eye-slash');
				});
		</script>
    </div>
  </div>
</div>

</body>
</html>