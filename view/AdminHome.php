<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>C4 Social Network</title>
<link href="../view/layout.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="javascript/deletePost.js"></script>
<script type="text/javascript" src="javascript/denyPost.js"></script>
</head>
<body>
<div id="container">
<div id="header">
<div id="site_title">C4 Social Network</div>
</div>
<div id="menu"><span></span>
<ul>
	<li class="current"><a href=../controller/AdminHome.php><b>Quản lý bài</b></a></li>
	<li><a href="../controller/AdminEditAccount.php"><b>Quản lý người dùng</b></a></li>
</ul>
</div>
<div id="content">
	<p style="font-size: 25px"><a href="#">Bài viết vi phạm</a></p>
    <hr align="left" />
    <?php
		if($derogationPostList!=null)
		{
			for ($i=0;$i<count($derogationPostID);$i++)
			{
				echo "<div id='$derogationPostID[$i]'>";
				
				
				echo "<table width=400px>";
				echo "<tr><td width=20%>";
				echo "<img src='../user/$derogationPostCreatorAvatar[$i]' width=70% /> ";
				echo "</td>";
				echo "<td><a href=../controller/Home.php?id=".$derogationPostCreatorID[$i].">".$derogationPostCreator[$i]." </a>:</td></tr>";
				echo "<tr><td></td>";
				echo "<td>".$derogationPostContent[$i]."</td></tr>";
				echo "<tr><td></td>";
				echo "<td>";
				echo "<form action=''>";
				echo "<input type='button' class='btn' value='Xóa'  onclick =\"deletePost($derogationPostID[$i])\" onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\">";
				echo "<input type='button' class='btn' value='Bỏ qua' onclick =\"denyPost($derogationPostID[$i])\" onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\">";
				echo "</form>";
				echo "</td></tr>";
				echo "</table>";
				echo "</div>";
			}
		}
	?>
</div>
<div id="footer">Copyright © 2010 <a href="#"><strong>
by C4 Group</strong></a></div>
</div>
</body>
</html>
