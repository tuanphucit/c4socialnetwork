<?php
date_default_timezone_set("	Asia/Ho_Chi_Minh");
include '../model/Model.php';
$content=$_POST['comment'];
$postID=$_POST['postid'];
//echo "post id ".$postID."<br>";
$id=$_COOKIE["ownID"];
//echo "userid".$id."<br>";
$time = time();
$curtime=date("y-m-d H:i:s");
//echo $curtime."<br>";
$model=new Model();
$commentID=$model->getCommentID();
$comment=new Comment($commentID,$id,$postID ,$curtime,$content,'0','1');
$check=$model->setNewComment($comment);

$user=$model->getUserAccountByID($id);
$userAvatar=$user->getUserAvatar();
$userName=$user->getUserName();

$dataComment="$userName:$userAvatar";
//echo "<br>Content: ".$content."<br>";
//echo "Time: ".$curtime."<br>";
//echo $content;
echo $dataComment;
?>