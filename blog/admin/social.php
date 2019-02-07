<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 

            <article class="maincontent clear">
                <div class="content">
                    <h2>Update Social</h2>
 
                    <form class="well" action="social.php" method="post">
<!--PHP Start-->
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $fb = $fm->validation($_POST['fb']);
    $tw = $fm->validation($_POST['tw']);
    $lin = $fm->validation($_POST['lin']);
    $gplus = $fm->validation($_POST['gplus']);

    $fb = mysqli_real_escape_string($db->link, $fb );
    $tw = mysqli_real_escape_string($db->link, $tw );
    $lin = mysqli_real_escape_string($db->link, $lin );
    $gplus = mysqli_real_escape_string($db->link, $gplus );
     if ($fb =="" || $tw =="" || $lin =="" || $gplus =="") {
        echo "<span class='error'>Field must not be empty!</span>";
   }else{
           $query = "UPDATE tbl_social
                          SET 
                          fb    ='$fb',
                          tw    ='$tw',
                          lin   ='$lin',
                          gplus ='$gplus'
                       WHERE id = '1'";
              $updated_rows = $db->update($query);

   if ($updated_rows) {
       echo "<span class='success'>Update Successfully.</span>";
   }else {
       echo "<span class='error'>Not Updated Inserted !</span>";
   }
   }
}
?>
<!--PHP End--> 
<!--Query----> 
<?php
    $query = "SELECT* FROM tbl_social WHERE id ='1'";
    $social_media = $db->select($query);
    if ($social_media) {
         while ($result = $social_media->fetch_assoc()) {
?> 
                      
                        <table>
                           
                        <tr>
                            <td class="control-label col-sm-2">Facebook</td>
                            <td><input class="form-control" type="text" name="fb" value="<?php echo $result['fb']?>"; /></td>
                        </tr>
                  
                         <tr>
                            <td class="control-label col-sm-2">Twitter</td>
                            <td><input class="form-control" type="text" name="tw" value="<?php echo $result['tw']?>"; /></td>
                        </tr>
                    
                         <tr>
                            <td class="control-label col-sm-2">Linkedin</td>
                            <td><input class="form-control" type="text" name="lin" value="<?php echo $result['lin']?>"; /></td>
                        </tr>
                         <tr>
                            <td class="control-label col-sm-2">Google+</td>
                            <td><input class="form-control" type="text" name="gplus" value="<?php echo $result['gplus']?>"; /></td>
                        </tr>
                    
                         <tr> 
                            <td></td>
                            <td><input class="btn btn-primary" type="submit" name="submit" value="Update"/></td>
                        </tr>

                        </table>
                        <?php }}?>
                    </form>
                </div>
            </article>
        </section>
        
<?php include 'inc/footer.php';?>  