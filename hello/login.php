 <html lang="en">
 <?php session_start()?>
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
    			<a class="navbar-brand" href="home.php">CAS Website</a>
    		</div>
    	</nav>
    	<div class="col-md-3"></div>
    	<div class="col-md-6 well">
    		<h3 class="text-primary">Login And Registration</h3>
    		<hr style="border-top:1px dotted #ccc;"/>
    		<a href="index.php">Not a member yet? Register here...</a>
    		<br style="clear:both;"/><br />
    		<div class="col-md-3"></div>
    		<div class="col-md-6">
    			<form method="POST" action="login_query.php">	
    				<div class="alert alert-info">Login</div>
    				<div class="form-group">
    					<label>Username</label>
    					<input type="text" name="username" class="form-control" required="required"/>
    				</div>
    				<div class="form-group">
    					<label>Password</label>
    					<input type="password" name="password" class="form-control" required="required"/>
    				</div>
                            <div class="show">
                <input type="checkbox" onclick="show()">  Show Password<br>
                </div>
                <script type="text/javascript">
                         function show() {
                  var show = document.getElementById("password");
                  if (show.type === "password") {
                    show.type = "text";
                  } else {
                    show.type = "password";
                  }
                }
                </script>
    				<?php
    					if($_SESSION['error']){
    				?>
    					<div class="alert alert-danger"><?php echo $_SESSION['error']?></div>
    				<?php
    					$_SESSION['error']="";
    					}
    				?>
    				<button class="btn btn-primary btn-block" name="login" value="login"><span class="glyphicon glyphicon-log-in"></span> Login</button>
    			</form>	
    		</div>
    	</div>
    </body>
    </html>
