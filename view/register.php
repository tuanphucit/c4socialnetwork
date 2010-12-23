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
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
</head>
<body>
<div id="container">
  <div id="header">
    <div id="site_title"> C4 Social Network </div>
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
      <p style="font-size:25px"><a href="#">Đăng ký</a></p>
      <hr/>
      <form action="../controller/Register.php" method="post" onsubmit="MM_validateForm('userEmail','','RisEmail');return document.MM_returnValue">
        <table>
          <tr>
            <td>Tên đăng nhập:</td>
            <td><input name="userLogin" type="text" id="userLogin" size=50
			value="<?php
			echo $_POST ["userLogin"]?>">
            </input></td>
          </tr>
          <tr>
            <td>Mật khẩu:</td>
            <td><input name="userPassword" type="password" id="userPassword" size=50
			value="<?php
			echo $_POST ["userPassword"]?>">
            </input></td>
          </tr>
          <tr>
            <td>Tên hiển thị:</td>
            <td><input name="userName" type="text" id="userName" size=50
			value="<?php
			echo $_POST ["userName"]?>">
            </input></td>
          </tr>
          <tr>
            <td>Giới tính:</td>
            <td><?php
			
			print "<input type=\"radio\" name=\"userSex\" value=\"male\" checked>Male";
			
			if ($_POST ["userSex"] == "female")
				print "<input type=\"radio\" name=\"userSex\" checked value=\"female\">Female";
			else
				print "<input type=\"radio\" name=\"userSex\" value=\"female\">Female";
			?></td>
          </tr>
          <tr>
            <td>Ngày sinh:</td>
            <td><select name="day">
                <?php
								for($i = 1; $i < 31; $i ++) {
									if ($day1 == $i)
										echo "<option selected>$i</option>";
									else
										echo "<option>$i</option>";
								}
								?>
              </select>
              <select name="month">
                <?php
						for($i = 1; $i < 13; $i ++) {
							if ($month1 == $i)
								echo "<option selected>$i</option>";
							else
								echo "<option>$i</option>";
						}
						
						?>
              </select>
              <select name="year">
                <?php
						for($i = 1930; $i < 1993; $i ++) {
							if ($year1 == $i)
								echo "<option selected>$i</option>";
							else
								echo "<option>$i</option>";
						}
						
						?>
              </select></td>
          </tr>
          <tr>
            <td>Khóa:</td>
            <td><select name="userSchoolYear">
                <?php
						for($i = 55; $i > 0; $i --) {
							if ($year1 == $i)
								echo "<option selected>$i</option>";
							else
								echo "<option>$i</option>";
						}
						
						?>
              </select></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><input name="userEmail" type="text" id="userEmail" size=50
			value="<?php
			echo $_POST ["userEmail"]?>">
            </input></td>
          </tr>
          <tr>
            <td>Senior:</td>
            <td><input name="userSeniorID" type="text" id="userSeniorID" size=50
			value="<?php
			echo $_POST ["userSeniorID"]?>">
            </input></td>
          </tr>
          <tr>
            <td><input type="submit" class="btn" onclick="MM_validateForm('userLogin','','R','userPassword','','R','userName','','R','userEmail','','RisEmail','userSeniorID','','RisNum');return document.MM_returnValue" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'" value="Đăng ký">
            </input></td>
            <td><input type="reset" class ="btn" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'" value="Xóa">
            </input></td>
          </tr>
        </table>
      </form>
    </div>
    <div id="content_right"><img src="images/c4.jpg" width=100% alt="c4" />
      <p style="font-size:16px"><span style="font-weight: bold; color: #b7bd19;">C4 Social Network</span> là mạng xã hội dành cho sinh viên của viện CNTT trường Đại học bách khoa Hà Nội. Website được phát triển bởi nhóm C4, gồm các thành viên: <span style="font-weight: bold; color: #b7bd19;">Trần Huy Chung, Đỗ Việt Cường, Hoàng Minh Cường, Trần Ngọc Cương</span>.</p>
    </div>
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
