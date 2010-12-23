<?php
include '../model/Model.php';
include '../model/UserAccount.php';
$id=$_COOKIE["ownID"];
$model=new Model();
$user=$model->getUserAccountByID($id);

if($_POST['userUrl']!=NULL)
{
	$userUrl=$_POST['userUrl'];
	$check=1;
}
if($_POST['userYM']!=NULL)
{
	$userYM=$_POST['userYM'];
	$check=1;
}
if($_POST['userSkype']!=NULL)
	{$userSkype=$_POST['userSkype'];
	$check=1;}
if($_POST['userMobile']!=NULL)
	{$userMobile=$_POST['userMobile'];
	$check=1;}
if($_POST['userResident'])
	{$userResident=$_POST['userResident'];
	$check=1;}
if($_POST['userNativeVillage'])
{	$userNativeVillage=$_POST['userNativeVillage'];
	$check=1;}
if($_POST['userFavoriteQuote'])
	{$userFavoriteQuote=$_POST['userFavoriteQuote'];
	$check=1;}
if($_POST['userBio'])
	{$userBio=$_POST['userBio'];
	$check=1;}
	
if($_POST['userBook'])
	{
	$userBook=$_POST['userBook'];
	$check=1;}
if($_POST['userMusic'])
{
	$userMusic=$_POST['userMusic'];
	$check=1;}
if($_POST['userInterested'])
	{$userInterested=$_POST['userInterested'];
	$check=1;}
if($_POST['userPass'])
{
	$userPassPlain=$_POST['userPass'];
	$userPass=md5($userPassPlain);
	$user->setUserPassword($userPass);
	$check2=1;
}
if($_POST['userSchoolYear'])
{
	$userSchoolYear=$_POST['userSchoolYear'];
	$user->setUserSchoolYear($userSchoolYear);
	$check2=1;
}
if($_POST['userDay'])
	{$userDay=$_POST['userDay'];
	$check2=1;}
if($_POST['userMonth'])
	{$userMonth=$_POST['userMonth'];
	$check2=1;}
if($_POST['userYear'])
	{$userYear=$_POST['userYear'];	
	$check2=1;}
	if($check2==1)	{
	$userBirthday="$userYear"."$userMonth"."$userDay";
	$user->setUserBirthday($userBirthday);
	$check2=1;}
if($_POST['userSex'])
{	
	$userSex=$_POST['userSex'];	
	$user->setUserSex($userSex);
	$check2=1;
}
if($_POST['userName'])
{	
	$userName=$_POST['userName'];	
	$user->setUserName($userName);
	$check2=1;
}
	
	
	
	
	


$userinfo=new UserInfo($userUrl,$userYM,$userSkype,$userMobile,$userResident,$userNativeVillage,$userFavoriteQuote,$userBio,$userBook,$userMusic,$userInterested);
	if($check==1)
	$model->updateUserInfo($id,$userinfo);
	if($check2==1)
	$model->updateUserAccount($user);


Header("Location: ../controller/GetUserInfo.php");

?>
