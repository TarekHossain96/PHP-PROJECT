<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

<?php
if (!isset($_GET['tagsid']) || $_GET['tagsid'] == NULL) {
	header("Location: 404.php");
}
else{

	$deptId = $_GET['tagsid'];
}
?>

<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php
			$query = "Select* from tbl_post where tags=$deptId";
			$post = $db->select($query);
			if ($post) {
				while ($result = $post->fetch_assoc()) {
			?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['id'];?>"><?php echo $result['title']?></a></h2>
				<h4><?php echo $fm->formateDate($result['date']);?>,By <a href="#"><?php echo $result['author']?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>

				<?php echo $fm->textShorten($result['body']);?>

				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']?>">Read More</a>
				</div>
						
			</div>

			
      <?php }}else{?>
					<h3>No results were returned. Please refine your search.</h3>
				<?php };?>
		</div>
		<?php include "inc/sidebar.php";?>
		<?php include "inc/footer.php";?>