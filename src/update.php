<?php
require_once "config.php";
$p_name = $price = $quantity = $detail = $url = "";
$name_err = $price_err = $quantity_err = "";
if(isset($_POST["id"]) && !empty($_POST["id"])){
  $product_id = $_POST["id"];
  $input_name = $_POST["Product_Name"];

  if(empty($input_name)){
    $name_err = "Please enter a name.";
  } 
  elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    $name_err = "Please enter a valid name.";
  } 
  else{
    $p_name = $input_name;
  }

  $input_price = $_POST["price"];

  if(empty($input_price)){
    $price_err = "Please enter a price";
  }
  else if(!is_numeric($input_price)){
    $price_err = "Please enter valid price.";
  }
  else if($input_price < 0){
    $price_err = "Please enter a valid price (only positive value is allowed).";
  }
  else if(strlen($input_price) - strrpos($input_price, '.') - 1 > 2){
    $price_err = "Please enter a valid price (only 2 decimal points is allowed).";
  }
  else{
    $price = $input_price;
  }

  $input_quantity = $_POST["quantity"];

  if(empty($input_quantity)){
    $quantity_err = "Please enter the quantity.";     
  } 
  else if (filter_var($input_quantity, FILTER_VALIDATE_INT) == false){
    $quantity_err = "Please enter a valid quantity (only integer value is allowed).";
  }
  elseif(!ctype_digit($input_quantity)){
    $quantity_err = "Please enter a valid quantity (only positive value is allowed).";
  } 
  else{
    $quantity = $input_quantity;
  }

  $detail = $_POST["detail"];
  $url = $_POST["imageurl"];

  if(empty($name_err) && empty($price_err) && empty($quantity_err)){
    $sql = "UPDATE product SET product_name=?, product_price=?, product_quantity=?, product_detail=?, image_url=? WHERE product_id=?";
         
    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "sdissi", $param_name, $param_price, $param_quantity, $param_detail, $param_url, $param_id);
      
      $param_name = $p_name;
      $param_price = $price;
      $param_quantity = $quantity;
      $param_detail = $detail;
      $param_url = $url;
      $param_id = $product_id;
            
      if(mysqli_stmt_execute($stmt)){
        header("location: product.php");
        exit();
      } 
      else{
        echo "Something went wrong. Please try again later.";
      }
    }  
    mysqli_stmt_close($stmt);
  }  
  mysqli_close($link);
} else{
    if(isset($_GET["id"]) && !empty($_GET["id"])){
        $product_id =  $_GET["id"];
        
        $sql = "SELECT * FROM product WHERE product_id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $product_id;
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    $p_name = $row["product_name"];
                    $price = $row["product_price"];
                    $quantity = $row["product_quantity"];
                    $detail = $row["product_detail"];
                    $url = $row["image_url"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($link);
    }  else{
        header("location: error.php");
        exit();
    }
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



<div class="container" style="margin-bottom: 100px">
  <h2>UPDATE PRODUCT</h2>
  <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
 
  <div class="form-group">
    <label for="Product_Name">Product Name</label>
    <input type="text" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" id="Product_Name" name="Product_Name" value="<?php echo $p_name; ?>">
    <span><?php echo $name_err;?></span>
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" id="price" name="price" value="<?php echo $price; ?>">
    <span><?php echo $price_err;?></span>
  </div>

  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="text" class="form-control <?php echo (!empty($quantity_err)) ? 'is-invalid' : ''; ?>" id="quantity" name="quantity" value="<?php echo $quantity; ?>">
    <span><?php echo $quantity_err;?></span>
  </div>

  <div class="form-group">
    <label for="quantity">Details</label>
    <textarea class="form-control" rows="5" id="detail" name="detail"><?php echo $detail; ?></textarea>
  </div>
  

  <div class="form-group">
      <label for="imageurl">URL Picture:</label>
      <input type="text" class="form-control" id="imageurl" name="imageurl" value="<?php echo $url; ?>">
  </div>

  <input type="hidden" name="id" value="<?php echo $product_id; ?>"/>
  <td><button type="submit" class="btn btn-primary">Confirm</button></td>
  <td><a href="product.php"class ="btn btn-danger">Cancel</a></td>

 </form>

</div>
 
<body>

