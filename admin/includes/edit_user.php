
<?php  
include "db.php";
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}


$query = "SELECT * FROM users WHERE id = $the_post_id";
$selector_posts_id = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($selector_posts_id)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];

    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content =$row['post_content'];
    // $post_comments_count = $row['post_comments_count'];
    $post_status =$row['post_status'];
    $post_date = $row['post_date'];
}

if(isset($_POST['update_post'])){



    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    // echo $post_author;
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['file']['name'];
    $post_image_temp = $_FILES['file']['tmp_name'];
    $post_store = "uploads/".$post_image;

    move_uploaded_file($post_image_temp,$post_store);


    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    $post_comment_count = 4;


    // $sql= "UPDATE `posts` SET `post_category_id` = '$post_category_id', `post_title` = '$post_title', `post_author` = '$post_author',
    //  `post_image` = '$post_image, `post_date` = '$post_date', `post_content` = ' $post_content',
    //  `post_tags` = '$post_tags', `post_status` = '$post_status' WHERE `posts`.`post_id` = $the_post_id";

// this below mentioned code is working fine for the updations which is updated by KHAN JAVID.
    $sql= "UPDATE `posts` SET `post_category_id` = '$post_category_id', `post_title` = '$post_title',`post_author` = '$post_author',
    `post_image` = '$post_image', `post_date` = '$post_date', `post_content` = '$post_content', `post_tags` = '$post_tags',
     `post_status` = '$post_status' WHERE `posts`.`post_id` = $the_post_id";
     $update_data = mysqli_query($connection,$sql);

     if($update_data){
        echo "Data updated successfully !!";
     }else{
        echo "something is wrong !! ";
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
