<?php
include 'config.php';
$deptnm=$_POST['deptnm'];
$sid=$_POST['sid'];

if($sid=='')
{	
	if($deptnm=='')
	{
	?>
<script language="javascript">
alert('Please fill Department value !');
window.history.go(-1);
</script>
<?php	
	}
	else
	{
	$f=0;
	$getta=mysqli_query($conn,"select * from dept where deptnm='$deptnm'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
		{	
			$f++;
		}

	if($f==0)
	{
	$query2 = "INSERT INTO dept (deptnm) VALUES ('$deptnm')";
	$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	$msg="Submitted Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="dept.php";
</script>
<?php
	}
	else
	{
?>
<script language="javascript">
alert('Department has already been added !');
window.history.go(-1);
</script>
<?php	
	}
	}
	}
else
{
	if($deptnm=='')
	{
	?>
<script language="javascript">
alert('Please fill Department value !');
window.history.go(-1);
</script>
<?php
	}
	else
		{
	$f=0;
	$getta=mysqli_query($conn,"select * from dept where deptnm='$deptnm' and sl!='$sid'") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
	$f++;
    }
	
	
	if($f==0)
	{	

	{
		$getta=mysqli_query($conn,"select * from dept where sl='$sid'") or die(mysqli_error());
		while($ro=mysqli_fetch_array($getta))
	{	
		$deptnm1=$ro['deptnm'];
	}

	if($deptnm1!=$deptnm)
	{
		$query2 = "INSERT INTO edit_log (newvl,oldvl,tblsl,tblnm,fldnm) VALUES ('$deptnm','$deptnm1','$sid','dept','Department Name')";
		$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
	}
$query2 = "UPDATE dept set deptnm='$deptnm' where sl='$sid'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
$msg="Updated Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="dept.php";
</script>
<?php
	}
}
else
{
?>
<script language="javascript">
alert('Department has already been added !');
window.history.go(-1);
</script>
<?php
}
}}
?>

