<?php
session_start();
$email= $_SESSION['email_address'];
$username= $_SESSION['user_name'];


?>
<head>


 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


      



 <style>
  /* Remove the navbar's default margin-bottom and rounded borders */ 
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  /* Add a gray background color and some padding to the footer */
  .footer {
  position: left;
  left: 0;
  bottom: 0;
  width:100%;
  background-color: red;
  color: white;
  text-align: center;
}

  .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
    min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }

  
  .bs-example{
    margin: 20px;        
  }
  .responsive {
  max-width: 100%;
  height: auto;
}
table, th, td { border: 1px solid black; border-collapse: collapse; } th, td { padding: 5px; } th { text-align: center; }


</style>
  <!-- <script src="https://kit.fontawesome.com/42deadbeef.js"></script>
    <link rel="stylesheet" href="AdministratorHomepage.css"> -->
  </head>
  <body>

    <div class="jumbotron" style="background-image:url(home.jpg); padding-bottom:57px;"><br><br>
    
      <div class="container text-center"><br><br>
      
        <!-- <h1>Singhe Super</h1>      
        <p>kawruth danna thena</p> -->
      </div>
    </div>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
          <li><a  href="customer1.php">Home</a></li>
            <li><a  href="viewoffers.php">View Offers</a></li>
            <li><a   href="addFeedback.php">Add Feedback</a></li>
            <li class=" nav-item dropdown active">
              <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> List Orders</a>
              <ul class="dropdown-menu">          
                <li><a href="listorders.php" class="dropdown-item">place orders as a list</a></li>
                <li><a href="vieworder.php" class="dropdown-item">View list orders</a></li>
                <!-- <li><a href="" class="dropdown-item">Manage Account</a></li>                          -->
              </ul>
            </li>
            <li class=" nav-item dropdown">
            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#">  view products</a>
      
             
                  
              <ul class="dropdown-menu"> 
              <?php
                require('mysqlconnect.php');
                  $getCategory="select product_category from category";
                  $run_item = mysqli_query($db,$getCategory);
                    
                    while ($data= mysqli_fetch_array($run_item)){
                      
                     
                      
                      $cat1='<li><a href="viewproducts.php?product_category=';
                      $cata=$data['product_category'];
                      $catd='" class="dropdown-item">';
                      $catb=$data['product_category'];
                      $catc='</a></li>';
                      $cat1=$cat1.$cata.$catd.$catb.$catc;
                      echo "$cat1";
                      
                    }

                     ?>
              
              </ul>
            </li>
            <li ><a  href="cart.php">My Cart</a></li>
            <li><form class="navbar-form navbar-left" action="searchproduct.php" method="GET">
      <div class="form-group">
        <input type="text" name="product_name" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class=" nav-item dropdown">
              <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> <span class="glyphicon glyphicon-user"></span>  Hi <?php echo $_SESSION['user_name'] ?><b class="caret"></b></a>
              <ul class="dropdown-menu">          
                <li><a href="logout.php" class="dropdown-item">Log Out</a></li>
                <!-- <li><a href="" class="dropdown-item">Manage Account</a></li>                          -->
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">

    

    <?php
    
    require_once "mysqlconnect.php  ";
    // $product_ID=$_REQUEST['product_ID'];
    // $trn_date = date("Y-m-d H:i:s");
    $email= $_SESSION['email_address'];
    $sql1= "SELECT user_name FROM users WHERE email_address='$email'";
    $result=mysqli_query($db, $sql1);
    $oneresult= $result->fetch_object();
    $username= $oneresult->user_name;
    $_SESSION["user_name"] = $username; 


    // $order_status="insert into orders (order_status) values ('NULL')";

    $order_items=$orderid=" ";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(empty(trim($_POST["order_items"]))){
            //$order_items = "Please enter order items.";
        } else{
          $order_items=trim($_POST["order_items"]);
          $lines = explode("\n", $order_items);

          $sql="insert into orders (username,order_status) values ('$username','incomplete')";
          if(mysqli_query($db, $sql)){
            echo "Your order is placed."; 
           
            $sql="select count(orderid) from orders";
            if ($res = mysqli_query($db,$sql)) {
              $row = mysqli_fetch_row($res);
              $orderid = $row[0];
            }

            $product="";
            //$sql_od="insert into order_details (orderid,item) values ('$orderid','$product')";
            if ( !empty($lines) ) {
              foreach ( $lines as $line ) {
                
                $product= $line;
                $product_status="not added";
                $sql_od="insert into order_details (orderid,item,product_status) values ('$orderid','$product','$product_status')";
                mysqli_query($db, $sql_od);
              }
            }  
          } else{
              echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
          }
        }

    }
    echo "<a href=\"vieworder.php\"style=\"color:red\">view order</a>";
     // header("location: viewmyorder.php");
?>
</div>



    <hr>
    <div class="container-fluid">
            <br>
            <div class="row">
                <img class="about" src="05.jpg"class="responsive">
            </div>
        </div>

<br><br>



<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(03.jpg); padding-bottom:0px;" class="responsive"><br><br><br>
    
  <!-- <p>Footer Text</p> -->
</footer>

</body>
</html>

