<?php
 session_start();
 include 'dbconnect.php';
?>
<!DOCTYPE html>
<html>
<head>
<link rel = "stylesheet" TYPE ="text/css" HREF ="style.css"><title>DailyTube</title>
<link rel="icon" href="pictures/favicon.ico">
<a href="main.php"><img src="pictures/logo.png"></a>

<ul class="topnav" id="myTopnav">

  <li><a href="login.php">Login</a></li>
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
<center><img src="pictures/games.png">
<table cellpadding="25" cellspacing="5" border="0" align="center">
<th align="center" colspan="2">Games</th>
 <tr>
 <td>
<video width="320" height="240" controls>
<source src="videos/Game1.mp4" type="video/mp4">
</video><br>
<p>Dota WTF</p>
</td>
<td>
<video width="320" height="240" controls>
<source src="videos/Game2.mp4" type="video/mp4">
</video><br>
<p>Call Of Duty</p>
</td>

</tr>
</table><br><br><br>
<hr>All rights reserved.<br>2017

</center>
</body>
</html>