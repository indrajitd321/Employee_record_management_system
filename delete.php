<?php 
include 'config.php';
$sid=$_REQUEST['sid'];
$tblnm=$_REQUEST['tblnm'];

$query2 = "delete from $tblnm where sl='$sid'";
$result2 = mysqli_query($conn,$query2)or die (mysqli_error());
$msg="Deleted Successfully. Thank You";
?>
<script language="javascript">
alert('<?=$msg;?>');
document.location="index.php";
</script>