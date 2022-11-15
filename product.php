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
  <title>font awesome home icon</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
 
<div class="jumbotron text-center"style="margin-bottom: 0;color: dimgray;">
<div style = "position:absolute; left:1260px; top:30px;">
        <td><a href="admin.php"><i class="fas fa-home" style="font-size:20px"></i></i></a></td>
    </div>

  <h1>MEME SHOP</h1>
  <p>KMUTT COM. SCI. MEME</p> 
</div>





<div class="container">
  <table class="table"> 
        
            <tbody> 
            <td><h2>Products</h2></td>
            <td style="text-align: right;"><a href="addproduct.php"class ="btn btn-primary">Add Product</a></td>
            </tbody>
  </table>
  <table class="table">
    <thead>
      <tr>
 
        <th>รหัส</th>
        <th>สินค้า</th>
        <th style="text-align: right;"></th>
        <th style="text-align: right;"></th>
        <th style="text-align: right;"></th>
       </tr>
    </thead>


    <tbody>
     
      <!-- <tr>
        
        <td>productid</td>
        <td>productname</td>
        <td><a href="view.php"class ="btn btn-primary">View</a></td>
        <td><a href="update.php"class ="btn btn-success">Update</a></td> 
        <td><a href="#เป็นไฟล์รันดีลีทที่มีหน้าต่างบอกอะไรสักหน่อย"class ="btn btn-danger">Delete</a></td>   
       
        

     </tr> -->
     <?php
        require_once "config.php"; 
        $sql = "SELECT * FROM product"; 
        if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td>" . $row['product_id'] . "</td>"; 
              echo "<td>" . $row['product_name'] . "</td>"; 
              echo '<td><a href="view.php?id=' . $row['product_id'] .'"class="btn btn-success" <span>View</span></a></td>';
              echo '<td><a href="update.php?id='. $row['product_id'] .'"class="btn btn-primary" <span>Update</span></a></td>';
              echo '<td><a href="delete.php?id='. $row['product_id'] .'"class="btn btn-danger" <span>Delete</span></a></td>';
              echo "</tr>";
            }
            mysqli_free_result($result);
          } 
        } 
        else{
          echo "Something went wrong. Please try again.";
        }
        mysqli_close($link); 
    ?>
    
    

    <tbody>
  </table>
<br>
</div>
