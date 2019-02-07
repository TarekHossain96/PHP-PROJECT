<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 

<article class="maincontent clear">
 <div class="content">           
    <h2>View Message</h2> 
     <table class="mytable table-scroll">
        <thead>
            <tr>
               <!-- <th width="20%">Serial No.</th>
                <th width="50%">Category Name</th>
                <th width="30%">Action</th>-->
                <th width="5%">No.</th>
                <th width="15%">Name</th>
                <th width="20%">Email</th>
                <th width="30%">Message</th>
                <th width="15%">Date</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
         <tbody>
            <?php
            $query = "SELECT* FROM tbl_contact WHERE status ='0' ORDER BY id DESC";
                     $inbox_msg = $db->select($query);
                     if ($inbox_msg) {
                         $i=0;
                         while ($result = $inbox_msg->fetch_assoc()) {
                            $i++;
            ?>
                    <tr>
                    <td width="5%"><?php echo $i;?></td>
                    <td width="15%"><?php echo $result['firstname'].' '.$result['lastname'];?></td>
                    <td width="20%"><?php echo $result['email'];?></td>
                    <td width="30%"><?php echo $fm->textShorten($result['body'],20);?></td>
                    <td width="15%"><?php echo $fm->formateDate($result['Date']);?></td>
                    <td width="15%">
                        <a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
                        <a href="replymsg.php?replymsgid=<?php echo $result['id'];?>">Reply</a>
                    </td>
                    </tr>
         <?php }}?>
        </tbody>
           
    </table> 
 </div>

 
</article><!--View Message End-->
<article class="maincontent clear"><!--Seen Message List Start-->
 <div class="content">           
    <h2>Seen Message</h2>
        <?php
            if (isset($_GET['dltid'])) {
               $dltId = $_GET['dltid'];
               $delQuery = "DELETE FROM tbl_contact WHERE id ='$dltId'";
               $delData = $db->delete($delQuery);
                    if ($delData) {
                        echo "<span class='success'>Message Deleted Successfully!</span>";
                       }else{
                              echo "<span class='error'>Message Not deleted!</span>"; 
                      }
                    }
        ?> 
     <table class="mytable table-scroll">
        <thead>
            <tr>
               <!-- <th width="20%">Serial No.</th>
                <th width="50%">Category Name</th>
                <th width="30%">Action</th>-->
                <th width="5%">No.</th>
                <th width="15%">Name</th>
                <th width="20%">Email</th>
                <th width="30%">Message</th>
                <th width="15%">Date</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
         <tbody>
            <?php
            $query = "SELECT* FROM tbl_contact WHERE status ='1' ORDER BY id DESC";
                     $inbox_msg = $db->select($query);
                     if ($inbox_msg) {
                         $i=0;
                         while ($result = $inbox_msg->fetch_assoc()) {
                            $i++;
            ?>

<tr>
<td width="5%"><?php echo $i;?></td>
<td width="15%"><?php echo $result['firstname'].' '.$result['lastname'];?></td>
<td width="20%"><?php echo $result['email'];?></td>
<td width="30%"><?php echo $fm->textShorten($result['body'],20);?></td>
<td width="15%"><?php echo $fm->formateDate($result['Date']);?></td>
<td width="15%">
    <a href="viewmsg.php?msgid=<?php echo $result['id'];?>">View</a> ||
    <a onclick="return confirm('Are you sure to delete!');" href="?dltid=<?php echo $result['id'];?>">Delete</a>
</td>
</tr>
        <?php }}?>
                         </tbody>
           
    </table> 
 </div>

 
</article> <!--Seen Message List End-->
</section>
<?php include 'inc/footer.php';?>   