
<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM users WHERE userId=".$_SESSION['user']);
	$userRow=mysql_fetch_array($res);
?>








<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
<title>DailyTube - <?php echo $userRow['userEmail']; ?></title>
<link rel="stylesheet" href="style.css" type="text/css" />
<a href="main.php"><img src="pictures/logo.png"></a>

<ul class="topnav" id="myTopnav">

  <li><a href="home.php">Login</a></li>
  <li><a href="register.php">Signup</a></li>
   <li class="dropdown">
<a href="javascript:void(0)" class="dropbtn">Categories</a>
  <div class="dropdown-content">
    <a href="music.php">Music</a>
    <a href="sports.php">Sports</a>
    <a href="games.php">Games</a>
		<a href="news.php">News</a>
  </div>
</li>
  <li><a href="main.php">Home</a></li>
  <li><a href="contact.php">Contact</a></li>
  <li><a href="about.php">About</a></li>

</ul>

</head>
<body>
<h3 align="center">
Welcome - <?php echo $userRow['userName']; ?><br>(email: <?php echo $userRow['userEmail']?>) 
</h3><br><center>You may now upload a video.<br><img src="pictures/upload.png"></center>
<center><?php 
require_once 'dbconnect.php';

$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];

if (isset($name)) {

$path= "videos/";

if (!empty($name)){
if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm"))
{
echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
}


else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm"))
{
 if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';
}else {
  echo "Not uploaded because of error #".$_FILES["file"]["error"];
}
}
}
}
?><?php

//Block 1
$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "dbtest"; 
$table = "Videos"; 



//Block 3
$connection= mysql_connect ($host, $user, $password);
if (!$connection)
{
die ('Could not connect:' . mysql_error());
}
mysql_select_db($dbase, $connection);



//Block 4
if(!empty($description)){
mysql_query("INSERT INTO $table (description, filename, fileextension)
VALUES ('$description', '$name', '$fileextension')");
}


//Block 5
mysql_close($connection);

?>

</center>
<br><br><center><form action="" method="post" enctype="multipart/form-data">
Video Title: <input type="text" name="description_entered"/><br><br>
<input type="file" name="file"/><br><br>
	
<input type="submit" name="submit" value="Upload"/>
<br><br>

<?php
$user = "root"; 
$password = ""; 
$host = "localhost"; 
$dbase = "dbtest"; 
$table = "Videos"; 
 
// Connection to DBase 
mysql_connect($host,$user,$password); 
@mysql_select_db($dbase) or die("Unable to select database");

$result= mysql_query( "SELECT description, filename, fileextension FROM $table ORDER BY ID" ) 
or die("SELECT Error: ".mysql_error()); 

print "<table border=1 cellspacing=20 background=pictures/bg><tr><td><table  cellspacing=20 bgcolor=white><tr><td><th colspan=2 align=center>My videos: </th>
\n"; 
while ($row = mysql_fetch_array($result)){ 
$videos_field= $row['filename'];
$video_show= "videos/$videos_field";
$descriptionvalue= $row['description'];
$fileextensionvalue= $row['fileextension'];
print "<tr>\n"; 
print "\t<td>\n"; 
echo "<font face=arial size=4/>$descriptionvalue</font>";
print "</td>\n";
print "\t<td>\n"; 
echo "<div align=center><video width='320' controls><source src='$video_show' type='video/$fileextensionvalue'>Your browser does
not support the video tag.</video></div>";
print "</td>\n";
print "</tr>\n"; 
} 
print "</table></td></tr></table>\n"; 

?> 


<br>

</form><br><a href="logout.php?logout">&nbsp;Sign Out</a>
</center>

    
    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
</body>
</html>



<?php ob_end_flush(); ?>