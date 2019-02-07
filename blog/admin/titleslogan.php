<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 

            <article class="maincontent clear">
                <div class="content">
                    <h2>Header Option</h2>
 <!--PHP Start-->                   

<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $title = $fm->validation($_POST['title']);
    $slogan = $fm->validation($_POST['slogan']);

    $title = mysqli_real_escape_string($db->link, $title );
    $slogan = mysqli_real_escape_string($db->link, $slogan );
   //Image Start
   $permited  = array('png');
   $file_name = $_FILES['logo']['name'];
   $file_size = $_FILES['logo']['size'];
   $file_temp = $_FILES['logo']['tmp_name'];

   $div = explode('.', $file_name);
   $file_ext = strtolower(end($div));
   $unique_image = 'logo'.'.'.$file_ext;
   $uploaded_image = "uploads/".$unique_image;
   //Image End

   if ($title =="" || $slogan =="" ) {
        echo "<span class='error'>Field must not be empty!</span>";
   }else{
      if (!empty($file_name)) {
  
         if ($file_size >1048567) {   //Image Validation Start
        echo "<span class='error'>Image Size should be less then 1MB!</span>";
         } elseif (in_array($file_ext, $permited) === false) {
        echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
            } else{
               move_uploaded_file($file_temp, $uploaded_image);
               $query = "UPDATE logo_title_slogan
                          SET 
                          title ='$title',
                          slogan='$slogan',
                          logo  ='$uploaded_image'
                       WHERE id = '1'";
              $updated_rows = $db->update($query);

   if ($updated_rows) {
       echo "<span class='success'>Update Successfully.</span>";
   }else {
       echo "<span class='error'>Not Updated Inserted !</span>";
   }                                   //Image Validation End
}

}else{
       $query = "UPDATE logo_title_slogan
                          SET 
                          title  ='$title',
                          slogan ='$slogan'
                        WHERE id = '1'";
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
                    <!--Query Start-->
                    <?php
                    $query = "SELECT* FROM logo_title_slogan WHERE id ='1'";
                    $blogResult = $db->select($query);
                    if ($blogResult) {
                         while ($result = $blogResult->fetch_assoc()) {
                    ?>
                     <form class="well" action="" method="post"  enctype="multipart/form-data">
                        
                        <table>
                        <tr>
                            <td class="control-label col-sm-2">Title</td>
                            <td><input class="form-control" type="text" name="title" value="<?php echo $result['title']?>";/></td>
                        </tr>
                        <tr>
                            <td class="control-label col-sm-2">Slogan</td>
                            <td><input class="form-control" type="slogan" name="slogan" value="<?php echo $result['slogan']?>";/></td>
                        </tr>
                         <tr>
                            <td class="control-label col-sm-2"></td>
                            <td><img src="<?php echo $result['logo']?>" alt="logo" class="img-thumbnail" height ="100px" width = "120px"></td>
                        </tr>

                        <tr>
                            <td class="control-label col-sm-2">Logo</td>
                            <td><input type="file" name="logo"></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input class="btn btn-primary" type="submit" name="submit" value="Update"/></td>
                        </tr>
                        </table> 
                    </form> 
                    <?php }}?>      
                </div>
            </article>
        </section>
<?php include 'inc/footer.php';?>  