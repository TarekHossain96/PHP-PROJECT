<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 

<article class="maincontent clear">
    <div class="content">
        <h2>Update Theme</h2>             
        <form class="well" action="" method="post">

<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
      $theme = mysqli_real_escape_string($db->link, $_POST['theme']);
        $query = "UPDATE tbl_theme SET theme = '$theme' WHERE id ='1'";
        $updateCat = $db->update($query);
        //header("Location:catlist.php");

        if ($updateCat) {
            echo "<span class='success'>Theme Updated Successfully!</span>";
        }else{
           echo "<span class='error'>Theme Update failed!</span>"; 
        }
     }     
?>
<?php
$query = "SELECT* FROM tbl_theme WHERE id = '1'";
$themes = $db->select($query);
while ($result = $themes->fetch_assoc()) {  //While loop Start*/

?> 
            <table>
            <tr>
                <td>
                  <input <?php if ($result['theme'] == 'default') {echo "checked";}?> type="radio" name="theme" value="default"> Default<br>
                </td>
            </tr>
             <tr>
                <td>
                   <input <?php if ($result['theme'] == 'green') {echo "checked";}?> type="radio" name="theme" value="green"> Green<br>
                </td>
            </tr>
            <tr>
                <td>
                  <input <?php if ($result['theme'] == 'offwhite') {echo "checked";}?> type="radio" name="theme" value="offwhite"> Off White<br>
                </td>
            </tr>
            <tr> 
                <td></td>
                <td>
                    <input class="btn btn-primary" type="submit" name="submit" Value="Change" />
                </td>
            </tr>
            </table>
    </form>
        <?php };?>  
    </div>
</article>
             
        </section>
<?php include 'inc/footer.php';?> 