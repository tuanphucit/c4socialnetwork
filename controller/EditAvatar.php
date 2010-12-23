<?php
include '../model/Model.php';
include '../model/UserAccount.php';
$checkAvatar=1;
	$ownID=$_COOKIE["ownID"];
	setcookie("ownID",$ownID,time()+3600);

	$folder="../user/$ownID/avatar/";
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
   else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"], "$folder" . $_FILES["file"]["name"]);
    //  echo "Upload: ".$_FILES["file"]["name"]. "<br />";
  	 
      }
      $userAvatarTemp="$folder" . $_FILES["file"]["name"];
     // $userAvatarTemp="$folder/$avatarName";
    //  echo $avatarName;
    $model=new Model();
    $user=$model->getUserAccountByID($ownID);
    $userAvatar="$ownID/avatar/".$_FILES["file"]["name"];
    $user->setUserAvatar($userAvatar);
	$userName=$user->getUserName();
   $model->updateUserAccount($user);
   
 
      include "../view/EditAvatar.php";
  


?>