<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>EDIT LOG</title>
  <link href="https://fonts.googleapis.com/css?family=Spartan&display=swap" rel="stylesheet">
  <style>
body {
  font-family: 'Spartan';
}
</style>
</head>
<body>
<header><h2 align="center"><font color="#00a8ff">EDIT LOG</font></h2></header>
<?php
include 'config.php';
$sid=$_REQUEST['sid'];
$tblnm=$_REQUEST['tblnm'];

?>


<table border='3' width='80%' align='center'>
<tr>
<th>Serial no.</th>
<th>field name</th>
<th>old value</th>
<th>new value</th>

</tr>
<?PHP
$f=0;
$getta=mysqli_query($conn,"select * from edit_log where tblsl='$sid' and tblnm='$tblnm'") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	$f++;
		$ed_fldnm=$ro['fldnm'];
		$ed_oldvl=$ro['oldvl'];
		$ed_newvl=$ro['newvl'];
		$reftbl=$ro['reftbl'];
		$reffld=$ro['frffld'];
		
		if($reftbl!='')
	{
	$get=mysqli_query($conn,"select * from $reftbl where sl=$ed_oldvl") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$ed_oldvl=$ro1[$reffld];
	}
	
	$get=mysqli_query($conn,"select * from $reftbl where sl=$ed_newvl") or die(mysqli_error());
	while($ro1=mysqli_fetch_array($get))
	{	
		$ed_newvl=$ro1[$reffld];
	}
	}	
				
?>

<tr>
<td  align="center"><?php echo $f;?></td>
<td  align="center"><?php echo $ed_fldnm;?></td>
<td  align="center"><?php echo $ed_oldvl;?></td>
<td  align="center"><?php echo $ed_newvl;?></td>
</tr>
<?PHP
    }
?>

</table>
</body>
</html>