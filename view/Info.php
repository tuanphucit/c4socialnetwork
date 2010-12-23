<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">Info</div>
  <div class="CollapsiblePanelContent">
    <hr width='170'/>
    <table width="240px" style="margin-top:10px;margin-left:20px">
    	<tr>
        	<td width=40%>Tuổi:</td>
            <td><?php echo $userAge; ?></td>
        </tr>
        <tr>
        	<td width=40%>Giới tính:</td>
            <td><?php echo $userSex; ?></td>
        </tr>
        <tr>
        	<td width=40%>Khóa:</td>
            <td><?php echo $userSchoolYear; ?></td>
        </tr>    
    </table>
  </div>
</div>
<script type="text/javascript">
<!--
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
//-->
</script>
</body>
</html>