<?php
  include '../model/Model.php';
  $ownID=$_COOKIE['ownID'];
  $model=new Model();
  $user=$model->getUserAccountByID($ownID);
  $avatar1=$user->getUserAvatar();
  $userName=$user->getUserName();
?>