<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>C4 Social Network</title>
<link href="../view/layout.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="javascript/denyUser.js"></script>
<script type="text/javascript" src="javascript/restoreUser.js"></script>
</head>
<body>
<div id="container">
<div id="header">
<div id="site_title">C4 Social Network</div>
</div>
<div id="menu"><span></span>
<ul>
	<li><a href=../controller/AdminHome.php><b>Quản lý bài</b></a></li>
	<li  class="current"><a href="../controller/AdminEditAccount.php"><b>Quản lý người dùng</b></a></li>
</ul>
</div>
<div id="content">
	<div id="content_left">
    <p style="font-size: 25px"><a href="#">Tìm kiếm thành viên</a></p>
    <form action="../controller/AdminSearch.php" method="post">
    	<input type="text" name="searchValue" size=50 /><br />
        <input type="submit" class="btn" value="Search" onmouseover="this.className='btn btnhov'" onmouseout="this.className='btn'" />
    </form>
    <br /><br /><br /><br />
   
        <?php
		if($allUserBannedID!=null)
		{
			 echo "<p style='font-size: 25px'><a href='#'>Danh sách thành viên bị khóa</a></p>";
			 echo "<hr width='400px' align='left'/>";
			for ($i=0;$i<count($allUserBannedID);$i++)
			{
				echo "<div id='$allUserBannedID[$i]'>";
				
				
				echo "<table width=400px>";
				echo "<tr><td width=20%>";
				echo "<img src='../user/$allUserBannedAvatar[$i]' width=70% /> ";
				echo "</td>";
				echo "<td><a href=../controller/Home.php?id=".$allUserBannedID[$i].">".$allUserBannedName[$i]." </a>:</td></tr>";
				echo "<tr><td></td>";
				echo "<form action=''>";
				echo "<td><input type='button' class='btn' value='Khôi phục'  onclick =\"restoreUser($allUserBannedID[$i])\" onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\">";
				echo "<input type='button' class='btn' value='Bỏ qua' onclick =\"denyUser($allUserBannedID[$i])\" onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\">";
				echo "</form>";
				echo "</td></tr>";
				echo "</table>";
				echo "</div>";
			}
		}
	?>
    	<div class="cleaner"></div> 
    </div>
    
    <div id="content_right">
    </div>
 	<div class="cleaner"></div>
    
</div>
<div id="footer">Copyright © 2010 <a href="#"><strong>
by C4 Group</strong></a></div>
</div>
</body>
</html>
