<?php if( isset($_POST["submit"]))//jika tombol submit ditekan/menangkap variable submit isset itu untuk membandingkan suatu variable
	{ 
		if ($_POST["user"] =="admin" && $_POST["pass"] =="anisa") 
		{
			header("Location: menu.php");
			exit;
		}
		else
		{
			$error=true;

		}
	}		
?>



<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="login.css">
	<div class="contact">
	<h1>HELLO ^_^</h1>
	<p class="tulisan_login">Silahkan login</p>
	<?php if( isset($error)) :?>
	<font color="red" style="font-style: italic;">Username/password yang anda masukan salah</font><br>
<?php endif; ?>
	</div>
	<div class="contact-form">
		<form id="contact-form" method="post">
		<label for="username">Username : </label>
		<input type="text" name="user" class="c1" placeholder="Username" id="username"><br>

			<label for="pass">Password :</label>
		<input type="Password" name="pass" class="c1" placeholder="Password" id="pass">
		<br><p align="center"><br><button class="c1 submit" type="submit" name="submit">Login</button></p>
	</form>

</div>
</body>
</html>