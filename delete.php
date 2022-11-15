<?php
if(isset($_POST["id"]) && !empty($_POST["id"])){
    require_once "config.php";
    $sql = "DELETE FROM product WHERE product_id = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $_POST["id"];
        if(mysqli_stmt_execute($stmt)){
            header("location: product.php");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else{
    if(empty($_GET["id"])){
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Delete Record</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
        <p>Are you sure you want to delete this record?</p>
        <p>
            <input type="submit" value="Yes">
            <a href="product.php">No</a>
        </p>
    </form>
</body>
</html>