<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 

<article class="maincontent clear">
    <div class="content">
        <h2>Add New Category</h2>             
        <form class="well" action="addcat.php" method="post">
<!-- ------------------------PHP Start---------------------------- --> 
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
      $username = $fm->validation($_POST['name']);
      $username = mysqli_real_escape_string($db->link, $username );

     if (empty($username)) {
         echo "<span class='error'>Field must not be empty!</span>";
     }else{
        $query = "INSERT INTO tbl_dep(dep_Name) VALUES('$username')";
        $catInsert =$db->insert($query);

        if ($catInsert) {
            echo "<span class='success'>Category inserted Successfully!</span>";
        }else{
           echo "<span class='error'>Inserted failed!</span>"; 
        }
     }
     
      }
?> 
<!-- ------------------------PHP End------------------------------ -->       
            <table>
            <tr>
                <td class="control-label col-lg-3"> Department Name</td>
                <td>
                    <input class="form-control" type="text"  name = "name"placeholder="Enter Category Name..." class="medium" />
                </td>
            </tr>
            <tr> 
                <td></td>
                <td>
                    <input class="btn btn-primary" type="submit" name="submit" Value="Save" />
                </td>
            </tr>
            </table>
        </form>
    </div>
</article>
             
        </section>
<?php include 'inc/footer.php';?> 