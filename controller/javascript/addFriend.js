function addFriend(ownID,friendID)
{
	//document.write("clgt");

if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
   
    document.getElementById("addButton").style.display='none';
    }
  }
//var str=5;
//var str1=6;
xmlhttp.open("GET",'../controller/AddFriend.php?desID='+ownID+'&friendID='+friendID,true);
xmlhttp.send();
	
}