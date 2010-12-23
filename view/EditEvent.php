<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>C4 Social Network</title>
<link href="../view/layout.css" rel="stylesheet" type="text/css" />
<link rel="STYLESHEET" type="text/css" href="../view/codebase/dhtmlxcalendar.css">
<link rel="STYLESHEET" type="text/css" href="../view/codebase/skins/dhtmlxcalendar_simplecolordark.css">
<script type="text/javascript" src="../view/codebase/dhtmlxcommon.js"></script>
<script type="text/javascript" src="../view/codebase/dhtmlxcalendar.js"></script>
<script>

window.dhx_globalImgPath = "../view/codebase/imgs/";

</script>

<script src="../view/Scripts/swfobject_modified.js" type="text/javascript"></script>
<script>
	var cal1,cal2;
   window.onload = function() {
    cal1 = new dhtmlxCalendarObject('cal1');
	cal2 = new dhtmlxCalendarObject('cal2');
}
</script>
</head>
<body>
<div id="container">
  <div id="header">
    <div id="site_title"> C4 Social Network </div>
  </div>
  <div id="menu"> <span></span>
    <ul>
      <li><a href="../controller/Home.php"><b>Trang chủ</b></a></li>
      <li><a href="../controller/News.php"><b>Tin tức</b></a></li>
      <li><a href="../controller/GetUserInfo.php"><b>Hồ sơ cá nhân</b></a></li>
      <li class="current"><a href="../controller/Events.php"><b>Sự kiện</b></a></li>
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
      <p style="font-size:25px"><a href="#">Chỉnh sửa sự kiện</a> </p>
      <hr />
      <form action="../controller/EditEventProcess.php" method="post">
        <table style="margin-top:10px;margin-left:20px">
        <tr>
          <td>Tên sự kiện:</td>
          <td  colspan="3"><input type="text" size="51" value ="<?php echo $eventName; ?>" name="eventName"></td>
        </tr>
        <tr>
          <td>Loại sự kiện:</td>
          <td><input type="radio" name="eventType" value="1" checked />Công cộng <input type="radio" name="eventType" value="0" />Riêng tư</td>
        </tr>
        <tr>
        	<td>Thời gian bắt đầu:</td>
            <td><input type="text" id="cal1" readonly="true" name="eventStartDate" value="<?php echo $eventStart;?>"/></td>
            <td>Giờ:</td>
            <td><select name="eventStartTime">
            		<?php
						print("<option selected>$eventStartTime</option>");
						for($i=0;$i<10;$i++) print("<option value='0$i:00:00'>$i am</option>");
						echo "<option value='10:00:00'>10 am</option>";
						echo "<option value='11:00:00'>11 am</option>";
						echo "<option value='12:00:00'>12 pm</option>";
						for($i=1;$i<12;$i++) 
						{
							$j=$i+12;
							print("<option value='$j:00:00'>$i pm</option>");
						}
					?>
            	</select>
            </td>
        </tr>
         <tr>
        	<td>Thời gian kết thúc:</td>
            <td><input type="text" id="cal2" readonly="true" name="eventEndDate" value=<?php echo $eventEndDate; ?>/></td>
            <td>Giờ:</td>
            <td><select name="eventEndTime">
            		<?php
						print("<option selected>$eventEndTime</option>");
						for($i=0;$i<10;$i++) print("<option value='0$i:00:00'>$i am</option>");
						echo "<option value='10:00:00'>10 am</option>";
						echo "<option value='11:00:00'>11 am</option>";
						echo "<option value='12:00:00'>12 pm</option>";
						for($i=1;$i<12;$i++) 
						{
							$j=$i+12;
							print("<option value='$j:00:00'>$i pm</option>");
						}
					?>
            	</select>
            </td>
        </tr>		
        <tr>
          <td>Nội dung:</td>
          <td colspan="3"><textarea cols="39" rows="3" name="eventIntro" value="dshdfhsfhshdf"></textarea></td>
        </tr>
        <tr>
          <td><input type="submit" class ="btn" value="Lưu thay đổi" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/>
          <input type="hidden" name="eventID" value="<?php echo $eventID;?>" />
      </form>
      </td>
      <td></td>
      </tr>
      </tr>
      </table>
      <div class="cleaner"></div>
    </div>
    <div id="content_right">
      <?php echo "<p style='font-size:25px;text-align:center'><a href='#'>$userName</a><br /><br />";
          echo "<img src='../user/$avatar1' width=80%/></p>";
		  ?>
    </div>
    <div class="cleaner"></div>
  </div>
  <div id="footer"> Copyright © 2010 <a href="#"><strong> by C4 Group</strong></a> </div>
</div>
</body>
</html>
