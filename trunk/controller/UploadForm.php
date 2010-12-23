

<html>
<head>
	<title>Upload Picture</title>
	<p>How many Files you want to Upload?</p>
</head>
<body>
<?php 
	 $ownID=$_COOKIE["ownID"];
	 setcookie("ownID",$ownID,time()+3600);                  // Template       ?????
	                //$ownID=26;
	$folder="../user/$ownID/picture/";
	setcookie("myFolder",$folder,time()+3600);
	//echo $folder;
	if(array_key_exists("num",$_POST))
		$num=$_POST["num"];
?>
<form action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
 	<select name="num">
 	<?php 
 		for($i=1;$i<=10;$i++){
 			if($i==$num)
 			echo "<option selected>$i</option>";
 			else
 			echo "<option>$i</option>";
 			}
 	?>
 	</select>
 	<input type="submit" value="Submit"></input>
</form>

<?php 
 if($num !=0){
     echo "<form action=".$_SERVER['PHP_SELF']." method=\"POST\" enctype='multipart/form-data'>";
 	
 	for($i=0;$i<$num;$i++)
 		echo "<input type=\"file\" name=\"file[]\" id=\"file\" ></input><br>";
		echo "<input type=\"submit\" value= \"Upload\"></input>";
 		echo"</form>";	
 	
 	
 }

?>
<?php
$count=count($_FILES["file"]["error"]);
for($i=0;$i<$count;$i++){
if($_FILES["file"]["error"][$i]>0)
 print "error <br><br>";
 else {
  if (file_exists("$folder" . $_FILES["file"]["name"][$i]))
      {
      print $_FILES["file"]["name"][$i] . " already exists <br>";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"][$i], "$folder" . $_FILES["file"]["name"][$i]);
      echo "Upload: ".$_FILES["file"]["name"][$i]. "<br />";
  	echo "Type: ".$_FILES["file"]["type"][$i] . "<br />";
  	echo "Size: ".($_FILES["file"]["size"][$i]/ 1024) . " Kb<br />";
      echo "Stored in: " . "$folder" . $_FILES["file"]["name"][$i]."<br>";
      }
 	}
 	
}
?>
<br>
<br>
<a href="ViewPicture.php">Visit your Uploaded Files</a>
</body>

</html>

