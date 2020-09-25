<?php
include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Employee Details</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>

<script>
function fun(a)
 {   
 $('#dv1').load('jquery_post.php?a='+a).fadeIn('fast');
 $('#dv3').load('jquery_dtls.php?a='+a).fadeIn('fast');
} 
function fun1(a)
 {   
 $('#dv2').load('jquery_sal.php?a='+a).fadeIn('fast');
  $('#dv3').load('jquery_dtls1.php?a='+a).fadeIn('fast');
}
function srch1(a)
 { 
  $('#dv3').load('jquery_dtlsnm.php?a='+a).fadeIn('fast');

}
function srch2(a)
 { 
  $('#srchby').load('jquery_dtlsrch2.php?a='+a).fadeIn('fast');

}

function srch4(a,fnm)
 { 
  $('#dv3').load('jquery_dtlssrch4.php?a='+a+'&fnm='+fnm).fadeIn('fast');

}
 function checkall(val)
{
	var chk = document.getElementsByName('chk[]');
	//alert(chk.length);
	//alert(val);
	frmlen = chk.length;
	for(i=0;i<frmlen;i++)
	{
		chk[i].checked = val;
	}
}
</script>

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
<td align="center"><a href="index.php" title="Back"> <img src="img/back.png" height="25px"> </a></td>
<td align="center"><a href="search.php" title="Search"> <img src="img/search.png" height="25px"> </a></td>
</table>
<form name="main" method="post" action="dtls_value.php">
<table border="2px" width="46%" align="center">
<tr>
<td align="center" width="43%">Department<font color='red'>*</font></td>
<td align="center" width="17%">
<select name="deptid" id="deptid" onchange="fun(this.value)">
<option value=""> --------Select--------</option>
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
<td align="center" width="43%">Post<font color='red'>*</font></td>
<td align="center" width="17%">
<div id="dv1">
<select name="postid" id="postid" >
<option value=""> --------Select--------</option>
</select>
</div>
</tr>
<tr>
<td align="center" width="25%">Salary<font color='red'>*</font></td>
<td align="center" width="25%">
<div id="dv2">
<input type="number" name="sal" id="sal">
</div>
</td>
<td align="center" width="25%">Name<font color='red'>*</font></td>
<td align="center" width="25%"><input type="text" name="nm" id="nm" placeholder="Aa"></td>
</tr>
<tr>
<td align="center" width="25%">Address<font color='red'>*</font></td>
<td align="center" width="25%"><input type="text" name="addr" id="addr" placeholder="Aa"></td>
<td align="center" width="25%">Mobile<font color='red'>*</font></td>
<td align="center" width="25%"><input type="number" name="cont" id="cont" placeholder="123"></td>
</tr>
<tr>
<td align="center" width="10%" title="Submit" colspan="4"><b><input type="submit" value=" SUBMIT "></b></td>
</tr>
</table>
</form>
<br>
<div id="srch" align="center">
<input type="text" name="srchnm" id="srchnm" placeholder="Search by name" Onkeyup="srch1(this.value)">
<br>
<br>
<br>
Search By : <select name="deptid" id="deptid" Onchange="srch2(this.value)">
<option value=""> ----Select----</option>
<option value="deptid">Department</option>
<option value="sal">Salary</option>
<option value="nm">Name</option>
</select>
<br>
<br>
<br>
<div id="srchby">
<input type="text" name="srch" id="srch" placeholder="Search..." Onkeyup="srch4(this.value)">
</div>
</div>
<br>
<br>
<div id="dv3">
<table border='2px' width='70%' align='center'>
<tr>
<th>Serial no.</th>
<th>Department</th>
<th>Post</th>
<th>Salary</th>
<th>Name</th>
<th>Address</th>
<th>Mobile</th>
<th>Edit</th>
<th  width="10%" valign="top">Delete All<input type="checkbox" name="chkall" onchange="checkall(this.checked)" style="width:20px;"/>
</th>
<th>Edit log</th>
</tr>

<?PHP
$f=0;
$getta=mysqli_query($conn,"select * from emp_det order by deptid,postid,sal,nm,addr") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	$f++;
		$sl=$ro['sl'];
		$deptid=$ro['deptid'];
		$postid=$ro['postid'];
		$sal=$ro['sal'];
		$nm=$ro['nm'];
		$addr=$ro['addr'];
		$cont=$ro['cont'];
		
	$get=mysqli_query($conn,"select * from dept where sl='$deptid'") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$deptnm=$ro1['deptnm'];
	}
		$get=mysqli_query($conn,"select * from dept_post where sl='$postid'") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$post=$ro1['post'];
	}
		
	$edt=0;
		
	$get=mysqli_query($conn,"select * from edit_log where tblnm='emp_det' and tblsl='$sl'") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$edt++;
	}
		
?>
<tr>
<td  align="center"><?php echo $f;?></td>
<td  align="center"><?php echo $deptnm;?></td>
<td  align="center"><?php echo $post;?></td>
<td  align="center"><?php echo $sal;?></td>
<td  align="center"><?php echo $nm;?></td>
<td  align="center"><?php echo $addr;?></td>
<td  align="center"><?php echo $cont;?></td>
<td align="center"><a href="dtls_edt.php?sid=<?php echo $sl?>" title="Click to Edit"> <img src="img/edit.png" height="25px"> </a></td>
<td align="center"> <input type="checkbox" name="chk[]" value="<?php echo $sl;?>" style="width:20px;"/><a href="delete.php?sid=<?php echo $sl?>&tblnm=emp_det" ></a></td>       
<td align="center">
<?PHP
if($edt>0)
{
?>
<a href="editlog.php?sid=<?php echo $sl?>&tblnm=emp_det" title="Click to Show"> <img src="img/show.png" height="20px"> </a>
<?PHP
}
?>
<?php
	}
?>
</td>
</tr>
</table>
</div>
</body>
</html>