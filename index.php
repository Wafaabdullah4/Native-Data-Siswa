<!DOCTYPE html>
<html>

<head>
	<title>Login Data Siswa</title>
	<link rel="stylesheet" href="mystyle.css">
</head>

<body>

	<?php
	if (isset($_GET['pesan'])) {
		if ($_GET['pesan'] == "gagal") {
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>



	<img class="wave" src="./images/user/wave.png">
	<div class="container">
		<div class="img">
			<img src="./images/user/bg.svg">
		</div>
		<div class="login-content">
			<form action="cek_login.php" method="post">
				<img src="./images/user/pi.png">
				<h5 class="title" style="font-size: 25px; color:grey; margin: bottom 3px;">Login </h5>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<input type="text" name="username" class="input" placeholder="Username .." required="required">
					</div>
				</div>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">

						<input type="password" name="password" class="input" placeholder="Password .." required="required">

					</div>
				</div>
				<input type="submit" class="btn" value="Login">
			</form>
		</div>
	</div>


	<script type="text/javascript" src="js/main.js"></script>





	<!-- <div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>

		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">

			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">

			<input type="submit" class="tombol_login" value="LOGIN">

		</form>

	</div> -->


</body>

</html>