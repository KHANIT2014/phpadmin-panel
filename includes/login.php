<?php include "db.php"; ?>

<?php session_start(); ?>


<?php

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password =  $_POST['password'];
   $username= mysqli_real_escape_string($connection,$username);
   $password = mysqli_real_escape_string($connection,$password);

   $query = "SELECT * FROM users WHERE username = '{$username}'";
   $select_user_query = mysqli_query($connection,$query);

   if(!$select_user_query){
    die("Query Failed".mysqli_error($connection));
   }
   while($row= mysqli_fetch_array($select_user_query)){
    $db_id= $row['user_id'];
    $db_username= $row['username'];
    $db_user_password= $row['user_password'];
    $db_user_fristname= $row['user_fristname'];
    $db_user_lastname =$row['user_lastname'];
    $db_user_role= $row['user_role'];
     
   }
if($username == $db_username && $password == $db_user_password){
    $_SESSION ['username']= $db_username;
    $_SESSION ['user_fristname']= $db_user_fristnam;
    $_SESSION ['user_lastname']= $db_user_lastname;
    $_SESSION ['user_role']=$db_user_role ;
    header("Location: ../admin");
 }else{
    header("Location : ../index.php");
}

}


?>

 <!-- this is for testing purpose only  -->
<h1>this is login page</h1>