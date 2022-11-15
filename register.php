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
  <h1>PHPSHOP</h1>
  <p>Accessories</p> 
</div>


<div class="container" style="margin-bottom: 100px">
  <h2>Register</h2>
  <form action="insert.php" method="post">
 

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name">
  </div>


  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="form-group">
    <label for="con_password">Confirm Password</label>
    <input type="password" class="form-control" id="con_password" name="con_password">
  </div>

    <button type="submit" class="btn btn-primary">Sign in</button>
  </form>
  <div style="padding:15px;"></div>

</div>
 