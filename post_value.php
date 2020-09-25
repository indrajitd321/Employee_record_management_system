<?php
include 'config.php';
$deptid=$_POST['deptid'];
$post=$_POST['post'];
$salary=$_POST['salary'];
$sid=$_POST['sid'];

if($sid=='')
{	
	if($deptid=='' or $post=='' or $salary=='')
	{
	?>
<script language="javascript">
alert('Please fill all the mandetory fields !');
window.history.go(-1);
</script>
<?php	
}
	else
	{
	$f=0;
	$getta=mysqli_query($conn,"select * from dept_post where (post='$post' and deptid='$deptid')") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
		{	
			$f++;
		}

	if($f==0)
	{
	$query2 = "INSERT INTO dept_post (deptid,post,salary) VALUES ('$deptid','$post','$salary')";
	$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	$msg="Submitted Successfully. Thank You";
	?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="post.php";
</script>
<?php
	}
	else
	{
?>
<script language="javascript">
alert('Data has already been added !');
window.history.go(-1);
</script>
<?php	
	}
	}
	}
else
{
	if($deptid=='' or $post=='' or $salary=='')
	{
	?>
<script language="javascript">
alert('Please fill all the mandetory fields !');
window.history.go(-1);
</script>
<?php
	}
	else
	{
	$f=0;
	$getta=mysqli_query($conn,"select * from dept_post where (post='$post' and deptid='$deptid') and sl!='$sid'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
		{	
			$f++;
		}

	if($f==0)
	{
		{
		$getta=mysqli_query($conn,"select * from dept_post where sl='$sid'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
	{	
		$deptid1=$ro['deptid'];
		$post1=$ro['post'];
		$salary1=$ro['salary'];
	}

	if($deptid1!=$deptid)
	{
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm,reftbl,frffld) VALUES ('$deptid','$deptid1','$sid','dept_post','Department Name','dept','deptnm')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($post1!=$post)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$post','$post1','$sid','dept_post','Post')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($salary1!=$salary)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$salary','$salary1','$sid','dept_post','Salary')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
$query2 = "UPDATE dept_post set deptid='$deptid',post='$post',salary='$salary' where sl='$sid'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
$msg="Updated Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="post.php";
</script>
<?php
	
	}}
else
{
?>
<script language="javascript">
alert('Data has already been added !');
window.history.go(-1);
</script>
<?php
}
}}
?>
