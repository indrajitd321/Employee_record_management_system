<?PHP
include 'config.php';
$dep=$_REQUEST['a'];
?>
<select name="postid" id="postid" onchange="fun1(this.value)">
<option value=""> --------Select--------</option>
<?PHP
$getta=mysqli_query($conn,"select * from dept_post where deptid='$dep' order by post") or die(mysqli_error());
	while($ro=mysqli_fetch_array($getta))
	{	
		$sl=$ro['sl'];
		$post=$ro['post'];
?>
<option value="<?php echo $sl;?>"><?php echo $post?></option>
<?PHP
	}
?>
</select>