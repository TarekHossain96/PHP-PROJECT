<?php include 'inc/header.php';?>

<?php
if (!isset($_GET['search']) || $_GET['search'] == NULL) {
	header("Location: 404.php");
}
else{

	$searchId = $_GET['search'];
}
?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
		$query = "SELECT * FROM tbl_post WHERE title LIKE '%$searchId%' OR body LIKE '%$searchId%'";
				$post = $db->select($query);
                 if ($post) {
                 	while ($result = $post->fetch_assoc()) {

				?>
				<h2><?php echo $result['title']?></h2>
				<h4><?php echo $fm->formateDate($result['date']);?>,By <a href="#"><?php echo $result['author']?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $fm->textShorten($result['body'])?>

				
				
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result['id']?>">Read More</a>
				</div>
				<?php }}else{?>

				<p>Data Not found!.</p>

				<?php }?>
                 	
	</div>

		</div>
		<?php include "inc/sidebar.php";?>
		<?php include "inc/footer.php";?>