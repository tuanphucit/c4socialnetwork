function denyPost(postID)
{

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
   // document.getElementById("testDelete").innerHTML=xmlhttp.responseText;
    document.getElementById(postID).style.display='none';
    }
  }
//var str=5;
//var str1=6;
xmlhttp.open("GET",'../controller/DenyPost.php?postID='+postID,true);
xmlhttp.send();
}