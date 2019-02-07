<?php include 'inc/header.php';?> 
<?php include 'inc/sidebar.php';?> 

<article class="maincontent clear">
 <div class="content">           
    <h2>Category List</h2> 
     <table class="mytable table-scroll">
        <thead>
            <tr>
               <!-- <th width="20%">Serial No.</th>
                <th width="50%">Category Name</th>
                <th width="30%">Action</th>-->
                <th width="5%">No.</th>
                <th width="15%">Post Title</th>
                <th width="10%">Author</th>
                <th width="10%">Date</th>
                <th width="15%">Description</th>
                <th width="10%">Category</th>
                <th width="10%">Tags</th>
                <th width="10%">Image</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
         <tbody>
            <?php
            $query = "SELECT tbl_post.*,tbl_dep.dep_Name
                     FROM tbl_post INNER JOIN tbl_dep
                     ON tbl_post.depid  = tbl_dep.id
                     ORDER BY tbl_post.title DESC";
                     $post = $db->select($query);
                     if ($post) {
                         $i=0;
                         while ($result = $post->fetch_assoc()) {
                            $i++;
            ?>

    <tr>
        <td width="5%"><?php echo $i;?></td>
        <td width="15%"><?php echo $result['title'];?></td>
        <td width="10%"><?php echo $result['author'];?></td>
        <td width="10%"><?php echo $fm->formateDate($result['date']);?></td>
        <td width="15%"><?php echo $fm->textShorten($result['body'],30);?></td>
        <td width="10%"><?php echo $result['dep_Name'];?></td>
        <td width="10%"><?php echo $result['tags'];?></td>
        <td class="center" width="10%"><img src="<?php echo $result['image'];?>" height = "20px" width = "30px"></td>
        <td width="15%">
            <a href="editpost.php?editid=<?php echo $result['id'];?>">Edit</a>
             ||
             <a onclick="return confirm('Are you sure to Delete!');" href="deltpost.php?dltpostid=<?php echo $result['id'];?>">Delete</a>
        </td>
    </tr>
                        <?php }}?>
                         </tbody>
           
    </table> 
 </div>
</article>
</section>
<?php include 'inc/footer.php';?>   