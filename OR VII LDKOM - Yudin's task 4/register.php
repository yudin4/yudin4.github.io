<?php
//mulai session
session_start(); 
include "connect.php";
?>

<html>
<head>
	<title>KAS LDKOM</title>
	<link rel="stylesheet" type="text/css" href="">
    <style>
            hr{
				border-top: 1px solid #474A59;
                margin-top: -0.2mm;margin-bottom: 3mm;
                width: 10cm;
			}
            h2{
                color: #f54242;
                margin-top: -11px;margin-left: 2.1cm;
                font-family: UD Digi Kyokasho N-R;
                font-size: 7pt;
                width: 10cm;
            }
            a{
                text-decoration: none;
            }
            p{
                font-family: Segoe Script;
                font-weight: bold;
                margin-left: 5.2cm;
                font-size: 25pt;
                margin-top: -11%;
                margin-bottom: 5%;
                color: #474A59;
            }
            .form{
                width: 100%;
                font-size: 11pt;
                position: absolute;
                padding-top: 50cm;
            }
            .btn{
			font-family: UD Digi Kyokasho N-R;
                background: #474A59;
				color: wheat;
				font-size: 11pt;
				border: none;
				border-radius: 3px;
				padding: 10px 20px;
				margin-left: 5.5cm;
				width: 100px;
                cursor: pointer;
            }
            .form-text{                
                color:black;
                margin-top: -11px;
                font-family: UD Digi Kyokasho N-R;
                font-size: 8pt;
                margin-left: 2.1cm;
                width: 10cm;
                margin-bottom: 11px;
            }
            body {
            background: #cfcfcf;
            }
            .container {
            margin-top: 3.5cm;
            margin-left: 11cm;
            display: flex;
            height: 350px;
            width: 640px;
            }
            .right {
            margin-top: -2.11cm;
            margin-left: -4.8cm;
            background: #474A59;
            height: 17pt;
            position: relative;
            width: 4cm;
            }
            .login{
            font-family: Comic Sans MS;
            color: wheat;
            opacity: 50%;
            margin-top: 0.7mm;
            font-size: 11px;
            line-height: 1.5;
            margin-left: 2mm;
            }
            .left {
            border-radius: 4%;
    		background: #ebebeb;
            box-shadow: 0px 0px 40px 16px rgba(0,0,0,0.22);
            color: #F1F1F2;
            position: relative;
            height: 120%;
            width: 80%;
            margin-top: -1.5cm;
            padding-top: 2cm;
            margin-bottom: 1.5cm;
            }
            @media (max-width: 100px) {
            .left {
                flex-shrink: 0;
                height: 50%;
                width: 100%;
                max-height: 550px;
            }
            }
            input {
			font-family: UD Digi Kyokasho N-R;
            background: transparent;
            border: 0;
            color: #474A59;
            font-size: 15px;
            height: 16px;
            width: 10cm;
			margin-left: 2cm;
            padding: 11px;
			outline: none ;
            }
            label {
            font-family: UD Digi Kyokasho N-R;
			margin-left: 2cm;
            color:  #474A59;
            display: block;
            font-size: 17px;
            font-weight: lighter;
            height: 20px;
            }
    </style>
</head>
<body>
    <div class="page">
    <div class="container">
        <div class="left">
            <p>Sign Up</p>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
	        <form action="registercheck.php" method="post">
                
                <label>Name</label>
                <input type="text" name="nama" 
                        value="<?php 
                                if($_SESSION['nama']!='NULL')
                                {
                                    echo $_SESSION['nama'];
                                }
                                ?>" <?php if($_SESSION['nama']=='NULL'){?> autofocus <?php ;} ?> class="input" required="required" >
                <hr>
                <label>Username</label>
                <input type="text" name="username" value="<?php if($_SESSION['nama']!='NULL'){ echo $_SESSION['usn'];}?>" class="input" <?php if(isset($_GET['pesan'])){if($_GET['pesan']=="gagalusn")
                                                                                                                                                {?> autofocus <?php ;
                                                                                                                                                }}?> required="required">
                <hr>
                <?php
                if(isset($_GET['pesan']))
                {
                    if($_GET['pesan']=="gagalusn")
                    {?>
                        <h2>Username sudah ada yang punya TT</h2>
                    <?php
                    }
                }
                ?>
                <label>Secret Word</label>
                <input type="text" name="word" class="input" value="<?php if($_SESSION['nama']!='NULL'){echo $_SESSION['sw'];}?>" required="required">
                <hr>
                <div id="KodeHelp" class="form-text">* digunakan saat mereset kata sandi</div>
                <label>Password</label>
                <input type="password" name="password" value="<?php if($_SESSION['nama']!='NULL'){echo $_SESSION['pw'];}?>" placeholder="min. 4 karakter" id="password" class="input" required 
                <?php if(isset($_GET['pesan'])){if($_GET['pesan']=="gagalpw")
                              {?> autofocus <?php ;
                              }}?>>
                <i class="far fa-eye" id="togglePassword" style="margin-left: -38px;cursor:pointer; color: #474A59;"></i>
			    <hr>
                <?php
                if(isset($_GET['pesan']))
                {
                    if($_GET['pesan']=="gagalpw")
                    {?>
                        <h2>Password harus terdiri dari kombinasi angka, huruf kecil, dan kapital.</h2>
                    <?php
                    }
                }
                ?>
                <label>Password Confirm</label>
                <input type="password" name="password1" class="input" value="<?php if($_SESSION['nama']!='NULL'){echo $_SESSION['pw1'];}?>" id="password1" class="input" required 
                <?php if(isset($_GET['pesan'])){if($_GET['pesan']=="gagalpw1")
                              {?> autofocus <?php ;
                              }}?>>>
                <i class="far fa-eye" id="togglePassword1" style="margin-left: -44px;cursor:pointer; color: #474A59;"></i>
			    <hr>
                <?php
                if(isset($_GET['pesan']))
                {
                    if($_GET['pesan']=="gagalpw1")
                    {?>
                        <h2>Password tidak cocok</h2>
                    <?php
                    }
                }
                ?>
                <br>
                <button type="submit" class="btn">Sign Up</button>
                <br/>
            </form>
            <script>
                const togglePassword = document.querySelector('#togglePassword');
                    const password = document.querySelector('#password');
                    togglePassword.addEventListener('click', function (e) {
                        // toggle the type attribute
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        // toggle the eye slash icon
                        this.classList.toggle('fa-eye-slash');
                    });
            </script>
            <script>
                const togglePassword1 = document.querySelector('#togglePassword1');
                    const password1 = document.querySelector('#password1');
                    
                    togglePassword1.addEventListener('click', function (e) {
                        // toggle the type attribute
                        const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
                        password1.setAttribute('type', type);
                        // toggle the eye slash icon
                        this.classList.toggle('fa-eye-slash');
                    });
            </script>
        </div>
        <div class="right">    
            <a href="index.php">
                <div class="login">Already have an account?</div>
            </a>
        </div>
    </div>
    </div>
    </div>
  </div>
</div>
</body>
</html>