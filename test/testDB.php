<?php
//include '../model/Model.php';
include '../model/UserAccount.php';
 //$test = new Model();
 //$userAccount=$test->getUserAccount();
 $newUser= new UserAccount('3','test password','testuser1','nameOfTestUser1',
		'1','testUser1$mail','52','2010-11-08','male');
 echo $newUser->getUserEmail();
 

 

?>