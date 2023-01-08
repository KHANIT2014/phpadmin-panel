




<?php
include "db.php";

// // $connection = mysqli_connect("localhost","root","","cms_new");
// // if($connection){
// //     echo " successfully connected  !!";
// // }


if(isset($_POST['create_post'])){
    $username = $_POST['username'];
    $user_pass = $_POST['user_password'];
    $user_fristname = $_POST['user_fristname'];
    $user_lastname = $_POST['user_lastname'];

    $user_image = $_FILES['file']['name'];
    $user_image_temp = $_FILES['file']['tmp_name'];
    $user_store = "uploads/".$user_image;

    move_uploaded_file($user_image_temp,$user_store);


    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];


    if(!$connection){
        echo "database error here";
    }else{        
        echo "connected succesfully !!";
    }
    $sqlin="INSERT INTO `users` ( `username`, `user_password`, `user_fristname`, `user_lastname`, `user_email`, `user_image`, `user_role`)
     VALUES ( '$username', '$user_pass', '$user_fristname', '$user_lastname', '$user_email', '$user_image', '$user_role')";

   
    $create_post_query = mysqli_query($connection,$sqlin);   
    confirm($create_post_query);

    if(!$create_post_query){
        echo "Failed to connnect the database ";
    }else{
        echo "  successfully inserted  !!";
    }



    
 


   
  
     

    
 
} 
 ?>


<form action="" method= "POST" enctype= "multipart/form-data" >
    <div class="from-group">
        <label for="username">username</label>
        <input type="text" class = "form-control" name="username" >
    </div>
    <div class="from-group">
        <label for="user_password">user_password</label>
        <input type="password" class = "form-control" name="user_password" >
    </div>
    <div class="from-group">
        <label for="user_fristname">user_fristname</label>
        <input type="text" class = "form-control" name="user_fristname" >
    </div>
    <div class="from-group">
        <label for="user_lastname">user_lastname</label>
        <input type="text" class = "form-control" name="user_lastname" >
    </div>
    <div class="from-group">
        <label for="">image</label>
        <input type="file"  name="file" >
    </div>
    <!-- <div class="from-group">
    <input type="file" name ="image1"><br>
    <input type="submit">
    </div> -->
    <div class="from-group">
        <label for="user_email">user_email</label>
        <input type="email" class = "form-control" name="user_email" >
    </div>
    <div class="from-group">
        <label for="user_role">user_role</label>
        <input type="text" class = "form-control" name="user_role" >
    </div>
    
    <div class="from-group">
        <label for="post_content">post_content</label>
        <textarea   class = "form-control" name="post_content" cols= "30"  row= "10"> </textarea>
    </div>
    <div class="from-group">
        <input  class="btn btn-primary"  type="submit"  name="create_post" value = "Publish_post" >
    </div>
  
</form>

<!-- <form action="" method ="POST"  enctype= "multipart/form-data" >
    <label for="">uploading</label><br>
    <input type="file" name="file"><br>
    <input type="submit" name="upload" value = "upload_file"  >
</form> -->