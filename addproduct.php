
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
  <h2>ADD PRODUCT</h2>
  <form action="add.php" method="post">
 
  <div class="form-group">
    <label for="Product_Name">Product Name</label>
    <input type="text" class="form-control" id="Product_Name" name="Product_Name">
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>

  <div class="form-group">
    <label for="quantity">Quantity</label>
    <input type="text" class="form-control" id="quantity" name="quantity">
  </div>

  <div class="form-group">
    <label for="detail">Details</label>
    <textarea class="form-control" rows="5" id="detail" name="detail"></textarea>
  </div>
  

  <div class="form-group">
      <label for="imageurl">URL Picture:</label>
      <input type="text" class="form-control" id="imageurl" name="imageurl">
  </div>

  <button type="submit" class="btn btn-primary">Confirm</button> 
  <td><a href="product.php"class ="btn btn-danger">Cancel</a></td>

 </form>

</div>
 
<body>

