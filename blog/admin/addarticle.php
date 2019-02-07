<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?>

<script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

<article class="maincontent clear">
    
<div class="content">
<h2>Add New Post</h2>
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

   if ($title =="" || $depid =="" || $tags =="" || $author =="" || $body =="" || $file_name =="") {
        echo "<span class='error'>Field must not be empty!</span>";
   }elseif ($file_size >1048567) {   //Image Validation Start
        echo "<span class='error'>Image Size should be less then 1MB!</span>";
   } elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
   } else{
        move_uploaded_file($file_temp, $uploaded_image);

        $query = "INSERT INTO tbl_post(depid, title, body, image, author, tags) VALUES('$depid','$title','$body','$uploaded_image','$author','$tags')";
        $inserted_rows = $db->insert($query);

   if ($inserted_rows) {
       echo "<span class='success'>Data Inserted Successfully.</span>";
   }else {
       echo "<span class='error'>Data Not Inserted !</span>";
   }                                   //Image Validation End
}
}
?>
<!--PHP End-->
    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Titele:</label>
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" placeholder="Enter post title">
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
                     <option value="<?php echo $result['id'];?>"><?php echo $result['dep_Name'];?></option>
                    
                   
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
                <input type="text" id="author" name="author" class="form-control" placeholder="Enter author name">
              </div>
        </div>
              <div class="form-group">
              <label class="control-label col-sm-2" for="image">Image:</label>
              <div class="col-sm-10">
                <input type="file" name="image">
              </div>
            </div>
        <div class="form-group">
              <label class="control-label col-sm-2" for="date">Description:</label>
              <div class="col-sm-10">
                <textarea name="body"></textarea>
                <script>CKEDITOR.replace( 'body' );</script> 
              </div>
        </div>
            
        <div class="form-group">        
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </div>
        </div>
    </form>

</div>
</article>
</section>

<?php include 'inc/footer.php';?>  
                   <!-- <form class="well well-lg" action="" method="" enctype="multipart/form-data">
                        <table>
                            
                        <tr>
                            <td>Titele</td>
                            <td>
                                <input type="text" name="title" placeholder="Enter a title"/>
                            </td>
                        </tr>

                           <tr>
                            <td>Catagory</td>
                            <td>
                                <select name="catagory">
                                    <option value="#">A</option>
                                    <option value="#">A</option>
                                    <option value="#">A</option>
                                    <option value="#">A</option>
                                    <option value="#">A</option>
                                </select>
                            </td>
                        </tr>

                         <tr>
                            <td>Tags</td>
                            <td>
                                <input type="text" name="tags" placeholder="Enter tags separated by Comma"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>
                                <input id="date" type="date"/>
                            </td>
                        </tr>


                         <tr>
                            <td>Upload Image</td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                            <tr>
                            <td>Description</td>
                            <td></td>
                            </tr>
                            <tr>
                                <td></td>
                              <td>
                                <textarea name='editor1'></textarea>
                                <script>CKEDITOR.replace( 'editor1' );</script>  
                             </td>
                          
                        </tr>

                        <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                     
                        </table> -->
       