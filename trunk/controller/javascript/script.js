$(document).ready(function(){
  $("#Share").click(function(){
		  var post = $("#text_content1").val();
		  //var postid=1;
			$.ajax({
			   type: "POST",
			   url: "../controller/InsertPost.php",
			   data: "comment="+post,
			   success: function(datas){
					   var elem=datas.split(':');
					   var postid=elem[0];
					   var avatar=elem[2];
					   var username=elem[1]
					   //postid=postid+'';
					  // structure='<table width=430px><tr><td width=20%><img src="../user/'+userName+'" width=70% /></td><td><a href=#>'+userName+' </a>:</td></tr><tr><td></td><td>'+comment+'</td></tr></table>';				
					  // structure=datas;
					  // elem[3]
				//	  structure="<table width=430px><tr><td width=20%><img src='../user/"+avatar+"' width=70% /></td><td><a href=#>"+username+" </a>:</td></tr><tr><td></td><td>"+post+"</td></tr></table><input type='text' size=73 id='text_content["+postid+"]'><br/><input type='hidden' value='"+postid+"' id='post["+postid+"]'></input> <input type='submit' value='Comment' class='btn' onmouseup=\"getScriptComment('text_content["+postid+"]','post["+postid+"]')\" onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\"></input><br/><div id='comment_div"+postid+"'></div><hr align='left' width='450'/>";	
					                     structure="<table width=430px><tr><td width=20%><img src='../user/"+avatar+"' width=70% /></td><td><a href=#>"+username+" </a>:</td></tr><tr><td></td><td>"+post+"</td></tr></table><input type='text' size=54 style='margin-left:6.3em' id='text_content["+postid+"]'><br/><input type='hidden' value='"+postid+"' id='post["+postid+"]'></input> <input type='submit' style='margin-left:24.9em' value='Comment' class='btn' onmouseup=\"getScriptComment('text_content["+postid+"]','post["+postid+"]')\" onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\"></input><br/><br><div id='comment_div"+postid+"'></div><hr align='left' width='450'/>";	

					   $("#ajax_response").prepend(structure);				  
			   }
			 });
  });
});

//echo "<input type='text' size=73 id='text_content[$i]'><br />";
//echo "<input type='hidden' value='$postID' id='post[$i]'></input>";
//echo "<input type='submit' value='Comment' class='btn' onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\"></input><br />";
//echo "<div id='comment_div[$i]'></div>"; 
//echo "<hr align='left' width='450'/>";
