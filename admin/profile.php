<?php  include "includes/header.php"; ?>
<?php
if(isset($_SESSION['username'])){
    $username=  $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username= '{$username}'";
    $select_profile_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_array($select_profile_query)){
        $user_id = $row['user_id'];
        $username = $row['username'];
    
        $user_password = $row['user_password'];
        $fristname = $row['user_fristname'];
        $lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $post_status =$row['user_role'];

    }
}
?>
<?php
if(isset($_POST['edit_user'])){
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
    // $sqlin="UPDATE `users` SET `username` = '$username', `user_password` = '$user_pass', `user_fristname` = '$user_fristname', `user_lastname` = '$user_lastname', `user_email` = '$user_email', `user_role` = '$user_role' WHERE `users`.`user_id` = 8";

   
    // $create_post_query = mysqli_query($connection,$sqlin);   
    // confirm($create_post_query);

    // if(!$create_post_query){
    //     echo "Failed to connnect the database ";
    // }else{
    //     echo "  successfully inserted  !!";
    //     header("location:users.php");
    // }


    $sqli= "UPDATE `users` SET `username` = '$username', `user_password` = '$user_pass', `user_fristname` = '$user_fristname', `user_lastname` = '$user_lastname',
     `user_email` = '$user_email', `user_role` = '$user_role' WHERE `users`.`user_id` = $the_user_id";
     $update_data = mysqli_query($connection,$sqli);

     if($update_data){
        echo "Data updated successfully !!";
        header("location:users.php");
     }else{
        echo "something is wrong !! ";
     }
    



    
 


   
  
     

    
 
}
?>



    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navbar.php";  ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcom To Admin Panel
                            <small>  </small>

                        </h1>
                        <form action="" method= "POST" enctype= "multipart/form-data" >
    <div class="from-group">
        <label for="username">username</label>
        <input  type="text" value="<?php echo $username; ?>" class = "form-control" name="username" >
    </div>
    <div class="from-group">
        <label for="user_password">user_password</label>
        <input type="password" value="<?php echo $user_password; ?>" class = "form-control" name="user_password" >
    </div>
    <div class="from-group">
        <label for="user_fristname">user_fristname</label>
        <input type="text" value="<?php echo $fristname; ?>" class = "form-control" name="user_fristname" >
    </div>
    <div class="from-group">
        <select name="user_role" id="">
            <!-- <option value="subscriber"><?php  echo $user_role; ?></option> -->
            <?php
            if($user_role == 'admin'){
                echo "<option value='subscriber'>subscriber</option>";
            }else{
                echo "<option value='admin'>admin</option>";
            }
            ?>
        </select>
    </div>
    <div class="from-group">
        <label for="user_lastname">user_lastname</label>
        <input type="text" value="<?php echo $lastname; ?>" class = "form-control" name="user_lastname" >
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
        <input type="email" value="<?php echo $user_email; ?>" class = "form-control" name="user_email" >
    </div>
        <label for="post_content">post_content</label>
        <textarea   class = "form-control" name="post_content" cols= "30"  row= "10"> </textarea>
    </div>
    <div class="from-group">
        <input  class="btn btn-primary"  type="submit"  name="edit_user" value = "Publish_post" >
    </div>
  
</form>                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
</div>
        <!-- /#page-wrapper -->

