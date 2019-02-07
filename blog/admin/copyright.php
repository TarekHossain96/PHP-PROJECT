<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
            <article class="maincontent clear">
                <div class="content">
                    <h2>Footer Option</h2>
                    <form class="well" action="copyright.php" method="post">
<!--PHP Start-->
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $copy = $fm->validation($_POST['copy']);
    $copy = mysqli_real_escape_string($db->link, $copy );

     if ($copy =="") {
        echo "<span class='error'>Field must not be empty!</span>";
   }else{
           $query = "UPDATE tbl_footer
                          SET 
                          copy    ='$copy'
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
<!--Query--> 
<?php
    $query = "SELECT* FROM tbl_footer WHERE id ='1'";
    $copyRight = $db->select($query);
    if ($copyRight) {
         while ($result = $copyRight->fetch_assoc()) {
?>
                        <table>
                        <tr>
                            <td class="control-label col-sm-3">Copy Right</td>
                            <td><input class="form-control" type="text" name="copy" value="<?php echo $result['copy']?>" /></td>
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