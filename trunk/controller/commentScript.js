//var content;
//var postid;
function getScriptComment(content_id,postid){
			content = document.getElementById(content_id).value;
			postid = document.getElementById(postid).value;	
			
			//document.write(content);
			$(document).ready(function(){
				  //$("#Comment").click(function(){
					  //document.write(content);
					  //document.write(postid);
					//$("#comment_div"+postid).prepend(content);
						 // var comment = $("#text_content["+postID+"]").val();
							$.ajax({
							   type: "POST",
							   url: "../controller/InsertComment.php",
							  // data: "companyCode="+ slmckdcoy +"&branchCode="+ slmckdcab,
							   data: "comment="+content+"&postid="+postid,
							   success: function(dataComment){
									  var item=dataComment.split(':');
									  var avatarComment=item[1];
									  var usernameComment=item[0]
									  structure="<div id='comment' class='box'><table width=300px><tr><td width=20%><img src='../user/"+avatarComment+"' width=70%/></td><td><a href=#>"+usernameComment+"</a>:</td></tr><tr><td></td><td>"+content+"</td></tr></table><hr/></div>";
									   $("#comment_div"+postid).prepend(structure);		
							   }
							 });
				  //});
				});
			
}


