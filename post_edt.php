<?php
include 'config.php';
$sid=$_REQUEST['sid'];

$getta=mysqli_query($conn,"select * from dept_post where sl='$sid'") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
			$deptid=$ro['deptid'];
			$post=$ro['post'];
			$salary=$ro['salary'];
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>POST EDIT</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">POST EDIT</font></h2></header>
<table border="2px" width="10%" align="right">
<td align="center"><a href="index.php" title="Home"> <img src="img/home.png" height="30px"> </a></td>
<td align="center"><a href="post.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="post_value.php">
<input type="hidden" name="sid" id="sid" value="<?PHP echo $sid;?>">
<table border="2px" width="46%" align="center">
<tr>
<td align="center" width="43%">Department Name<font color='red'>*</font></td>
<td align="center" width="17%">
<select name="deptid" id="deptid">
<option value=""> --------Select--------</option>
<?PHP
$getta=mysqli_query($conn,"select * from dept order by deptnm") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
		$sl=$ro['sl'];
		$deptnm=$ro['deptnm'];
?>
<option value="<?php echo $sl;?>" <?=($sl==$deptid)?'Selected':'';?>><?php echo $deptnm?></option>
<?PHP
	}
?>
<td align="center" width="20%">Post<font color='red'>*</font></td>
<td align="center" width="20%"><input type="text" name="post" id="post" value="<?PHP echo $post;?>"></td>
</tr>
<tr>
<td align="center" width="25%">Salary<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" name="salary" id="salary" value="<?PHP echo $salary;?>"></td>
<td align="center" width="20%" title="Submit" colspan="4"><b><input type="submit" value=" UPDATE "></b></td>
</tr>
</table>
</form>
</body>
</html>