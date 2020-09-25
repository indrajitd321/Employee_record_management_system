<?php
include 'config.php';
$deptid=$_POST['deptid'];
$postid=$_POST['postid'];
$sal=$_POST['sal'];
$nm=$_POST['nm'];
$addr=$_POST['addr'];
$cont=$_POST['cont'];
$sid=$_POST['sid'];

if($sid=='')
{	
	if($deptid=='' or $postid=='' or $sal=='' or $nm=='' or $addr=='' or $cont=='')
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
	$getta=mysqli_query($conn,"select * from emp_det where cont='$cont'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
		{	
			$f++;
		}

	if($f==0)
	{
	$query2 = "INSERT INTO emp_det (deptid,postid,sal,nm,addr,cont) VALUES ('$deptid','$postid','$sal','$nm','$addr','$cont')";
	$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	$msg="Submitted Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="dtls.php";
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
}}
else
{
	if($deptid=='' or $postid=='' or $sal=='' or $nm=='' or $addr=='' or $cont=='')
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
	$getta=mysqli_query($conn,"select * from emp_det where cont='$cont' and sl!='$sid'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
		{	
			$f++;
		}

	if($f==0)
	{
		{
		$getta=mysqli_query($conn,"select * from emp_det where sl='$sid'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
	{	
		$deptid1=$ro['deptid'];
		$postid1=$ro['postid'];
		$sal1=$ro['sal'];
		$nm1=$ro['nm'];
		$addr1=$ro['addr'];
		$cont1=$ro['cont'];
	}

	if($deptid1!=$deptid)
	{
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm,reftbl,frffld) VALUES ('$deptid','$deptid1','$sid','emp_det','Department Name','dept','deptnm')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($postid1!=$postid)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm,reftbl,frffld) VALUES ('$postid','$postid1','$sid','emp_det','Post','dept_post','post')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
		if($sal1!=$sal)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$sal','$sal1','$sid','emp_det','Salary')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
	if($nm1!=$nm)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$nm','$nm1','$sid','emp_det','Name')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
	if($addr1!=$addr)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$addr','$addr1','$sid','emp_det','Address')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}		
	if($cont1!=$cont)
	{
		
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$cont','$cont1','$sid','emp_det','Mobile')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
$query2 = "UPDATE emp_det set deptid='$deptid',postid='$postid',sal='$sal',nm='$nm',addr='$addr',cont='$cont' where sl='$sid'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
$msg="Updated Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="dtls.php";
</script>
<?php
	}
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
?>
