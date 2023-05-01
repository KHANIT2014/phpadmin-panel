




<?php
// include "header.php";
include "db.php";

// $connection = mysqli_connect("localhost","root","","cms_new");
// if($connection){
//     echo " successfully connected  !!";
// }


if(isset($_POST['create_post'])){
    
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['file']['name'];
    $post_image_temp = $_FILES['file']['tmp_name'];
    $post_store = "uploads/".$post_image;

    move_uploaded_file($post_image_temp,$post_store);


    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    // $post_date = date('d-m-y');
    // $post_comment_count = 4;
    

    // if(!$connection){
    //     echo "database error here";
    // }else{        
    //     echo "connected succesfully !!";
    // }
    $sqlin="INSERT INTO `posts` ( `post_category_id`, `post_title`, `post_author`, `post_image`, `post_date`, `post_content`, `post_tags`, `post_status`) 
    VALUES ( '$post_category_id', '$post_title', '$post_author', '$post_image', '$post_date', '$post_content', '$post_tags', '$post_status')";

    // $sql ="INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_image`, `post_date`, `post_content`, `post_tags`, `post_status`) 
    // VALUES ('$post_category_id', '$post_title', '$post_author', '$post_image', 'now()', '$post_content', '$post_tags', '$post_status')";
    $create_post_query = mysqli_query($connection,$sqlin);
    confirm($create_post_query);

    if(!$create_post_query){
        echo "Failed to connnect the database ";
    }else{
        echo "  successfully inserted  !!";
    }



    
 


   
  
     

    
 
}  ?>


<form action="" method= "POST" enctype= "multipart/form-data" >
    <div class="from-group">
        <label for="post_title">post_title</label>
        <input type="text" class = "form-control" name="post_title" >
    </div>
    <div class="from-group">
        <label for="post_category_id">post_category_id</label>
        <input type="text" class = "form-control" name="post_category_id" >
    </div>
    <div class="from-group">
        <label for="post_author">post_author</label>
        <input type="text" class = "form-control" name="post_author" >
    </div>
    <div class="from-group">
        <label for="post_status">post_status</label>
        <input type="text" class = "form-control" name="post_status" >
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
        <label for="post_tags">post_tags</label>
        <input type="text" class = "form-control" name="post_tags" >
    </div>
    <div class="from-group">
        <label for="post_date">post_tags</label>
        <input type="date" class = "form-control" name="post_date" >
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