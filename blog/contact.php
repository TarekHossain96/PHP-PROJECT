<?php include 'inc/header.php';?>
<?php
      if($_SERVER['REQUEST_METHOD']== 'POST'){
      $fname = $fm->validation($_POST['firstname']);
      $lname = $fm->validation($_POST['lastname']);
      $email = $fm->validation($_POST['email']);
      $body = $fm->validation($_POST['body']);

      $fname = mysqli_real_escape_string($db->link, $fname );
      $lname = mysqli_real_escape_string($db->link, $lname );
      $email = mysqli_real_escape_string($db->link, $email );
      $body = mysqli_real_escape_string($db->link, $body );
      
      $error="";
      if (empty($fname)) {
      	$error="First Name must not be empty";
      }elseif(empty($lname)) {
      	$error="Last Name must not be empty";
      }elseif(empty($email)) {
      	$error="Please enter your valid email id";
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      	$error="Invalid Email Address!";
      }elseif(empty($body)) {
      	$error="Message must not be empty";
      }else{
      	 $query = "INSERT INTO tbl_contact(firstname, lastname, email, body)VALUES('$fname','$lname','$email','$body')";
        	$inserted_contact = $db->insert($query);

		   if ($inserted_contact) {
		       $msg = "Send Successfully";
		   }else {
		       $error="Message not send!";
		   } 
         }
       }
      ?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
                  if (isset($error)) {
                   	echo "<span style = 'color:red'>$error</span>";
                   } 
                   if (isset($msg)) {
                   	echo "<span style = 'color:green'>$msg</span>";
                   }
				?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name"/>
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Send"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>
 <!--google map Start-->
 <div id = 'map'>
 	
 </div>
 <script>
      function initMap() {
        var pau = {lat: 23.793488, lng: 90.403444};

        // Create a map object and specify the DOM element
        // for display.
        var map = new google.maps.Map(document.getElementById('map'), {
          center: pau,
          zoom: 15
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: pau
          
          
        });
      }
</script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ&callback=initMap"
        async defer></script>
 <!--google map End-->
		</div>
		<?php include "inc/sidebar.php";?>
		<?php include "inc/footer.php";?>