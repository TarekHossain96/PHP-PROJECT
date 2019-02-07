</div>

	<div class="footersection templete clear">
	  <div class="footermenu clear">
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
			<li><a href="#">Privacy</a></li>
		</ul>
	  </div>
<!--Query--> 	  
<?php
    $query = "SELECT* FROM tbl_footer WHERE id ='1'";
    $copyRight = $db->select($query);
    if ($copyRight) {
         while ($result = $copyRight->fetch_assoc()) {
?>	  
	  <p>&copy; <?php echo $result['copy'];?> <?php  echo date('Y');?></p>
<?php }}?>	  
	</div>
	<div class="fixedicon clear">
<?php
   $query = "SELECT* FROM tbl_social WHERE id ='1'";
   $social_media = $db->select($query);
   if ($social_media) {
     while ($result = $social_media->fetch_assoc()) {
?> 		
		<a href="<?php echo $result['fb']?>" target="_blank"><img src="images/fb.png" alt="Facebook"/></a>
		<a href="<?php echo $result['tw']?>" target="_blank"><img src="images/tw.png" alt="Twitter"/></a>
		<a href="<?php echo $result['lin']?>" target="_blank"><img src="images/in.png" alt="LinkedIn"/></a>
		<a href="<?php echo $result['gplus']?>" target="_blank"><img src="images/gl.png" alt="GooglePlus"/></a>
<?php }}?>		
	</div>
<script id="dsq-count-scr" src="//pau-2.disqus.com/count.js" async></script><!--Comment JavaScript-->
<!-- <script type="text/javascript" src="js/scrolltop.js"></script> -->
</body>
</html>