<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/formate.php';?>
<?php 
      $db = new Database();
      $fm = new Formate();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Basic Website</title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">
	<meta name="keywords" content="blog,cms blog">
	<meta name="author" content="Tarek">
	<?php include 'scripts/css.php';?>
	<?php include 'scripts/js.php';?>
	<!--<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css"> 
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});

</script>-->

<body>
</head>


<body>
	<div class="headersection templete clear">
		<a href="index.php">
			<?php
                 $query = "SELECT* FROM logo_title_slogan WHERE id ='1'";
                 $blogResult = $db->select($query);
                 if ($blogResult) {
                   while ($result = $blogResult->fetch_assoc()) {
            ?>
			<div class="logo">
				<img src="admin/<?php echo $result['logo'];?>" alt="Logo"/>
				<h2><?php echo $result['title'];?></h2>
				<p style="font-family:Blackadder ITC;font-size: 26px;"><i><?php echo $result['slogan'];?></i></p>
			<?php }}?>	
			</div>
		</a>
		<div class="social clear">
			<div class="icon clear">
<?php
   $query = "SELECT* FROM tbl_social WHERE id ='1'";
   $social_media = $db->select($query);
   if ($social_media) {
     while ($result = $social_media->fetch_assoc()) {
?> 
				<a href="admin/login.php" target="_blank"><i class="fa fa-user" style="font-size:20px"></i></a>
				<a href="<?php echo $result['fb']?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $result['tw']?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $result['lin']?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $result['gplus']?>" target="_blank"><i class="fa fa-google-plus"></i></a>
<?php }}?>
			</div>
			<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="search" placeholder="Search keyword..." required="1"/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div> 
		</div>
	</div>
<div class="navsection templete">
	<?php 
         $path = $_SERVER['SCRIPT_FILENAME'];
         $currentpage = basename($path, '.php');
	?>
	<ul>
		<li><a <?php if ($currentpage == 'index') { echo ' id="active"'; } ?> href="index.php">Home</a></li>
		<li><a <?php if ($currentpage == 'about') { echo ' id="active"'; } ?> href="about.php">About</a></li>	
		<li><a <?php if ($currentpage == 'contact') { echo ' id="active"'; } ?> href="contact.php">Contact</a></li>
	</ul>
</div>