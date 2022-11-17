<?php
    if(!empty($_POST['Product_Name']) && !empty($_POST['price']) && !empty($_POST['quantity'])){
        require_once "config.php";  
        $p_name = mysqli_real_escape_string($link, $_POST['Product_Name']);  
        $price = mysqli_real_escape_string($link, $_POST['price']); 
        $quantity = mysqli_real_escape_string($link, $_POST['quantity']);
        $detail = mysqli_real_escape_string($link, $_POST['detail']);  
        $url = mysqli_real_escape_string($link, $_POST['imageurl']);

        if(!is_numeric($price)){
            echo "<script>";
                echo "alert(\" Please enter a valid price.\");";
                echo "window.history.back()";
            echo "</script>";
            mysqli_close($link);
            exit();
        }
        else if($price < 0){
            echo "<script>";
                echo "alert(\" Please enter a valid price (only positive value is allowed).\");";
                echo "window.history.back()";
            echo "</script>";
            mysqli_close($link);
            exit();
        }
        else if(strlen($price) - strrpos($price, '.') - 1 > 2){
            echo "<script>";
                echo "alert(\" Please enter a valid price (only 2 decimal points is allowed).\");";
                echo "window.history.back()";
            echo "</script>";
            mysqli_close($link);
            exit();
        }

        if(filter_var($quantity, FILTER_VALIDATE_INT) == false){
            echo "<script>";
                echo "alert(\" Please enter a valid quantity (only integer value is allowed).\");";
                echo "window.history.back()";
            echo "</script>";
            mysqli_close($link);
            exit();
        }
        else if(!ctype_digit($quantity)){
            echo "<script>";
                echo "alert(\" Please enter a valid quantity (only positive value is allowed).\");";
                echo "window.history.back()";
            echo "</script>";
            mysqli_close($link);
            exit();
        }

        $sql = "INSERT INTO product(product_name, product_price, product_quantity, product_detail, image_url) VALUES (?, ?, ?, ?, ?)";
  
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sdiss", $param_name, $param_price, $param_quantity, $param_detail, $param_url);
            
            $param_name = $p_name;
            $param_price = $price;
            $param_quantity = $quantity;
            $param_detail = $detail;
            $param_url = $url;
            if(mysqli_stmt_execute($stmt))
            {
                header("location: product.php");
                exit();
            } 
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    else{
        echo "<script>";
            echo "alert(\" Please fill out the product's info correctly.\");";
            echo "window.history.back()";
        echo "</script>";
    }
    mysqli_close($link);
?>