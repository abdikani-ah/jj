<!DOCTYPE html>
<?php session_start()?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<style type="text/css">
			.show {color: green; border: 1px solid cyan; border-radius: 15px; padding: 5px; margin-bottom: 10px; font-style: halvetica; font-size: 16px;}
		</style>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="home.php">Eid-Shopper</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">Login And Registration</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<a href="login.php">Already a member? Log in here...</a>
		<br style="clear:both;"/><br />
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="POST" action="save_member.php">	
				<div class="alert alert-info">Registration</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" id="username" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Phone-number</label>
					<input type="text" name="phone" id="phone" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Email-Address</label>
					<input type="text" name="email" id="email" class="form-control" required="required"/>
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" id="password" name="password1"  class="form-control" required="required"/></br>
				</div>
				<div class="show">
				<input type="checkbox" onclick="show()">  Show Password<br>
				</div>
				<script>
                function show() {
                  var show = document.getElementById('password');
                  if (show.type === "password") {
                    show.type = "text";
                  } else {
                    show.type = "password";
                  }
                }
                </script>
				<?php
					if($_SESSION['success']){
				?>
				<div class="alert alert-success"><?php echo $_SESSION['success'];?></div>
				<?php
					$_SESSION['success']="";
					}
				?>
				<button class="btn btn-primary btn-block" name="register"><span class="glyphicon glyphicon-save"></span> Register</button>
				<?php
					if(($_SESSION['error'])){
				?>
					<div class="alert alert-danger"><?php echo $_SESSION['error'];?></div>
				<?php
					$_SESSION['error']="";
					}
				?>
				<?php
					if(($_SESSION['notmet'])){
				?>
					<div class="alert alert-danger"><?php echo $_SESSION['notmet'];?></div>
				<?php
					$_SESSION['notmet']="";
					}
				?>
				<?php
					if(($_SESSION['notsame'])){
				?>
					<div class="alert alert-danger"><?php echo $_SESSION['notsame'];?></div>
				<?php
					$_SESSION['notsame']="";
					}
				?>
			</form>	
		</div>
			</form>	
		</div>
	</div>
</body>
</html>
