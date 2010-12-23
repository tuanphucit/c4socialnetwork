<div id="ajax_response">
<?php

		if($postList!=null)
		{
		
		for ($i=0;$i<count($postList);$i++)
		{
			
			$postID=$postList[$i]->getPostID();
			echo "<table width=430px>";
			echo "<tr><td width=20%>";
			echo "<img src='../user/$postUserAvatar[$i]' width=70% /> ";
			echo "</td>";
			echo "<td><a href=#>".$postUserName[$i]." </a>:</td></tr>";
			echo "<tr><td>".$postTime[$i]."</td>";
			echo "<td>".$arrPost[$i]->getPostContent()."</td></tr>";
			echo "</table>";
			echo "<input type='text' style='margin-left:6.3em' size=54 id='text_content[$postID]'><br />";
			echo "<input type='hidden' value='$postID' id='post[$postID]'></input>";
			echo "<input type='submit' style='margin-left:24.9em' value='Comment' class='btn' onmouseup=\"getScriptComment('text_content[$postID]','post[$postID]')\" onmouseover=\"this.className='btn btnhov'\" onmouseout=\"this.className='btn'\"></input><br /><br>";
            echo "<div id=\"comment_div$postID\"></div>";
			if($commentList[$postID]!=null)
			{
			
			for($j=0;$j<count($commentList[$postID]);$j++)
			{
			echo "<div id='comment' class='box'>";
			$commentUserAvatar1= $commentUserAvatar[$postID][$j];
			$commentUserName1= $commentUserName[$postID][$j];
			$commentContent1= $commentListContent[$postID][$j];
			echo "<table width=300px>";
			echo "<tr><td width=20%>";
			echo "<img src='../user/$commentUserAvatar1' width=70%/> ";
			echo "</td>";
			echo "<td><a href=#>$commentUserName1</a>:</td></tr>";
			echo "<tr><td></td>";
			echo "<td>$commentContent1</td></tr>";
			echo "</table>";
			echo "<hr/>";
			echo "</div>";
			}
						
			}
			 
			echo "<hr align='left' width='450'/>";
			
		
		
		}
		
		}	
		
		
		?>
		</div>
		
