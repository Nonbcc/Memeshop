<?php
    require_once "config.php";  
    $password = mysqli_real_escape_string($link, $_POST['password']);  
    $con_password = mysqli_real_escape_string($link, $_POST['con_password']); 
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $name = mysqli_real_escape_string($link, $_POST['name']);  

    if(empty($name) || empty($email)){
        echo "<script>";
            echo "alert(\" Please fill out the info correctly.\");";
            echo "window.history.back()";
        echo "</script>";
        mysqli_close($link);
        exit();
    }

    if($password==$con_password && !empty($password)){
        $check_email = "SELECT * FROM user";
        if ($check_result = mysqli_query($link, $check_email)){
            while ($row = mysqli_fetch_array($check_result)){
                if($row['email'] == $email){
                    echo "<script>";
                        echo "alert(\" Your e-mail is already existed in system.\");";
                        echo "window.history.back()";
                    echo "</script>";
                    mysqli_close($link);
                    exit();
                }
            }
        }

        $sql = "INSERT INTO user(email, pwd, name) VALUES (?, ?, ?)";
  
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_email, $param_password, $param_name);
            
            $param_email = $email;
            $param_password = $password;
            $param_name = $name;
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        

        $id_loc =  "SELECT * FROM user WHERE email ='".$email."'";
        $result = mysqli_query($link, $id_loc);
        $row = mysqli_fetch_array($result);
    
        $sql1 = "INSERT INTO profile(user_id, type) VALUES (?,?)";
        
        if($stmt = mysqli_prepare($link, $sql1))
        {
            mysqli_stmt_bind_param($stmt, "is", $param_id, $param_type);
            
            $param_id = $row['user_id'];
            $param_type = 'user';
            
            if(mysqli_stmt_execute($stmt))
            {
                header("location: login.php");
                exit();
            } 
            else
            {
                echo "Something went wrong. Please try again later.";
            }
        }

        mysqli_stmt_close($stmt);
    }

    else {
        if(empty($password) && empty($con_password)){
            echo "<script>";
                echo "alert(\" Password and Confirm Password fields are still empty.\");"; 
                echo "window.history.back()";
            echo "</script>";
            mysqli_close($link);
            exit();
        }
        
        echo "<script>";
            echo "alert(\" Password and Confirm Password fields have to be the exact same.\");"; 
            echo "window.history.back()";
        echo "</script>";
    }
    mysqli_close($link);
?> 