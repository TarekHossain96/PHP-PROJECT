<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>

<?php
    $pd = new product();
    $fm = new Format();

    if (isset($_GET['delproId'])) {
    	$id = $_GET['delproId'];
    	 $delpro = $pd->delProId($id);
    }
   
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
        	<?php
                if (isset($delpro)) {
                	echo "$delpro";
                }
        	?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
                     $getpd = $pd->getAllProduct();
                     if ($getpd) {
                     	$i=0;
                     	while ($result = $getpd->fetch_assoc()) {
                     		$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName']?></td>
					<td><?php echo $result['catName']?></td>
					<td><?php echo $result['brandName']?></td>
					<td><?php echo $fm->textShorten($result['body'],30);?></td>
					<td>$<?php echo $result['price']?></td>
					<td><img src="<?php echo $result['image']?>" height="40px" width="60px"></td>
					<td>
						<?php 
						if ($result['type'] == 1) {
							echo "Featured";
						}else{
							echo "General";
						}
						?>
							
						</td>
		<td><a href="productedit.php?proid=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are you sure to delete!')" href="?delproId=<?php echo $result['productId'];?>">Delete</a></td>
				</tr>
			<?php }}?>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
