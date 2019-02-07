<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 
<?php
if (!isset($_GET['msgid']) || $_GET['msgid'] == NULL){
    echo "<script>window.location ='inbox.php'</script>";
}else{
  $id = $_GET['msgid'];
}
?> 

            <article class="maincontent clear">
                <div class="content">
                    <h2>View Message</h2>
                    <?php
                        if($_SERVER['REQUEST_METHOD']== 'POST'){
                          echo "<script>window.location ='inbox.php'</script>";
                          $query = "UPDATE tbl_contact SET 
                                    status   = '1'
                                    WHERE id = '$id'";
                                    $db->update($query);
                     }?>
                          <form class="well" action="" method="post" enctype="text/plain">
                             <table>
                               <?php
                                  $query = $query = "SELECT* FROM tbl_contact WHERE id='$id'";
                                           $inbox_msg = $db->select($query);
                                           if ($inbox_msg) {
                                               while ($result = $inbox_msg->fetch_assoc()) {
         
                               ?>
                        <tr>
                            <td class="control-label col-sm-3">Name</td>
                            <td><input class="form-control" type="text" value="<?php echo $result['firstname'].' '.$result['lastname'];?>"/></td>
                        </tr>
                        <tr>
                            <td class="control-label col-sm-3"> E-mail:</td>
                            <td><input class="form-control" type="text"value="<?php echo $result['email'];?>"/></td>
                        </tr>
                          <tr>
                            <td class="control-label col-sm-3">Date:</td>
                            <td><input class="form-control" type="text" value="<?php echo $fm->formateDate($result['Date']);?>"/></td>
                        </tr>
                         <tr>
                            <td class="control-label col-sm-3"> Massage:</td>
                            <td><textarea class="form-control" rows="4" cols="60" name="body"><?php echo $result['body'];?>;</textarea></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td><input class="btn btn-primary" type="submit" name="submit" value="OK"/></td>
                        </tr>
                            <?php }}?>
                        </table>
                </div>
            </article>
        </section>
<?php include 'inc/footer.php';?> 
