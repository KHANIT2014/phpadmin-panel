<?php
if(isset($_POST['upload'])){
    $file_name = $_FILES['file']['name'];
    print_r($file_name);
    $file_loc = $_FILES['file']['tmp_name'];
    $store_file = "../images/" .$file_name;


    move_uploaded_file($file_loc, $store_file);
}
?>








// if(isset($_POST['create_post'])){
    
//     $post_title = $_POST['post_title'];
//     $post_author = $_POST['post_author'];
//     $post_post_category_id = $_POST['post_post_category_id'];
//     $post_status = $_POST['post_status'];

//     $file_name = $_FILES['file']['name'];
//     print_r($file_name);

//     $file_loc = $_FILES['file']['tmp_name'];
//     $file_store = "uploads/".$file_name;


//     $post_tags = $_POST['post_tags'];
//     $post_content = $_POST['post_content'];
//     $post_date = date('d-m-y');
//     $post_comment_count = 4;
//     move_uploaded_file($file_loc, $file_store);


    // $query = "INSERT INTO `posts`(`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) 
    // VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]',
    // '[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]')"

 
}  ?>


<!-- <form action="" method= "post" enctype= "multipart/form-data" >
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
    <div class="from-group">
    <input type="file" name ="image1"><br>
    <input type="submit">
    </div>
    <div class="from-group">
        <label for="post_tags">post_tags</label>
        <input type="text" class = "form-control" name="post_tags" >
    </div>
    <div class="from-group">
        <label for="post_content">post_content</label>
        <textarea   class = "form-control" name="post_content" cols= "30"  row= "10"> </textarea>
    </div>
    <div class="from-group">
        <input  class="btn btn-primary"  type="submit"  name="create_post" value = "Publish_post" >
    </div>
  
</form> -->

<form action="" method ="POST"  enctype= "multipart/form-data" >
    <label for="">uploading</label><br>
    <input type="file" name="file"><br>
    <input type="submit" name="upload" value = "upload_file"  >
</form>