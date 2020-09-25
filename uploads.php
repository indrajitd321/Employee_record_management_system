<?php
$nm=$_POST['pic_nm'];
$a=$_FILES["file"]["size"];
$b=$a/1024;
echo $b."Kb<br>";
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 327680)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
       if (file_exists("pic/" .$nm.".png"))
      {
      echo $nm.".png already exists. ";
      }
    else
      {
	  $pic1="pic/".$nm.".png";
	  

      move_uploaded_file($_FILES["file"]["tmp_name"],$pic1);
	  $msg="file uploded!";
	  ?>
	  <script language="javascript">
	alert('<?=$msg;?>');
	document.location="dtls.php";
	</script>
	  <?php
	  <img src="<?php echo $pic1; ?>" width="50px">
        }
    }
  }
else
  {
  echo "Invalid file";
  }
?>

