<?php
include 'inc/header.php';
include 'lib/User.php';
Session::chkSession();
$user = new User();
?>
<?php
$loginmsg = Session::get("loginmsg");
if (isset($loginmsg)) {
	echo $loginmsg;
}
Session::set("loginmsg",Null);
?>
<div class="panel panel-default">

	<div class="panel-heading">
		<h2>User list<span class="pull-right">Welcome!<strong>
			<?php
			$name = Session::get("username");
			if (isset( $name)) {
				echo  $name;
			}
			?>
		</strong></span></h2>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<th width="20%">Serial</th>
			<th width="20%">Name</th>
			<th width="20%">Username</th>
			<th width="20%">Email</th>
			<th width="20%">Action</th>
			<?php
			$user = new User();
			$userData = $user ->getUserData();
			if ($userData) {
				$i = 0;
				foreach ($userData as $value) {
					$i++;

					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $value['name']?></td>
						<td><?php echo $value['username']?></td>
						<td><?php echo $value['email']?></td>
						<td><a class="btn btn-primary" href="profile.php?id=<?php echo $value['id']?>">View</a></td>
					</tr>
					<?php } }else{ ?>

					<tr><td colspan="5"><h2>No Data found.....</h2></td></tr>
					<?php }?>
				</table>
			</div>
		</div>

		<?php
		include 'inc/footer.php';
		?>