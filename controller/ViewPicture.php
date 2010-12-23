<html>
<head></head>
<body>

<?php 
	$ownID=$_COOKIE["ownID"];
	setcookie("ownID",$ownID,time()+3600);
 $dir=$_COOKIE["myFolder"];
 if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
    	$i=0;
        while (($file = readdir($dh)) !== false) {
        	if($file !=="."&& $file!==".."){
             $list[$i]=$file;
           
        	$i++;
        	}
        }
        closedir($dh);
    }
}
// ViewPicture by Name Function

                                                       //////          Template
// User Function

		//print "<ul>";
$MemberDisplayList = '<table border="2" align="center" cellpadding="6"><tr>  ';
 foreach($list as $file){
 
 	//print "<li>$file<br>";
 	$user_pic = "<img src=\"$dir/$file\" width=\"108px\" border=\"1\" />";
 	
 	$MemberDisplayList .= '<td>'.$user_pic.'</td>';
 	
 
 	//print "Uploaded Date :" .date("h:m:s d/m/Y",filemtime("upload/$file"));
 
 }
 $MemberDisplayList .= '              </tr>
            </table>  ';
 //	print "</ul>";
 echo $MemberDisplayList;
?>
</body>
</html>