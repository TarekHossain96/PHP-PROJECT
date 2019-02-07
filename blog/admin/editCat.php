<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 
<!-- ------------------------PHP Start---------------------------- -->
<?php
if (!isset($_GET['editId']) || $_GET['editId'] == NULL){
    //header("Location:catlist.php");
    echo "<script>window.location ='catlist.php'</script>";
}else{
  $id = $_GET['editId'];
}
?> 
<!-- ------------------------PHP End------------------------------ -->

<article class="maincontent clear">
    <div class="content">
        <h2>Update Category</h2>             
        <form class="well" action="" method="post">
<!-- ------------------------PHP Start---------------------------- --> 
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
      $username = $fm->validation($_POST['name']);
      $username = mysqli_real_escape_string($db->link, $username );

     if (empty($username)) {
         echo "<span class='error'>Field must not bee empty!</span>";
     }else{
        $query = "UPDATE tbl_catagory SET name = '$username' WHERE id ='$id'";
        $updateCat = $db->update($query);
        //header("Location:catlist.php");

        if ($updateCat) {
            echo "<span class='success'>Data Updated Successfully!</span>";
        }else{
           echo "<span class='error'>Update failed!</span>"; 
        }
     }
     
      }
?>
<?php
$query = "SELECT* FROM tbl_catagory WHERE id = '$id' ORDER BY id DESC";
$catReslt = $db->select($query);
while ($result = $catReslt->fetch_assoc()) {  //While loop Start

?> 
<!-- ------------------------PHP End------------------------------ -->       
            <table>
            <tr>
                <td class="control-label col-lg-3">Category Name</td>
                <td>
                    <input class="form-control" type="text"  name = "name"value="<?php echo $result['name'];?>"class="medium" />
                </td>
            </tr>
            <tr> 
                <td></td>
                <td>
                    <input class="btn btn-primary" type="submit" name="submit" Value="Update" />
                </td>
            </tr>
            </table>
    </form>
        <?php };?>  <!--While loop End -->
    </div>
</article>
             
        </section>
<?php include 'inc/footer.php';?> 