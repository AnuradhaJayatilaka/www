<?php
session_start();
require("adminheader.php");
?>

<head>
  <style>
    #tblAlign {
      margin-left: 80px
    }
  </style>

</head>

<body>

  <div class="jumbotron jumbotron-fluid" style="background-image:url(home.jpg); padding-bottom:150px;"><br><br>

  </div>

  <div class="container">

    <div class="row">
      <div class="column">
        <div class="vertical-menu">
          <a href="cashier.php">Cashier Home</a>
          <div class="subnav">
            <button class="subnavbtn">Manage Inventory <i class="fa fa-caret-down" c></i></button>
            <div class="subnav-content">
              <a href="cview.php">View Products</a>
              <a href="cinsert.php">Add Product</a>
            </div>
          </div>
          <div class="subnav">
            <button class="subnavbtn">Manage orders <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
              <a href="corder.php">View Ongoing List Orders</a>
              <a href="ccompleteorder.php">View Complete List Orders</a>
              <a href="cview_cartorder.php">View Ongoing cart orders </a>
              <a href="cview_completecartorder.php">View Complete cart orders </a>
            </div>
          </div>
          <a href="ccat.php">Manage Product Categories</a>
          <a href="cdisplayoffers.php">Manage Offers</a>
          <a href="cviewcashierlist.php">Manage Cashiers</a>
          <a href="cViewSuggestions.php">View Suggestions</a>
          <a href="cviewfeedback1.php">View feedback</a>

          <a href="cGenerateReports.php">Generate Reports</a>
          <a href="logout.php">Log Out</a>
        </div>
      </div>
      <div class="column" id="tblAlign">
        <?php
        require('mysqlconnect.php');
        // include("auth.php");
        ?>
        <!-- <!DOCTYPE html>
            <html>
                <head></head>
                <body> -->
        <div>
          <form name="form" method="GET" action="cview.php" enctype="multipart/form-data">
            <label>Type the product name:</label>
            <input type="text" name="product_name" id="product_name">
            <p><input name="submit" type="submit" value="search" /></p>
          </form>
        </div>
        <div >
        <form name="form" method="POST" action="view.php" enctype="multipart/form-data">
                    <label for="product_category">Category Type</label>
                    <select name="product_category" class="form-control">
                      <!-- form-control Begin -->

                      <option disabled selected> Select a Product Category </option>

                      <?php
                      require_once "mysqlconnect.php";
                      $get_item = "select product_category from category";
                      $run_item = mysqli_query($db, $get_item);

                      while ($data = mysqli_fetch_array($run_item)) {



                        echo "<option value='" . $data['product_category'] . "'>" . $data['product_category'] . "</option>";
                      }

                      ?>

                    </select>
                    <p><input name="submit" type="submit" value="sort" /></p>
        </form>
                  </div>
        
        <div class="form">
          <h2>View Records</h2>
          <table class="table table-dark table-hover">
            <thead>
              <tr>
                <th><strong>Product ID</strong></th>
                <th><strong>Product Name</strong></th>
                <th><strong>unit price(Rs)</strong></th>
                <th><strong>Description</strong></th>
                <th><strong>Brand</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Image</strong></th>
                <th><strong>Edit</strong></th>
                <th><strong>Delete</strong></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;

              
        if (!empty($_GET)) {?>
        <a href="cview.php" >Back to All products view</a>
        <?php
          $pname = $_GET['product_name'];
        $sel_query1 = "Select * from products where product_name LIKE '%$pname%' OR product_name LIKE '$pname%' OR product_name LIKE '%$pname'  OR REGEXP_LIKE(product_name, '^$pname$') OR REGEXP_LIKE(product_name, '$pname') ";
        $result1 = mysqli_query($db, $sel_query1);
       
        while ($row = mysqli_fetch_assoc($result1)) { ?>
                <tr>
                  <td align="center"><?php echo $row["product_ID"]; ?></td>
                  <td align="center"><?php echo $row["product_name"]; ?></td>
                  <td align="center"><?php echo $row["unit_price"]; ?></td>
                  <td align="center"><?php echo $row["description"]; ?></td>
                  <td align="center"><?php echo $row["brand"]; ?></td>
                  <td align="center"><?php echo $row["quantity"]; ?></td>
                  <td><img src='products/<?php echo $row["product_image"] ?>' style='width: 65px;'></td>
                  <td align="center">
                    <a href="edit.php?product_ID=<?php echo $row["product_ID"]; ?>">Edit</a>
                  </td>
                  <td align="center">
                    <a href="delete.php?product_ID=<?php echo $row["product_ID"]; ?>">Delete</a>
                  </td>
                </tr>
                <?php
                $count++;
              } ?>
          <?php
        }
        else if(!empty($_POST)){?>
          <a href="cview.php" >Back to All products view</a>
        <?php
          $pcat = $_POST['product_category'];
        $sel_query1 = "Select * from products where product_category='$pcat'";
        $result1 = mysqli_query($db, $sel_query1);
        
        while ($row = mysqli_fetch_assoc($result1)) { ?>
                <tr>
                  <td align="center"><?php echo $row["product_ID"]; ?></td>
                  <td align="center"><?php echo $row["product_name"]; ?></td>
                  <td align="center"><?php echo $row["unit_price"]; ?></td>
                  <td align="center"><?php echo $row["description"]; ?></td>
                  <td align="center"><?php echo $row["brand"]; ?></td>
                  <td align="center"><?php echo $row["quantity"]; ?></td>
                  <td><img src='products/<?php echo $row["product_image"] ?>' style='width: 65px;'></td>
                  <td align="center">
                    <a href="edit.php?product_ID=<?php echo $row["product_ID"]; ?>">Edit</a>
                  </td>
                  <td align="center">
                    <a href="delete.php?product_ID=<?php echo $row["product_ID"]; ?>">Delete</a>
                  </td>
                </tr>
                <?php
                $count++;
              } ?>
          <?php

        }
        else{$sel_query = "Select * from products ORDER BY product_ID desc;";
          $result = mysqli_query($db, $sel_query);
          while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td align="center"><?php echo $row["product_ID"]; ?></td>
              <td align="center"><?php echo $row["product_name"]; ?></td>
              <td align="center"><?php echo $row["unit_price"]; ?></td>
              <td align="center"><?php echo $row["description"]; ?></td>
              <td align="center"><?php echo $row["brand"]; ?></td>
              <td align="center"><?php echo $row["quantity"]; ?></td>
              <td><img src='products/<?php echo $row["product_image"] ?>' style='width: 65px;'></td>
              <td align="center">
                <a href="edit.php?product_ID=<?php echo $row["product_ID"]; ?>">Edit</a>
              </td>
              <td align="center">
                <a href="delete.php?product_ID=<?php echo $row["product_ID"]; ?>">Delete</a>
              </td>
            </tr>
          <?php
            $count++;
          }} ?>
              
            </tbody>
          </table>
        </div>
        <!-- </body> -->

        <!-- </html> -->
      </div>
    </div>
  </div>







  <!-- <br><br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br><br><br><br> -->
  <!-- <div class="container" id="test">
    <div class="row">
      <footer class="container-fluid text-center">
        <div class="jumbotron" style="background-image:url(05.jpg); padding-bottom:150px;" class="responsive"><br><br><br><br><br><br><br>
        </div>
      </footer>
    </div>
  </div> -->


</body>