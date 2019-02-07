
<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?>
<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
<?php                                  //get edit id from postlist.php
if (!isset($_GET['editid']) || $_GET['editid'] == NULL){
    echo "<script>window.location ='postlist.php'</script>";
}else{
  $postid = $_GET['editid'];
}
?>                                                         

<article class="maincontent clear">
    
<div class="content">
<h2>Update Post</h2>
<!--PHP Start-->
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
   $title  = mysqli_real_escape_string($db->link, $_POST['title']);
   $depid  = mysqli_real_escape_string($db->link, $_POST['depid'] );
   $tags   = mysqli_real_escape_string($db->link, $_POST['tags'] );
   $author = mysqli_real_escape_string($db->link, $_POST['author'] );
   $body   = mysqli_real_escape_string($db->link, $_POST['body'] );
   //Image Start
   $permited  = array('jpg', 'jpeg', 'png', 'gif');
   $file_name = $_FILES['image']['name'];
   $file_size = $_FILES['image']['size'];
   $file_temp = $_FILES['image']['tmp_name'];

   $div = explode('.', $file_name);
   $file_ext = strtolower(end($div));
   $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
   $uploaded_image = "uploads/".$unique_image;
   //Image End

   if ($title =="" || $depid =="" || $tags =="" || $author =="" || $body =="") {
        echo "<span class='error'>Field must not be empty!</span>";
   }else{
      if (!empty($file_name)) {
  
         if ($file_size >1048567) {   //Image Validation Start
        echo "<span class='error'>Image Size should be less then 1MB!</span>";
         } elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
            } else{
               move_uploaded_file($file_temp, $uploaded_image);
               $query = "UPDATE tbl_post
                          SET 
                          depid    ='$depid',
                          title  ='$title',
                          body   ='$body',
                          image  ='$uploaded_image',
                          author ='$author',
                          tags   = '$tags'
                          WHERE id = '$postid'";
              $updated_rows = $db->update($query);

   if ($updated_rows) {
       echo "<span class='success'>Update Successfully.</span>";
   }else {
       echo "<span class='error'>Not Updated Inserted !</span>";
   }                                   //Image Validation End
}

}else{
       $query = "UPDATE tbl_post
                          SET 
                          depid    ='$depid',
                          title  ='$title',
                          body   ='$body',
                          author ='$author',
                          tags   = '$tags'
                          WHERE id = '$postid'";
              $updated_rows = $db->update($query);

   if ($updated_rows) {
       echo "<span class='success'>Update Successfully.</span>";
   }else {
       echo "<span class='error'>Not Updated Inserted !</span>";
   } 
   }                   
}
}
?>
<!--PHP End-->
<?php   //for postlist.php
$query = "SELECT* FROM tbl_post WHERE id= '$postid' ORDER BY id DESC"; 
$getpostResult = $db->select($query);
if ($getpostResult) {
  while ($postResult = $getpostResult->fetch_assoc()) {
?>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="title">Titele:</label>
      <div class="col-sm-10">
        <input type="text" name="title" class="form-control" value="<?php echo $postResult['title'];?>">
      </div>
  </div>
  <div class="form-group">
      <label class="control-label col-sm-2" for="catagory">Depertment:</label>
      <div class="col-sm-10">          
        <select class="form-control" id="select" name="depid">
            <option>Select Category</option>
           <!--Start Option PHP-->
            <?php
              $query = "SELECT* FROM tbl_dep "; 
             $resultCat = $db->select($query);
             if ($resultCat) {
               while($result = $resultCat->fetch_assoc()){
            ?>
            <option 
            <?php
            if ($postResult['depid'] ==  $result['id']) { ?>
              selected = "selected"
              <?php }?>
            value="<?php echo $result['id'];?>"><?php echo $result['name'];?>
              
            </option>
           
            <?php }};?>
            <!--End Option PHP-->
        </select>
      </div>
  </div>
 <div class="form-group">
              <label class="control-label col-sm-2" for="catagory">Tags:</label>
              <div class="col-sm-10">          
                <select class="form-control" id="select" name="tags">
                    <option>Select Category</option>
                   <!--Start Option PHP-->
                    <?php
                      $query = "SELECT* FROM tbl_tags "; 
                     $resultCat = $db->select($query);
                     if ($resultCat) {
                       while($result = $resultCat->fetch_assoc()){
                    ?>
                     <option value="<?php echo $result['id'];?>"><?php echo $result['tag_Name'];?></option>
                    
                   
                    <?php }};?>
                    <!--End Option PHP-->
                </select>
              </div>
  </div>
  <div class="form-group">
        <label class="control-label col-sm-2" for="author">Author:</label>
        <div class="col-sm-10">
          <input type="text" id="author" name="author" class="form-control" value="<?php echo $postResult['author'];?>">
        </div>
  </div>
        <div class="form-group">
        <label class="control-label col-sm-2" for="image">Image:</label>
        <div class="col-sm-10">
            <img src="<?php echo $postResult['image'];?>" alt="Pineapple" style="width:70px;height:60px;margin-left:0px;padding-bottom: 3px;">
            <input type="file" name="image">
        </div>
      </div>
  <div class="form-group">
        <label class="control-label col-sm-2" for="date">Description:</label>
        <div class="col-sm-10">
          <textarea name="body">
               <?php echo $postResult['body'];?>
          </textarea>
          <script>CKEDITOR.replace( 'body' );</script> 
        </div>
  </div>
      
  <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
  </div>
</form>
    <?php }}?>

</div>
</article>
</section>

<?php include 'inc/footer.php';?> 