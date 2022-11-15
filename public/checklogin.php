
<?php
    require_once "config.php";  
    $user = "SELECT * FROM user";  
    $login_err = "";

    if($result = mysqli_query($link, $user))
    {
      while($row = mysqli_fetch_array($result))
      {
        if($row["email"] == ($_POST['Email']))
        {
          if($row["pwd"] == ($_POST['password'])){
            $profile = "SELECT * FROM profile WHERE user_id = '".$row['user_id']."'";
            $profile_result = mysqli_query($link, $profile);
            $profile_row = mysqli_fetch_array($profile_result);
            if($profile_row['type'] == "admin"){
              Header("Location: admin.php");
            }
            else{
              Header("Location: user.php?id=" . $row['user_id']);
            }
          } 
          else $login_err = "Your email or password is not correct" ;
        }        
         else         
         {
           $login_err = "Your email or password is not correct" ; 

         }
      }

      if(!empty($login_err))
      {
        echo "<script>";
          echo "alert(\" Incorrect username or password. \");"; 
          echo "window.history.back()";
        echo "</script>";
      }

    }
   mysqli_free_result($result);
   mysqli_close($link);
?> 