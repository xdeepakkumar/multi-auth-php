<?php
  $signupSuccess = "false";
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include '../includes/_connection.php';
    $user_name = mysqli_escape_string($con, $_POST['name']);
    $user_email = mysqli_escape_string($con, $_POST['email']);
    $password = mysqli_escape_string($con,$_POST['password']);
    $cpassword = mysqli_escape_string($con,$_POST['cpassword']);
    $msg = "";

     //checking both password are same or not
     if($password != $cpassword){
        header('location:../index.php?signupSuccess=false&msg=password didnot matched. please try again!');
        exit();
     }
     //checking existance of the email
     $existSql = "SELECT * FROM `users` WHERE `email` ='$user_email'";
     $result = mysqli_query($con, $existSql);
     $numRows = mysqli_num_rows($result);
     if($numRows>0){
       header('location:../index.php?signupSuccess=false&msg=email exist. please try again!');
       exit();
     }else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$user_name', '$user_email', '$hash')";
        $result = mysqli_query($con, $sql);
        if($result){
            header('location:../index.php?signupSuccess=true&msg=Registration successfull. please log in.');
            exit();
        }
     }
     header('location:../index.php?signupSuccess=false&msg=something went wrong!');
     exit();
  }

?>