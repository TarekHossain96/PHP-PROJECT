<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
  $brand = new brand();
  if ($_SERVER['REQUEST_METHOD']  == 'POST') {
      $brandName = $_POST['brandName'];
      $insetBrand = $brand->brandInsert($brandName);
  }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add Brand Name</h2>
               <div class="block copyblock">
               <?php
                if (isset($insetBrand)) {
                    echo "$insetBrand";
                }
                ?> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" placeholder="Enter Brand Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>