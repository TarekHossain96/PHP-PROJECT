<script src="http://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
<h2>Add Article:</h2><hr/>
	<form action="<?php echo BASE_URL;?>/Admin/addNewPost" method="post">
		<table>
			<tr>
				<td>Title</td>
				<td><input id="posttitle" type = "text" name="title" required="1"/></td>
			</tr>
			<tr>
				<td>Content</td>
				<td>
					
					<textarea name="content"></textarea>
					<script>
						CKEDITOR.replace( 'content' );
					</script>
				</td>
			</tr>
			<tr>
				<td>Category</td>
				<td>
					<select name="cat" class="cat">
						<option>Select One</option>
						<?php
						foreach ($catlist as $key => $value) {
						?>
						<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
					<?php }?>
					</select>
				</td>
			</tr>

			<tr>
				<td></td>
				<td><input type = "submit" name="submit" value="Save"/></td>
			</tr>
		</table>
		
	</form>