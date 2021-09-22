<?php
  $showError = "false";
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../includes/_connection.php';
    $user_email = mysqli_escape_string($con, $_POST['email']);
    $user_password = mysqli_escape_string($con, $_POST['password']);
    //checking user exist or not in database
    $sql = "SELECT * FROM `users` WHERE `email` = '$user_email'";
    $result = mysqli_query($con,$sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
      $row = mysqli_fetch_assoc($result);
      if(password_verify($user_password, $row['password'])){
        session_start();
        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $user_email;
        $_SESSION['signupSuccess'] = true;

        $checkRole = mysqli_query($con, "SELECT * FROM `users` WHERE `email`= '".$_SESSION['email']."'");
        while($row = mysqli_fetch_array($checkRole)){
          $role = $row['role'];
          if($role == 'manager'){
            header('location:../manager-dashboard.php');
          }else if($role == 'admin'){
            header('location:../admin-dashboard.php');
          }else if($role == 'user'){
            header('location:../user-dashboard.php');
          }
        }
      }
    }else{
      header('location:../index.php?signupSuccess=false&msg=Invalid credentials.');
      exit();
    }
  }
?>