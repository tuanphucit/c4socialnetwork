<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>C4 Social Network</title>
<link href="../view/layout.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../view/searchBox/default.css" id="default"  />
<link rel="stylesheet" type="text/css" href="../view/searchBox/dummy.css" id="dummy_css"  />
<script type="text/javascript" src="../view/searchBox/applesearch.js"></script>
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/ajax.js"></script>
<script type="text/javascript" src="javascript/addFriend.js"></script>
<script type="text/javascript" src="javascript/script.js"></script>
<script type="text/javascript" src="javascript/commentScript.js"></script>
<script src="../view/SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script src="../view/Scripts/swfobject_modified.js" type="text/javascript"></script>
<link href="../view/SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	//<![CDATA[
		window.onload = function () { applesearch.init(); }
	//]]>
	</script>
</head>
<body>
<div id="container">
  	<div id="header">
    	<div id="site_title">
        	C4 Social Network
        </div>
        <div id="logout">
        	
            <form action="../controller/LogOut.php" method="post">
            	Chào mừng <?php print("<a href=#>$currentUserName</a>");?>
            	<input type="submit" class="btn" value="Đăng xuất"  onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"> 
            </form>
        </div>
    </div> 
    <div id="applesearch">
    	<form action="../view/test.php" method="post">
		<span class="sbox_l"></span><span class="sbox"><input type="search" name="search" id="srch_fld" placeholder="Search..." autosave="applestyle_srch" results="5" onkeyup="applesearch.onChange('srch_fld','srch_clear')" /></span><span class="sbox_r" id="srch_clear"></span>
        </form>
	</div>
    <div id="menu">
    	<span></span>
        <ul>
            <li class="current"><a href=../controller/Home.php><b>Trang chủ</b></a></li>
            <li><a href="../controller/News.php"><b>Tin tức</b></a></li>
            <li><a href="../controller/GetUserInfo.php"><b>Hồ sơ cá nhân</b></a></li>
            <li><a href="../controller/Events.php"><b>Sự kiện</b></a></li>
        </ul>
    </div>
  <div id="banner"> 
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="940" height="350" id="FlashID" title="banner">
      <param name="movie" value="mybanner.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don’t want users to see the prompt. -->
      <param name="expressinstall" value="../view/Scripts/expressInstall.swf" />
      <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
      <!--[if !IE]>-->
      <object type="application/x-shockwave-flash" data="../view/Flash banner/mybanner.swf" width="940" height="350">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="../view/Scripts/expressInstall.swf" />
        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
        <div>
          <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object>
</div>
    <div id="content">
       	<div id="content_left">
    <p style="font-size:25px"><a href=#><?php echo $userName;?></a>
	 <form action="">
          <?php if($checkFriend==-1){?>
          
    	  <input type="button" id="addButton" value="Thêm bạn" class="btn" onclick="addFriend(<?php echo $visitorID;?>,<?php echo $desID;?>)" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"></input>
          <?php } ?>
          </form>
   	      </p>
         
<textarea name="comment" rows="2" cols="50" id="text_content1"></textarea><br />	
			<input style="margin-left:24em" type="submit" value="Chia sẻ" id="Share"class="btn" onmouseup="getScriptPage('output_div','text_content1','1','x')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"></input><br />
          <div id="output_div"></div>
         <hr align="left" width="450" />
		 <p>
		   <?php include "Post2.php"; ?>
	      </p>
<div class="cleaner"></div> 
   	  </div> 
              
<div id="content_right">
	 <?php
			echo "<p align='center'><img src='../user/$avatar1' width=80% alt='avatar' /></p>";
			include "info.php";
      ?>
      <br />
      <div class="box" id="friend">
      <h2>Friends</h2>(<?php echo count($friendList)." friends";?>)<br /> 
            <div style="overflow:auto;width:230px;height:280px;margin:auto">
            <div id=friends>	
            	<hr width='200'/><br></br><div style="overflow:auto;width:230px;height:230px;margin:auto">
               <?php
			   echo "<table width=200px>";
                for($i=0;$i<count($friendList);$i++)
               {
               		
               	    echo "<tr><td width=40%><input type='image' src='../user/$friendAvatar[$i]' width=80% /></td>";
					echo " <td><a href='../controller/Home.php?id=$friendID[$i]'>$friendName[$i]</a></td>";
					echo "</tr>";
		       }
				echo "</table>";
				?>               

               
            </div>  
   		</div>
      </div>
 </div>
 </div>
 <div class="cleaner"></div>
</div>
    
    <div id="footer">  Copyright © 2010 <a href="#"><strong> by C4 Group</strong></a>
    </div> 
    
    
    
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>

