<h2>Category List:</h2><hr/>
<?php
if (!empty($_GET['msg'])) {
	$msg = unserialize(urldecode($_GET['msg']));
	foreach ($msg as $key => $value) {
		echo "<span style='color:blue;font-weight:bold;'>".$value."</span>";
	}
} 
?>

 
<table class="tblone">
	<tr>
		<th>Sl</th>
		<th>Category Name</th>
		<th>Category Titel</th>
		<th>Action</th>
	</tr>
	<?php
	    $i=0;
		foreach ($cat as $value) {
		$i++;		   
	?>
	
	<tr> 
		<td><?php echo $i;?></td>
		<td><?php echo "{$value['name']}";?></td>
		<td><?php echo "{$value['title']}";?></td>
		<td>
			<a href="<?php echo BASE_URL;?>/Admin/editCategory/<?php echo $value['id'] ?>">Edit</a> ||
			<a href="<?php echo BASE_URL;?>/Admin/deleteCatById/<?php echo $value['id']?>">Delete</a>
		</td>
	
	</tr>
	
<?php }?>
</table>
