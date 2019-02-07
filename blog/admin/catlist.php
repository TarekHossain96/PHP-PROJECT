<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 
<article class="maincontent clear">
                <div class="content">
                    <h2>Category List</h2>
                    <?php
                    if (isset($_GET['dltId'])) {
                       $dltId = $_GET['dltId'];
                       $delQuery = "DELETE FROM tbl_catagory WHERE id ='$dltId'";
                       $delData = $db->delete($delQuery);
                            if ($delData) {
                                echo "<span class='success'>Data Deleted Successfully!</span>";
                               }else{
                                      echo "<span class='error'>Data Not deleted!</span>"; 
                            }
                    }
                    ?>

                     
                     <table class="mytable table-scroll">
                    <thead>
                        <tr>
                           <!-- <th width="20%">Serial No.</th>
                            <th width="50%">Category Name</th>
                            <th width="30%">Action</th>-->
                            <th>Serial No.</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <tbody>
                        <?php 
                        $query = "SELECT* FROM tbl_catagory ORDER BY id DESC";
                        $category = $db->select($query);
                        if ($category) {
                            $i=0;
                            while ($result = $category->fetch_assoc()) {     
                             $i++;
                        ?>

                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $result['name'];?></td>
                            <td><a href="editCat.php?editId=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure to Delete!');" href="?dltId=<?php echo $result['id'];?>">Delete</a></td>
                        </tr>
                        <?php }}?>
                        
                         </tbody>
           
                </table>
   
           
        </div>
            </article>
              </section>
            <?php include 'inc/footer.php';?> 