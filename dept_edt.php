<?php
include 'config.php';
$sid=$_REQUEST['sid'];

$getta=mysqli_query($conn,"select * from dept where sl='$sid'") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
			$deptnm=$ro['deptnm'];
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>DEPARTMENT EDIT</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">DEPARTMENT EDIT</font></h2></header>
<table border="2px" width="10%" align="right">
<td align="center"><a href="index.php" title="Home"> <img src="img/home.png" height="30px"> </a></td>
<td align="center"><a href="crs.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="dept_value.php">
<input type="hidden" name="sid" id="sid" value="<?PHP echo $sid;?>">
<table border="2px" width="40%" align="center">
<td align="right" width="10%">Department<font color='red'>*</font></td>
<td align="left" width="30%"><input type="text" value="<?PHP echo $deptnm;?>" name="deptnm" id="deptnm"></td>
<td align="center" width="20%" title="Click to Update" colspan="4"><b><input type="submit" value=" UPDATE "></b></td>
</table>
</form>
</body>
</html>