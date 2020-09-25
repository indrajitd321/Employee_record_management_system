<?PHP
include 'config.php';
$sl=$_REQUEST['a'];
$fnm=$_REQUEST['fnm'];

$q="$fnm = '$sl'";
if($fnm=='nm')
{
	$q="$fnm like '%$sl%'";
}
if($fnm=='sal')
{
	$q="$fnm > '$sl'";
}
?>
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
<th>Delete</th>
<th>Edit log</th>
</tr>

<?PHP
$f=0;
$getta=mysqli_query($conn,"select * from emp_det where $q order by deptid,postid,sal,nm,addr") or die(mysqli_error());
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
<td align="center"><a href="delete.php?sid=<?php echo $sl?>&tblnm=emp_det" title="Click to Delete"> <img src="img/delete.png" height="25px"> </a></td>
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
