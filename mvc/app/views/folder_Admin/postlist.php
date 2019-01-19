<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<h2>Article List</h2>
<?php
if (!empty($_GET['msg'])) {
	$msg = unserialize(urldecode($_GET['msg']));
	foreach ($msg as $key => $value) {
		echo "<span style='color:blue;font-weight:bold;'>".$value."</span>";
	}
} 
?>
	<table id="my_table_id"class="display" data-page-length='5'>
		<thead>
		<tr>
			<th width="5%">Sl</th>
			<th width="20%">Titel</th>
			<th width="35%">Content</th>
			<th width="15%">Category</th>
			<th width="25%">Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$i=0;
		foreach ($listPost as $key => $value) {
			$i++;
		?>
		<tr>
			<td><?php echo $i;?></td>
			<td><?php 
			//echo "{$value['title']}";
			$text = $value['title'];
            if (strlen($text)>15) {
                $text = substr($text, 0, 15);
                echo $text;
            }
			?></td>
			<td><?php 
			 $text = $value['content'];
            if (strlen($text)>25) {
                $text = substr($text, 0, 25);
                echo $text;
            }
			?></td>
			<td><?php
			   foreach ($catlist as $key => $cat) {
			   	if ($cat['id'] == $value['cat']) {
			   		 echo "{$cat['name']}";
			   	}
			   }
			 ?></td>
			<td>
			<a href="<?php echo BASE_URL;?>/Admin/editCategory/<?php echo $value['id'] ?>">Edit</a> ||
			<a href="<?php echo BASE_URL;?>/Admin/deleteCatById/<?php echo $value['id']?>">Delete</a>
		</td>
		</tr>
	<?php }?>
	</tbody>
	</table>
	<script>
		$(document).ready( function () {
        $('#my_table_id').DataTable();
           } );
	</script>
