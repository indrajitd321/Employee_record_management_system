<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>POST SETUP</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">POST MANAGEMENT</font></h2></header>
<table border="2px" width="10%" align="right">
<td align="center"><a href="index.php" title="Home"> <img src="img/home.png" height="30px"> </a></td>
<td align="center"><a href="index.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="post_value.php">
<table border="2px" width="46%" align="center">
<tr>
<td align="center" width="43%">Department<font color='red'>*</font></td>
<td align="center" width="17%">
<select name="deptid" id="deptid">
<option value=""> -----Select-----</option>
<?PHP
$getta=mysqli_query($conn,"select * from dept order by deptnm") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
		$sl=$ro['sl'];
		$deptnm=$ro['deptnm'];
?>
<option value="<?php echo $sl;?>"><?php echo $deptnm?></option>
<?PHP
	}
?>
</select>
<td align="center" width="20%">Post<font color='red'>*</font></td>
<td align="center" width="20%"><input type="text" name="post" id="post" placeholder="Aa"></td>
</tr>
<tr>
<td align="center" width="25%">Salary<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" name="salary" id="salary" placeholder="123"></td>
<td align="center" width="20%" title="Submit" colspan="4"><b><input type="submit" value=" SUBMIT "></b></td>
</tr>
</table>
</form>
<br>
<br>
<br>
<table border='2px' width='70%' align='center'>
<tr>
<th>Serial no.</th>
<th>Department Name</th>
<th>Post</th>
<th>Salary</th>
<th>Edit</th>
<th>Delete</th>
<th>Edit log</th>
</tr>

<?PHP
$f=0;
$getta=mysqli_query($conn,"select * from dept_post order by deptid") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	$f++;
		$sl=$ro['sl'];
		$deptid=$ro['deptid'];
		$post=$ro['post'];
		$salary=$ro['salary'];
		
			$get=mysqli_query($conn,"select * from dept where sl='$deptid'") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$deptnm=$ro1['deptnm'];
	}
		
	$edt=0;
		
	$get=mysqli_query($conn,"select * from edit_log where tblnm='dept_post' and tblsl='$sl'") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$edt++;
	}
		
?>
<tr>
<td  align="center"><?php echo $f;?></td>
<td  align="center"><?php echo $deptnm;?></td>
<td  align="center"><?php echo $post;?></td>
<td  align="center"><?php echo $salary;?></td>
<td align="center"><a href="post_edt.php?sid=<?php echo $sl?>" title="Click to Edit"> <img src="img/edit.png" height="25px"> </a></td>
<td align="center"><a href="delete.php?sid=<?php echo $sl?>&tblnm=dept_post" title="Click to Delete"> <img src="img/delete.png" height="25px"> </a></td>
<td align="center">
<?PHP
if($edt>0)
{
?>
<a href="editlog.php?sid=<?php echo $sl?>&tblnm=dept_post" title="Click to Show"> <img src="img/show.png" height="20px"> </a>
<?PHP
}
?>
<?php
	}
?>
</td>
</tr>
</table>
</body>

</html>