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
</head>
<body>



<div class="jumbotron text-center"style="margin-bottom: 0;color: dimgray;">
  <h1>MEME SHOP</h1>
  <p>KMUTT COM. SCI. MEME</p> 
</div>

<div class="container" style="margin-bottom: 100px; margin-top: 20px">
  <h2>Login</h2>
  <form action="checklogin.php" method="post">
 
          
      <div class="form-group">
        <label for="Email">Email</label>
        <input type="text" class="form-control" id="Email" name="Email">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>

      <button type="submit"class="btn btn-primary">Sign in</button> 
      <td><a href="index.php" style= "margin-left: 10px;">Go back</a></td>


    <div style="padding:15px;"></div>
    <a><strong>Don't have account?</strong></a>
    <a href="register.php" > Register Here!</a>
    
  </form>


</div>
