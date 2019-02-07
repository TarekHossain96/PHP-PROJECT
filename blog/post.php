<?php include 'inc/header.php';?>

<?php
if (!isset($_GET['id']) || $_GET['id'] == NULL) {
	echo "No results were returned. Please refine your search.";
}else{

	$id = $_GET['id'];
}
?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
				$query = "Select* From tbl_post where id=$id";
				$post = $db->select($query);
                 if ($post) {
                 	while ($result = $post->fetch_assoc()) {

				?>
				<h2><?php echo $result['title']?></h2>
				<h4><?php echo $fm->formateDate($result['date']);?>,By <a href="#"><?php echo $result['author']?></a></h4>
				 <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $result['body']?>

<!-- -----------------Comment Section Start----------- -->
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://pau-2.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
<!-- -----------------Comment Section End------------- -->
				
				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php
					$deptid = $result['depid'];
					$queryRelated = "Select* From tbl_post Where depid = $deptid limit 6";
					$relatedPost = $db->select($queryRelated);
					if ($relatedPost) {
						while ($resultRelated = $relatedPost->fetch_assoc()) {
						?>	

						 <a href="post.php?id=<?php echo $resultRelated['id'];?>"><img src="admin/<?php echo $resultRelated['image'];?>" alt="post image"/></a>

						<?php } }else {echo "No Related Post Available";}?>
		
				</div>
				<?php }}else{?>
					<h3>No results were returned. Please refine your search.</h3>
				<?php };?>
                 	
	</div>

		</div>
		<?php include "inc/sidebar.php";?>
		<?php include "inc/footer.php";?>