<?PHP
include 'config.php';
$sl=$_REQUEST['a'];
$getta=mysqli_query($conn,"select * from dept_post where sl='$sl' order by post") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
		
		$salary=$ro['salary'];
	}
?>
<input type="number" name="sal" id="sal" value="<?PHP echo $salary;?>">
