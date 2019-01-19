<aside class="sidebar">
    	<div class="widget">
    		<h2>Category</h2>
    		<ul>
                <?php
                   foreach ($catlist_Parameter as $key => $value) {
                ?>
    			<li><a href="<?php echo BASE_URL;?>/Index/postBycat/<?php echo $value['id']?>"><?php echo $value['name']?></a></li>
    			<?php }?>
    		</ul>
    	</div>
    	<div class="widget">
    		<h2>Latest Post</h2>
    		<ul>
                <?php
                    foreach ($letestPost as $key => $value) {
                ?>
    			<li><a href="<?php echo BASE_URL;?>/Index/postDetails/<?php echo $value['id'];?>"><?php echo $value['title'];?></a></li>
    			<?php }?>
    		</ul>
    	</div>
    </aside>