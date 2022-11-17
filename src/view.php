<?php
if(isset($_GET["id"])){
  require_once "config.php";
  $sql = "SELECT * FROM product WHERE product_id = ?";
  if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "i", $param_id);
      $param_id = $_GET["id"];
      if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $name = $row["product_name"];
          $price = $row["product_price"];
          $quantity = $row["product_quantity"];
          $detail = $row["product_detail"];
          $url = $row["image_url"];
        }
        else{
          header("location: error.php");
          exit();
        }      
      } 
      else{
        echo "Something went wrong. Please try again later.";
      }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($link);
} 
else{
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHPSHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 
<div class="jumbotron text-center"style="margin-bottom: 0;color: dimgray;">
  <h1>MEME SHOP</h1>
  <p>KMUTT COM. SCI. MEME</p> 
</div>


&ensp;
<div class="container" style="margin-bottom: 100px">
  <h2>PRODUCT DETAILS</h2>
  <form action="" method="post">
 

  <div class="form-group">
  <strong><label for="Product_Name">Product Name: </label></strong> <?php echo $row["product_name"]; ?>
  </div>

  <div class="form-group">
  <strong><label for="price">Price:</label></strong> <?php echo $row["product_price"]; ?>
  </div>

  <div class="form-group">
  <strong><label for="quantity">Quantity:</label></strong> <?php echo $row["product_quantity"]; ?>
  </div>

  <div class="form-group">
  <strong><label for="detail">Details:</label></strong>
  <p><?php echo $row["product_detail"]; ?></p>
  </div>

  <img class="card-img-top" src="<?php echo $row['image_url']; ?>" width="400"style="width: 250px; height: 200px; overflow: hidden;">
  <div style="padding:15px;"></div>

  </form> 
  <a href="product.php"class ="btn btn-primary">Back</a>
 
</div>
 
<body>

