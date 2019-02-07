<?php 
  include '../lib/Session.php';
  Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/formate.php';?>
<?php 
      $db = new Database();
?>
<?php                                  //get dlt id from postlist.php
if (!isset($_GET['dltpostid']) || $_GET['dltpostid'] == NULL){
    echo "<script>window.location ='postlist.php'</script>";
}else{
  $postid = $_GET['dltpostid'];
  $query = "SELECT * FROM tbl_post WHERE id = '$postid'";
       $getAllpost  = $db->select($query);
       if ($getAllpost) {
       	while ( $delImg = $getAllpost->fetch_assoc()){

       		$dellink = $delImg['image'];
       		unlink($dellink);
       		
       	}
      
       }
       $delQuery = "DELETE FROM tbl_post WHERE id ='$postid'";
       $delData = $db->delete( $delQuery);
       if ($delData) {
       	  echo "<script>alert('Data Deleted Successfully');</script>";
       	  echo "<script>window.location ='postlist.php'</script>";
       }else{
       	echo "<script>alert('Data Not Deleted');</script>";
       	  echo "<script>window.location ='postlist.php'</script>";

       }
}
?>