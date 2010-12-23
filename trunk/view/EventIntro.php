<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>C4 Social Network</title>
<link href="../view/layout.css" rel="stylesheet" type="text/css" />
<script src="../view/Scripts/swfobject_modified.js" type="text/javascript"></script>
<script type="text/javascript" src="javascript/jquery.js"></script>
<script type="text/javascript" src="javascript/script.js"></script>
<script type="text/javascript" src="javascript/commentScript.js"></script>
</head>
<body>
<div id="container">
  	<div id="header">
    	<div id="site_title">
        	C4 Social Network
        </div>
    </div> 
    
    <div id="menu">
    	<span></span>
        <ul>
            <li><a href="../controller/Home.php"><b>Trang chủ</b></a></li>
            <li><a href="../controller/News.php"><b>Tin tức</b></a></li>
            <li><a href="../controller/GetUserInfo.php"><b>Hồ sơ cá nhân</b></a></li>
            <li  class="current"><a href="../controller/Events.php"><b>Sự kiện</b></a></li>
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
          <p style="font-size:25px"><a href="#"><?php echo $eventName;?></a>
          <form action="../controller/RequestedEventProcess.php" method="post">
          <?php if($flag==2){?>
          <input type="submit" class="btn" name="accept" value="Đồng ý" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'" /><input type="submit" class="btn" name="deny" value="Từ chối" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'" />
          <input type="hidden" name="eventID" value=<?php echo $eventID;?> />
          <?php }?>
          </form>
           <form action="../controller/EditEvent.php" method="post">
          <?php if($flag==3){?>
          <input type="submit" class="btn" value="Chỉnh sửa" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'" />
          <input type="hidden" name="eventID" value=<?php echo $eventID;?> />
          <?php }?>
          </form>
          </p>
          
          <hr />
          <table style="margin-top:10px;margin-left:20px;width:500px">
          <tr>
          	<td width="30%">Thời gian bắt đầu:</td>
            <td><?php echo $eventStart; ?></td>
          </tr>
          <tr>
          	<td width="30%">Thời gian kết thúc:</td>
            <td><?php echo $eventEnd; ?></td>
          </tr>
        	<tr>
          	<td  width="30%">Người tạo sự kiện:</td>
            <td><?php echo "<a href='../controller/Home.php?id=$eventCreatorID'>".$eventCreatorName."</a>"; ?></td>
          </tr>
          <tr>
          	<td  width="30%" valign="top">Người tham gia:</td>
            <td>
            <?php
            	if($eventJoinList!=NULL){
				//echo "<table>";
				for($i=0;$i<count($userJoinID);$i++)
				{
					//echo "<tr>";
    				//echo "<td><img src='../user/".$userJoinAvatar[$i]."' width='40' /></td>";
					echo "<a href=../controller/Home.php?id=".$userJoinID[$i].">".$userJoin[$i]."</a>";
					
				}
				//echo "</table>";	
				}
			?>
            </td>
          </tr>
          <tr>
          	<td  width="30%" valign="top">Nội dung:</td>
            <td><?php echo $eventIntro; ?></td>
          </tr>
		  </table>
           <br /><br /><br /><p style="font-size:25px"><a href="#">Ý kiến </a>
          <hr />
          <textarea name="comment" rows="2" cols="50" id="text_content1"></textarea><br />	
			<input style="margin-left:24em" type="submit" value="Chia sẻ" id="Share"class="btn" onmouseup="getScriptPage('output_div','text_content1','1','x')" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"></input><br />
          <div id="output_div"></div>
         <hr align="left" width="450" />
          <?php
		  	include '../view/Post2.php';
		  ?>
          <div class="cleaner"></div>
      </div>
         <div id="content_right">
         <?php echo "<p style='font-size:25px;text-align:center'><a href='#'>$userName</a><br /><br />";
          echo "<img src='../user/$avatar1' width=80%/></p>";
		  ?>
          </div>
        <div class="cleaner"></div> 
     </div>
    

    
    <div id="footer">  Copyright © 2010 <a href="#"><strong> by C4 Group</strong></a>
    </div> 
    
    
    
</div>
</body>
</html>

