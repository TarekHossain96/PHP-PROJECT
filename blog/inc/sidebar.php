
<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Departments</h2>
				<?php
				$query = "Select* From tbl_dep";
				$category = $db->select($query);
                 if ($category) {
                 	while ($result = $category->fetch_assoc()) {

				?>
					<ul>
						<li><a href="postsDept.php?deptid=<?php echo $result['id']?>"><?php echo $result['dep_Name']?></a></li>
						<?php }}else{?>	
						<li>Department Not found</li>
						<?php }?>				
					</ul>
			</div>

			<div class="samesidebar clear">
				<h2>CATEGORY</h2>
				
				
					<?php
						$query = "Select* From tbl_tags";
						$category = $db->select($query);
		                 if ($category) {
		                 while ($result = $category->fetch_assoc()) {

						?>
						
	                    <span class="tag-1"> <a href="postCat.php?tagsid=<?php echo $result['id']?>"style="text-decoration:none;">
                          
                         	<?php echo $result['tag_Name']?>
                   

                         </a></span>
                        
                         
					   <!--class="tag tag-small"-->
				   
				    <?php }}?>
			
				
			</div>
			<div class="samesidebar3 clear">
				<h2>CATEGORY</h2>
				<table style="width: 100%;display:block;">
  
  <tbody style="height: 200px; display: inline-block; width: 100%; overflow: auto;">
    <tr>
    	<td>
    		<ul style="border-bottom: none;">
    			<?php
						$query = "Select* From tbl_tags";
						$category = $db->select($query);
		                 if ($category) {
		                 while ($result = $category->fetch_assoc()) {

						?>
    			<li class="tag">
    				<a href="postCat.php?tagsid=<?php echo $result['id']?>"><?php echo $result['tag_Name']?></a>
    			</li>
    			<?php }}?>
    		</ul>
    	</td>
    	 
    	
    </tr>
  </tbody>
</table>
				
					
			
				
			</div>
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php
				$query = "Select* From tbl_post limit 4";
				$post = $db->select($query);
                 if ($post) {
                 	while ($result = $post->fetch_assoc()) {

				?>
				<div class="popular clear">
		<h3><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title']?></a></h3>
		 <a href="post.php?id=<?php echo $result['id'];?>""><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
						<?php echo $fm->textShorten($result['body'],120);?>

					</div>
					
				<?php }}else{header("Location:404.php");}?>	
	
			</div>
			
		</div>