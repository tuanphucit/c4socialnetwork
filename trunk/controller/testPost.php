<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
<script type="text/javascript" src="javascript/ajax.js"></script>
<script type="text/javascript" src="javascript/postHandle.js"></script>
</head>
<body>
<table>
	<tr>
		<td>PostPosition: </td>
		<td><TEXTAREA NAME="comment" ROWS="4" COLS="30" id="text_content1"></TEXTAREA></td>
	</tr>
</table>
<input type="submit" value="Submit" onmouseup="getScriptComment('output_div','text_content1','1','x')"></input>
<div id="output_div"></div>
</body>
</html>