<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>C4 Social Network</title>
<link href="../view/layout.css" rel="stylesheet" type="text/css" />
<script src="../view/Scripts/swfobject_modified.js" type="text/javascript"></script>
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
            <li class="current"><a href="../controller/GetUserInfo.php"><b>Hồ sơ cá nhân</b></a></li>
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
          <p style="font-size:25px"><a href="#">Thông tin cá nhân</a>
          </p>
          <hr />
          <form action="../controller/UpdateUserInfo.php" method="post">
          <div id="event" class="box">
          <h2><a href=#>Thông tin cơ bản</a></h2>
          <table width="400" style="margin-left: 20px;margin-top: 10px">
          		<tr>
          			<td width="40%">Mật khẩu:</td>
          			<td><input type="password" size=30 name="userPass"></input></td>
          		</tr>
          		<tr>
          			<td width="40%">Tên hiển thị:</td>
          			<td><input type="text" name="userName" size=30 value="<?php echo $userName;?>"></input></td>
          		</tr>
          		<tr>
          			<td width="40%">Khóa:</td>
          			<td><input type="text" name="userSchoolYear" size=30 value="<?php echo $userSchoolYear;?>"></input></td>
          		</tr>
                <tr>
          			<td width="40%">Ngày sinh:</td>
          			<td>
                    	<select name="userDay">
                		<?php
								echo "<option selected>".$userDay."</option>";
								for($i = 1; $i < 31; $i ++)  echo "<option>$i</option>";
						?>
             		 </select>
              		<select name="userMonth">
                		<?php
								echo "<option selected>".$userMonth."</option>";
								for($i = 1; $i < 13; $i ++)  echo "<option>$i</option>";
						
						
						?>
              		</select>
              		<select name="userYear">
                	<?php
						echo "<option selected>".$userYear."</option>";
						for($i = 1930; $i < 1993; $i ++)  echo "<option>$i</option>";
						
						
						?>
             		 </select>
                    </td>
          		</tr>
             <tr>
          			<td width="40%">Giới tính:</td>
          			<td>
                    <?php 
					if (strcmp($userSex,"male")==0)
					{
						echo "<input type='radio' name='userSex' value='male' checked>Nam";
						echo "<input type='radio' name='userSex' value='female'>Nữ";
					}
					else
					{
						echo "<input type='radio' name='userSex' value='male'/>Nam";
						echo "<input type='radio' name='userSex' value='female' checked/>Nữ";
					}
                    	
					?>
                    </td>
          		</tr>   
            </table>      
          
		  </div>
           <div id="event" class="box">
          <h2><a href=#>Thông tin thêm</a></h2>
          <table width="400" style="margin-left: 20px;margin-top: 10px">
          		<tr>
          			<td width="40%">URL:</td>
          			<td><input type="text" name="userUrl" size=30 value="<?php echo $userUrl;?>"></input></td>
          		</tr>
          		<tr>
          			<td width="40%">YM:</td>
          			<td><input type="text" size=30 name="userYM" value="<?php echo $userYM;?>"></input></td>
          		</tr>
                <tr>
          			<td width="40%">Skype:</td>
          			<td><input type="text" size=30 name="userSkype" value="<?php echo $userSkype;?>"></input></td>
          		</tr>
                <tr>
          			<td width="40%">Điện thoại:</td>
          			<td><input type="text" size=30 name="userMobile" value="<?php echo $userMobile;?>"></input></td>
          		</tr>
                <tr>
          			<td width="40%">Điạ chỉ thường trú:</td>
          			<td><input type="text" size=30 name="userResident" value="<?php echo $userResident;?>"></input></td>
          		</tr>
                  <tr>
          			<td width="40%">Quê quán:</td>
          			<td><input type="text" size=30 name="userNativeVillage" value="<?php echo $userNativeVillage;?>"></input></td>
          		</tr>
                  <tr>
          			<td width="40%">Câu nói ưa thích:</td>
          			<td><input type="text" size=30 name="userFavoriteQuote" value="<?php echo $userFavoriteQuote;?>"></input></td>
          		</tr>
                 <tr>
          			<td valign="top" width="40%">Tiểu sử:</td>
          			<td><textarea style="width:15.7em" name="userBio"></textarea></td>
          		</tr>
                <tr>
          			<td width="40%">Cuốn sách ưa thích:</td>
          			<td><input type="text" size=30 name="userBook" value="<?php echo $userBook;?>"></input></td>
          		</tr>
                <tr>
          			<td width="40%">Bài hát ưa thích:</td>
          			<td><input type="text" size=30 name="userMusic" value="<?php echo $userMusic;?>"></input></td>
          		</tr>
                <tr>
          			<td valign="top" width="40%">Sở thích:</td>
          			<td><textarea style="width:15.7em" name="userInterested"></textarea></td>
          		</tr>
            </table>  
            </div> 
            <input type="submit" value="Lưu thay đổi" class="btn"  onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'"/> 
          </form>
		  
          <div class="cleaner"></div>
      </div>
         <div id="content_right">
         <?php echo "<p style='font-size:25px;text-align:center'><a href='#'>$userName</a><br /><br />";
          echo "<img src='../user/$userAvatar' width=80%/></p>";
		  ?>
           <p style="text-align:center"><a href="../controller/EditAvatarTemp.php">Thay đổi ảnh đại diện</a></p>    
</div>
        <div class="cleaner"></div> 
     </div>
    

    
    <div id="footer">  Copyright © 2010 <a href="#"><strong> by C4 Group</strong></a>
    </div> 
    
    
    
</div>
</body>
</html>

