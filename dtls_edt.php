<?php
include 'config.php';
$sid=$_REQUEST['sid'];

$getta=mysqli_query($conn,"select * from emp_det where sl='$sid'") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
			$deptid=$ro['deptid'];
			$postid=$ro['postid'];
			$sal=$ro['sal'];
			$nm=$ro['nm'];
			$addr=$ro['addr'];
			$cont=$ro['cont'];
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Employee Details</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">Employee Details</font></h2></header>
<table border="2px" width="10%" align="right">
<td align="center"><a href="index.php" title="Home"> <img src="img/home.png" height="30px"> </a></td>
<td align="center"><a href="dtls.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="dtls_value.php">
<input type="hidden" name="sid" id="sid" value="<?PHP echo $sid;?>">
<table border="2px" width="46%" align="center">
<tr>
<td align="center" width="43%">Department<font color='red'>*</font></td>
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
</select>
<td align="center" width="43%">Post<font color='red'>*</font></td>
<td align="center" width="17%">
<select name="postid" id="postid">
<option value=""> --------Select--------</option>
<?PHP
$getta=mysqli_query($conn,"select * from dept_post order by post") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
		$sl=$ro['sl'];
		$postnm=$ro['post'];
?>
<option value="<?php echo $sl;?>" <?=($sl==$postid)?'Selected':'';?>><?php echo $postnm?></option>
<?PHP
	}
?>
</select>
</tr>
<tr>
<td align="center" width="25%">Salary<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" name="sal" id="sal" value="<?PHP echo $sal;?>"></td>
<td align="center" width="25%">Name<font color='red'>*</font></td>
<td align="center" width="25%"><input type="text" name="nm" id="nm" value="<?PHP echo $nm;?>"></td>
</tr>
<tr>
<td align="center" width="25%">Address<font color='red'>*</font></td>
<td align="center" width="25%"><input type="text" name="addr" id="addr" value="<?PHP echo $addr;?>"></td>
<td align="center" width="25%">Mobile<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" name="cont" id="cont" value="<?PHP echo $cont;?>"></td>
</tr>
<tr>
<td align="center" width="10%" title="Submit" colspan="4"><b><input type="submit" value=" UPDATE "></b></td>
</tr>
</table>
</form>
</body>
</html>