<?php
session_start();
require 'links/connection.php';

if (isset($_POST['submit'])) {


  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $password =  mysqli_real_escape_string($conn, $_POST['password']);
  $cpassword =  mysqli_real_escape_string($conn, $_POST['cpassword']);

  //encrypt password
  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);


  //checking existing email 

  $emailquery = "SELECT * FROM user WHERE email='$email'";
  $query = mysqli_query($conn, $emailquery);

  $emailcount = mysqli_num_rows($query);

  if ($emailcount > 0) {
    echo "email already exists";
    include('location:account.php');
  } else {
    if ($password === $cpassword) {

      $insertquery = "INSERT INTO user(username,email,phone,password,c_password) values('$name','$email','$phone','$pass','$cpass')";
      $iquery = mysqli_query($conn, $insertquery);
      include('location:index.php');
    } else {
      echo "password are not matching";
      include('location:account.php');
    }
  }


  //  $sql = "INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `phone`) VALUES (NULL, '$name','$pass', '$email','$phone');";




  // if ($conn->query($sql) === TRUE) {
  //    echo "New record created successfully";
  //  } else {
  //   echo "Error: " . $sql . "<br>" . $conn->error;
  // }

}
// $conn->close();
