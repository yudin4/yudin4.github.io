<?php
include "connect.php";
?>
<html>
<head>
	<title>KAS LDKOM</title>
	<link rel="stylesheet" type="text/css" href="style.css">
<style>
		body{
			background: #cfcfcf;
		}
		hr{
			border-top: 1px solid #474A59;
			margin-bottom: 3mm;
			margin-left: 7mm;
			margin-top: -5mm;
			width: 7.5cm;
			}
		h1{
			color: #474A59;
			margin-bottom: 1cm;
			font-family: Segoe Script;
			font-weight: bolder;
			text-align: center;
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
		.box{
			margin-top: 2cm;
			margin-left: 12cm;
			border-radius: 4%;
			background: #ebebeb;
			box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
			width: 350px;
			padding: 5mm;
			border-top-left-radius: 5%;
			border-bottom-right-radius: 5%;
			border-top-right-radius:5%;
			border-bottom-left-radius: 5% ;
		}
            .right {
            margin-left: 20cm;
			margin-top: 1.5cm;
			margin-bottom: -2cm;
            background: #474A59;
            height: 8pt;
            position: relative;
            width: 1.2cm;
			padding-left: 2mm;
			padding-top: 1mm;
			padding-bottom: 0.7mm;
            }
		.login{
			font-family: UD Digi Kyokasho N-R;
			font-size: 6pt;
			color: wheat;
			opacity: 50%;
		}
		label{
			font-size: 13pt;
			font-family: UD Digi Kyokasho N-R;
			margin-left: 1cm;
			margin-bottom: 5cm;
		}
		option{
			font-size: 11pt;
			font-family: UD Digi Kyokasho N-R;
		}
		input::placeholder{
			font-family: UD Digi Kyokasho N-R;
		}
		input{
			margin-top: -5cm;
			margin-left: 1.3cm;
			background: transparent;
			outline: none;
			border :none;
			font-family: UD Digi Kyokasho N-R;
		}
		.form{
			box-sizing : border-box;
			width: 100%;
			padding: 7px;
			font-size: 11pt;
			margin-bottom: 20px;
			margin-top: -1mm
		}

		.btn{
			background: #474A59;
			color: white;
			font-size: 11pt;
			border: none;
			border-radius: 3px;
			padding: 10px 20px;
			margin-top: 5mm;
			margin-left: 3.5cm;
			font-family: UD Digi Kyokasho N-R;
			cursor: pointer;
		}

		.link{
			color: #232323;
			text-decoration: none;
			font-size: 10pt;
		}

		.alert{
			background: #e44e4e;
			color: white;
			padding: 10px;
			text-align: center;
			border:1px solid #b32929;
		}
		.success{
			background: #2E8B57	;
			color: white;
			padding: 10px;
			text-align: center;
			border:1px solid #b32929;
		}
    </style>
</head>
<body>
	<div class="right">
		<a href="index.php">
			<div class="login">Sign In</div>
		</a>
	</div>
	<div class="box">
	<h1>Reset Password</h1>
		<form action="resetpwcheck.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form" required="required">
			<hr>
			<?php
			if(isset($_GET['pesan']))
			{
				if($_GET['pesan']=="salahusn")
				{?>
					<h2>Username tidak ada TT</h2>
				<?php
				}
			}
			?>
			<label>Word</label>
	        <input type="text" name="word" class="form" required >
			<hr><?php
			if(isset($_GET['pesan']))
			{
				if($_GET['pesan']=="salahw")
				{?>
					<h2>Kata favoritmu salah TT</h2>
				<?php
				}
			}
			?>
			<label>Password</label>
			<input type="password" name="password" placeholder="min. 4 karakter" class="form" min="4" required >
			<hr><?php
			if(isset($_GET['pesan']))
			{
				if($_GET['pesan']=="pw")
				{?>
					<h2>Password harus terdiri dari kombinasi angka, huruf kecil, dan kapital.</h2>
				<?php
				}
			}
			?>
			<label>Confirm Password</label>
			<input type="password" name="password1" class="form"min="4" required >
			<hr><?php
			if(isset($_GET['pesan']))
			{
				if($_GET['pesan']=="salahpw")
				{?>
					<h2>Password tidak cocok</h2>
				<?php
				}
			}
			?>
			<button type="submit" class="btn">Reset</button>
			<br/>
		</form>
		
	</div>
</body>
</html>