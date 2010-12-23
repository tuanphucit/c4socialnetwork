<?php
include '../model/Model.php';
$id=$_COOKIE["ownID"];
$model=new Model();

$user=$model->getUserInfo($id);
$userUrl=$user->getUserUrl();
$userYM=$user->getUserYM();
$userSkype=$user->getUserSkype();
$userMobile=$user->getUserMobile();
$userResident=$user->getUserResident();
$userNativeVillage=$user->getUserNativeVillage();
$userFavoriteQuote=$user->getUserFavoriteQuote();
$userBio=$user->getUserBio();
$userBook=$user->getUserBook();
$userMusic=$user->getUserMusic();
$userInterested=$user->getUserInterested();

$userAcc=$model->getUserAccountByID($id);
$userName=$userAcc->getUserName();
$userPass=$userAcc->getUserPassword();
$userAvatar=$userAcc->getUserAvatar();
$userEmail=$userAcc->getUserEmail();
$userSchoolYear=$userAcc->getUserSchoolYear();
$userBirthday=$userAcc->getUserBirthday();
$userYear=substr($userBirthday,0,4);
//echo $userYear;
$userMonth=substr($userBirthday,5,2);
$userDay=substr($userBirthday,8,2);
$userSex=$userAcc->getUserSex();
//echo $userSex;
include "../view/BasicInformation.php";
?>