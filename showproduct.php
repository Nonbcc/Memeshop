<?php
  require_once "config.php"; 
  $query_product = "SELECT * FROM product ORDER BY product_id ASC";
  $result_pro = mysqli_query($link, $query_product) or die("Error in query : $query_product".mysqli_error());
  // echo($query_product);
  // exit();
  // if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
  //   $user_id = $_GET['user_id'];
  // }else{
  //   $user_id = '';
  // }
  mysqli_close($link);
?>

<dvi class = "row">
&emsp;
&emsp;
&nbsp;
<?php foreach ($result_pro as $row_pro) { ?>
  <div class="card bg-light mb-3" style="width: 15rem; margin-top: 20px;">
  <img class="card-img-top" src="<?php echo $row_pro['image_url']; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row_pro['product_name']; ?></h5>
    <p class="card-text">Price: <?php echo $row_pro['product_price']; ?> ฿</p>
    <?php
      echo "<a href='product_detail.php?id=".urlencode($row_pro['product_id'])."&user_id=".urlencode($user_id)."' class='btn btn-primary'> Detail </a>";
    ?>
  </div>
</div>
&emsp;
&emsp;
&emsp;
&nbsp;
<?php } ?>

</dvi>

