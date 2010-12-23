<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>C4 Social Network</title>
<link href="../view/layout.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="javascript/ajax.js"></script>
<script type="text/javascript" src="javascript/postHandle.js"></script>
<script type="text/javascript" src="javascript/commentHandle.js"></script>
<script src="../view/SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script src="../view/Scripts/swfobject_modified.js" type="text/javascript"></script>
<link href="../view/SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="container">
  <div id="header">
    <div id="site_title"> C4 Social Network </div>
  </div>
  <div id="menu"> <span></span>
    <ul>
      <li><a href=../controller/Home.php><b>Trang chủ</b></a></li>
      <li><a href="../controller/News.php"><b>Tin tức</b></a></li>
      <li class="current"><a href="../controller/GetUserInfo.php"><b>Hồ sơ cá nhân</b></a></li>
      <li><a href="../view/Events.php"><b>Sự kiện</b></a></li>
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
   
      <form style="margin-top:5em;margin-left:8em" METHOD=POST ACTION="../controller/EditAvatar.php" enctype="multipart/form-data">
        Select an image file on your computer (4MB max):<br />
        <input type="file" name="file" size=40>
        <br />
        <INPUT TYPE=SUBMIT class="btn" VALUE="Upload" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'">
      </form>
      
      <div class="cleaner"></div>
    </div>
    <div id="content_right"> <?php echo "<p style='font-size:25px;text-align:center'><a href='#'>$userName</a><br /><br />";
         
    if($checkAvatar==1) echo "<img src='../user/$userAvatar' width=80%/></p>";
		 else echo "<img src='../user/$avatar1' width=80%/>";  ?> </div>
    <div class="cleaner"></div>
  </div>
  <div id="footer"> Copyright © 2010 <a href="#"><strong> by C4 Group</strong></a> </div>
</div>
<script type="text/javascript">
<!--
swfobject.registerObject("FlashID");
//-->
</script>
</body>
</html>
