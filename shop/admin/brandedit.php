<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
if (!isset($_GET['brandid']) || $_GET['brandid'] == NULL) {
  echo "<script>window.location = 'brandist.php'</script>";
}else{
  $brandid = $_GET['brandid'];
}
  $brand = new brand();
  if ($_SERVER['REQUEST_METHOD']  == 'POST') {
      $brandName = $_POST['brandName'];
      $updateBrand = $brand->brandUpdate($brandName, $brandid);
  }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock">
               <?php
                if (isset($updateBrand)) {
                    echo "$updateBrand";
                }
                ?> 
                <?php
                    $getBrandById = $brand->getBrandById($brandid);
                    if ($getBrandById) {
                      while ($result = $getBrandById->fetch_assoc()) {
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $result['brandName']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                  <?php }}?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>