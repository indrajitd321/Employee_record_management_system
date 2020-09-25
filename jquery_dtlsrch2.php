<?PHP
include 'config.php';
$srchby=$_REQUEST['a'];
if($srchby=="")
{
?>
Please Select Search By!
<?PHP	
}
else
{
if($srchby=='sal')
{
	$txt="Salary";
}
if($srchby=='nm')
{
	$txt="Name";
}


if($srchby=='deptid')
	{
?>
<select name="srch" id="srch" onchange="srch4(this.value,'<?PHP echo $srchby;?>')">
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
<?PHP	
	}
else
{
?>
<input type="text" name="srch" id="srch" placeholder="Input <?PHP echo $txt;?>" Onkeyup="srch4(this.value,'<?PHP echo $srchby;?>')">
<?PHP	
}}
?>
