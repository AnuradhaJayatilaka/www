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
          <a class="navbar-brand" href="#">Home</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="viewoffers.php">View Offers</a></li>
            <li><a href="addFeedback.php">Add Feedback</a></li>
            <!-- <li> <a href="listOrders.php?$email=email_address"class="nav-item nav-link">Place Orders as a list</a></li> -->
            
            <li class=" nav-item dropdown">
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
            <li class=" nav-item dropdown">
                        <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"> Cart</a>
                        <ul class="dropdown-menu">
                            <li><a href="cart.php" class="dropdown-item">My Cart</a></li>
                            <li><a href="customerview_cartorder.php" class="dropdown-item">View Cart orders</a></li>
                        </ul>
                    </li>
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

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="02.jpg" alt="Image">
          <div class="carousel-caption">
            <!-- <h3>Sell $</h3>
            <p>Money Money.</p> -->
          </div>      
        </div>

        <div class="item">
          <img src="01.jpg" alt="Image">
          <div class="carousel-caption">
            <!-- <h3>More Sell $</h3>
            <p>Lorem ipsum...</p> -->
          </div>      
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <br>


    <hr>
    <div class="container-fluid">
     <h1> Shop Here</h1> 
     <br>
     <div class="row">
      <div class="col-sm-3" >
        <a href="dairyproducts.php?product_category=Dairy%20Products" style="color: #000;">
        
       <div class="card" >
        <img src="images\Dairy_1.jpg" alt="Dairy Products" style="width:320px;height: 250px; " >
        <h2 align="center">Dairy Products</h2>
        <p >You can buy dairy products of various brands here.Dairy products includes fresh milk,Yoghurt, cheese, ice cream, curd etc....</p> 
      </div>
    </a>
    </div>

    <div class="col-sm-3">
    <a href="dairyproducts.php?product_category=Sanitory%20Products" style="color: #000;">
     <div class="card">
      <img src="images/cleaning-products-supply-flat-icons-260nw-610941368.jpg" alt="Sanitary products"  style="width:320px;height: 250px;">
      <h2 align="center">Sanitary items</h2>
      <p>You can buy Sanitary products of various brands here.Sanitary products includes soap, shampoo, washing powders and liquids, tile cleaners, sanitary napkins etc.....</p>
    </div>
  </a>
  </div>

  <div class="col-sm-2">
  <a href="dairyproducts.php?product_category=Stationery%20Products" style="color: #000;">
   <div class="card">
    <img src="images\stationery.jfif" alt="Denim Jeans" style="width:320px;height: 250px;">
    <h2 align="center">Stationery</h2>
      <p>You can buy stationery products of various brands here.Stationery products includes books, accessories, pens, pencils, color pencils etc....</p>
    </div>
  </a>
  </div>

  <div class="col-sm-2">
  <a href="dairyproducts.php?product_category=Spices" style="color: #000;">
   <div class="card">
     <img  src="images/spices.jfif" alt="Spices" style="width:320px;height: 250px;">
     <h2>Spices</h2>
     <p>You can buy spices of various brands here.Spices includes salt,pepper,chillie powder,curry powder etc....</p>
   </div>
 </a>
 </div>

 <div class="col-sm-2">
 <a href="dairyproducts.php?product_category=Beverages" style="color: #000;">
   <div class="card">
     <img  src="images\beverages.jpg" alt="Denim Jeans" style="width:320px;height: 250px;">
     <h2>Beverages</h2>
     <p>You can buy beverages of various brands here.beverages includes carbonated drinks, fruit juice, energy drinks etc....</p>
   </div>
 </a>
 </div>

 

</div>
</div>
</div>
</div>



<br><br>



<footer class="container-fluid text-center">
<div class="jumbotron" style="background-image:url(03.jpg); padding-bottom:0px;" class="responsive"><br><br><br>
    
  <!-- <p>Footer Text</p> -->
</footer>

</body>
</html>