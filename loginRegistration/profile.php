<?php
include 'lib/User.php';
include 'inc/header.php';
Session::chkSession();
?>
<?php
if (isset($_GET['id'])) {
	$userid = (int)$_GET['id'];
}

$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
	$updateusr =  $user ->updateUserData($userid,$_POST);

}

?>
<div class="panel panel-default">

	<div class="panel-heading">
		<h2>User list<span class="pull-right"> <a class="btn btn-primary" href="index.php">Back</a></span></h2>
	</div>

	<div class="panel-body">
		<div style="max-width:600px; margin:0 auto">
			<?php
			if (isset( $updateusr )) {
				echo  $updateusr;
			}
			?>
			<?php

			$userData = $user->getUserById($userid);

			if ($userData) {
				
				?>
				<form action="" method="POST">

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control"  value="<?php 
						echo $userData->name;?>">
					</div>

					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" id="username" name="username" class="form-control" value="<?php 
						echo $userData->username;?>">
					</div>

					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="text" id="email" name="email" class="form-control" value="<?php 
						echo $userData->email;?>">
					</div>

					<?php
					$sessId = Session::get('id');
					if ($userid == $sessId) {
						
						
						?>		
						<button type="submit" name="update" class="btn btn-success">Update</button>
						<a class="btn btn-info" href="changePassword.php?id=<?php echo $userid; ?>">Password Change</a>
						<?php }?>

						
					</form>
					<?php }?>
				</div>
			</div>
		</div>

		<?php
		include 'inc/footer.php'
		?>