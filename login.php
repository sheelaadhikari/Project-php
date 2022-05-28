<?php
session_start();
require 'links/connection.php';


if(isset($_POST['submit'])){


//login data
  $email = $_POST['email'];
  $password = $_POST['password'];

  $email_search = "SELECT * FROM user WHERE email='$email' ";
  $query = mysqli_query($conn,$email_search);

//checking whether email exits in database or not
  $email_count = mysqli_num_rows($query);
  if($email_count){
    $email_pass = mysqli_fetch_assoc($query);
    $db_pass = $email_pass['password'];
    $_SESSION['username'] = $email_pass['username']; //stored username fetched form db

    $pass_decode = password_verify($password, $db_pass);

    if($pass_decode){
      echo "login successfull";
      include 'welcome.php';
    }
    else{
    echo "Password Incorrect";
    }
  }
  else{
    echo "Invalid Email";

  }
   

}




// //login data
// $name = $_POST['name'];
// $password = $_POST['password'] ;



// //selection query
// $sql = "SELECT * FROM `user`;";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {

//     if(($name === $row["username"]) && ($password === $row["password"])){
//         echo "welcome ".$row["username"];
//         echo "<p>Your Profile</p><br>";
//     echo "id: " . $row["user_id"]. "<br>Name: " . $row["username"]. "<br>Email " . $row["email"]. "<br>Phone Number:". $row["phone"]."<br>";
   
//     }
//   }
// } else {
//   echo "0 results";
// }
// $conn->close();
?>
