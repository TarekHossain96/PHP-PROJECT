<div class="searchoption">
	<div class="menu">
		<a href="<?php echo BASE_URL;?>">Home</a>
	</div>
	<div class="search">
		<form action="<?php echo BASE_URL;?>/Index/search" method="post">
			<input type="text" name="keyword" placeholder="Search here...">
			<select class="catsearch" name = "cat">
				<option>Selct one</option>
				<?php
				foreach ($catlist_Parameter as $key => $value) {?>
	                 <option value="<?php echo $value['id'];?>"><?php echo $value['name']?></option>
				<?php }?>

				
				
				
			</select>
			<button class="submit" type="submit">Search</button>
		</form>
	</div>
</div>