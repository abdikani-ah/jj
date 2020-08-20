<!DOCTYPE html>
<html lang="en">
<head>
	<title>Uploaded Files</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<div id=top>                                                                   
<?php
$url_home = 'home.php';

session_start();
if ($_GET[logout]=='yes'){  
	header('Location:login.php');}
if ($_SESSION['logged']){
	echo "::<b style='color:white; font-size: 22px;'> Currently logged in User: $_SESSION[logged] </b>";
	echo "::<b><a style='color:white; text-align: right; font-size: 22px;' href='/logout.php?logout=yes'>logout</a></b>";
}
?>
</div> 
</head>
<head>
    <title>Local Server &mdash; Local Server</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar py-2 bg-white" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-8 col-xl-5">
            <h1 class="mb-0 site-logo"><a href="home.php" class="text-black h2 mb-0">Local Server</a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="home.php"><span>Home</span></a></li>
                <li><a href="login.php"><span>Login</span></a></li>
                <li class="has-children">
                  <li><a href="index.php"><span>Register</span></a></li>
                <li><a href="uploads.php"><span>Files</span></a></li>
                <li><a href="contact.php"><span>Contact</span></a></li>
                <li><a href="upload.php"><span>upload</span></a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>

    </header>
<body>	
<center>	
	<div class="limiter">
		
			<div class="wrap-table100">
				<div class="table100">
					<table>
						<tbody>

<div id=container>
<div class=bord><h2 style="color: #125876;">Uploaded files:</h2>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #aae43b;
}
tr:nth-child(odd) {
  background-color: #6ec21e;
}
body {background-image: url(images/slider/bg2.jpg); border: 1px solid red; border-radius: 30px; margin-left: 10px;margin-right: 10px;}
</style>
<?php
if($_POST['search'] and $_POST['select']="All"){
	$sql=('select files.id as zxc, * from files join member on member.id=files.userid where original like "%'.$_POST['search'].'%" and deleted!=1 order by time DESC');
}elseif(empty($_POST['search']) and $_POST['select']){$sql=('select files.id as zxc,  * from files join member on member.id=files.userid where original like "%'.$_POST['select'].'" and deleted!=1 order by time DESC');}
elseif($_POST['search'] and $_POST['select']){$sql=('select files.id as zxc,  * from files join member on member.id=files.userid where original like "%'.$_POST['search'].'%" and original like "%'.$_POST['select'].'" and deleted!=1 order by time DESC');}
else{$sql=('select files.id as zxc,  * from files join member on member.id=files.userid order by time DESC');}



$conn = new PDO('sqlite:db/db_member.sqlite3');
$stm=$conn->query($sql);
$result=$stm->fetchAll();
if($_GET[del]){
$conn->query('update files set deleted=1 where id='.$_GET[del]);}
echo '<table>';
echo '<th><b>Filename</b></th>
	<th><b>Size</b></th>
	<th><b>Date added</b></th>
	<th><b>Added by</b></th>
	<th><b>remove</b></th>';
foreach($result as $x){
echo '
	<tr><td><b><a href="Upload/'.$x["original"].'">'.$x["original"].'</a></b></td><td><b>'.($x["size"] / 1024).' Kb'.'</b></td><td><b>'.date('m/d/Y H:i:s', $x["time"]).'</b></td><td><b>'.$x["username"].'</b></td><td><a href=?del='.$x[zxc].'>Delete</a></td></tr>';
}

echo '</table>';
?>

 
						</tbody>
					</table>
				</div>
			</div>
		</div>
	
	

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
</center>
</body>

</html>


