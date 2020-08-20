<div id=top><a href="/home.php">Local Server</a>::<a href="/login.php">login</a>
<?php
$url_home = 'home.php';

session_start();
require_once 'conn.php';
if ($_GET[logout]=='yes'){header('location:login.php');}
if ($_SESSION['logged']){
	echo "::<a href='/files.php'>files</a>";
	echo '::<a href="/logout.php?logout=yes">logout</a>';
	echo "::<b> Currently logged in User: $_SESSION[logged] </b><br>";
}
echo "<h1><b>$_SESSION[logged]</b>'s files</h1>";
$conn = new PDO("sqlite:db/db_member.sqlite3");
$stm=$conn->query('select * from member join files on member.id=files.userid where username="'.$_SESSION[logged].'"');
?>
</div>
<div id=container>

<form method=post enctype="multipart/form-data">
<input type="file" name="file" id="file">
<input type="submit" value="Upload File!" name="submit"> Max(3000 MB)
</form>
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
  background-color: #dddddd;
}

</style>
<?php
if ($_FILES){

	
$target_dir = "Upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 0;
// Check file size
if ($_FILES["file"]["size"] > 3000000000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
if  ($_FILES['file']['size']  ==  0)  {
	die("ERROR:  Zero  byte  file  upload");
}

// if everything is ok, upload file
else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.<br>";
    }
}
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
	$uploadOk = 1;
	$conn->query('insert into files (userid,file, size, time, original) values("'.$_SESSION[id].'","'.(time().$_FILES["file"]["name"]).'","'.($_FILES["file"]["size"] / 1024).'","'.time().'","'.$_FILES["file"]["name"].'");');
}
}
$stm=$conn->query('select * from files where userid='.$_SESSION[id].';');
$rec=$stm->fetchAll();
echo '<table>';
echo '<th><b>Filename</b></th>
	<th><b>Size</b></th>
	<th><b>Date added</b></th>';
foreach($rec as $q){
echo '
	<tr><td><b><a href="Upload/'.$q["original"].'">'.$q["original"].'</a></b></td><td><b>'.($q["size"] / 1024).' Kb'.'</b></td><td><b>'.date('m/d/Y H:i:s',$q["time"] ).'</b></td></tr>';
}
echo '</table>';
?>


