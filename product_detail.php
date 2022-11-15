<?php
  require_once "config.php"; 
  $product_id = $_GET["id"];

  if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
    $user_id = $_GET['user_id'];
  
    $sql = "SELECT * FROM user WHERE user_id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "i", $param_id);
  
      $param_id = $user_id;
  
      if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $username = $row["name"];
        }
      }
      mysqli_stmt_close($stmt);
    }
  }
  else{
    Header("Location: product_no_detail.php?id=" . $product_id);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>MEME SHOP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>font awesome shopping cart icon</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <title>font awesome home icon</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  </head>
  <body>

<div class="jumbotron text-center"style="margin-bottom: 0;color: dimgray;">
<div style = "position:absolute; left:1230px; top:30px;">
        <td><a href="admin.php"><i class="fas fa-home" style="font-size:20px"></i></i></a></td>
    </div>
<div style = "position:absolute; left:1322px; top:30px;">
        <td> <a href="index.php"><?php echo $username; ?></a></td>
    </div>

<div class="mb-2" style = "position:absolute; left:1300px; top:30px;">
        <td><a href="cart.php"><b-avatar src="https://placekitten.com/300/300"></b-avatar></a></td>
    </div>
<div style = "position:absolute; left:1260px; top:30px;">
        <td><a href="cart.php"><i class="fas fa-shopping-cart" style="font-size:20px"></i></a></td>
    </div>
    <div style = "position:absolute; left:1300px; top:30px;">
       <p> Hi, </p>
    </div>
  <h1>MEME SHOP</h1>
  <p>KMUTT COM. SCI. MEME</p>
</div>

<section class="mb-5">

  <div class="row">
    <?php
       $sql = "SELECT * FROM product WHERE product_id = '".$product_id."' ";
       $result = mysqli_query($link, $sql); 
       $row = mysqli_fetch_array($result);
       ?>
    <div class="col-md-5 mb-4 mb-md-0" style= "width: 15rem; margin-top: 30px; margin-left: 60px">

      <div id="mdb-lightbox-ui"></div>

      <div class="mdb-lightbox">

        <div class="row product-gallery mx-1">

          <div class="col-12 mb-0">
            <figure class="view overlay rounded z-depth-1 main-img">
              <a href="<?php echo $row['image_url']; ?>"
                >
               <?php echo  "<img src ='".$row['image_url']."' width= '540' height='400'> " ?>
                  </a>
            </figure>
          </div>
          <div class="col-12">
            <div class="row">
              <div class="col-2">
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
    <div class="col-md-4" style= "width: 15rem; margin-top: 30px; margin-left: 10px">

      <h5><?php echo $row['product_name']; ?></h5>
      <p class="mb-2 text-muted text-uppercase small">Meme</p>
      
      <p class="pt-1"><?php echo $row['product_detail']; ?></p>
      <div class="table-responsive">
        <table class="table table-sm table-borderless mb-0">
          
        </table>
      </div>
      <hr>
      <div class="table-responsive mb-2">
        <table class="table table-sm table-borderless">
          <tbody>
            <tr>
            <p><span class="mr-1"><strong>Price: <?php echo $row['product_price']; ?> ฿</strong></span></p>
              <td class="pl-0 pb-0 w-25">In stock: <?php echo $row['product_quantity']; ?></td>
            </tr>
            <tr>
              <td class="pl-0">
                <div class="def-number-input number-input safari_only mb-0">
                  <input class="quantity" min="0" name="quantity" value="1" type="number">
                </div>
              </td>
              <td>
               </td>
            </tr>
          </tbody>
        </table>
      </div>
      <a href="cart.php" class="btn btn-dark"><i
      class="fas fa-shopping-cart"> </i> Add to cart</a>
    </div>
  </div>

</section>