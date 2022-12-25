
<?php 
include "header.php";
if(isset($_GET['p_id'])){
    $this_post_id =  $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = $this_post_id";
$selector_posts_by_id = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($selector_posts_by_id )){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];

    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $file_name = $row['post_image'];
    $post_tags = $row['post_tags'];
    // $post_comments_count = $row['post_comments_count'];
    $post_status =$row['post_status'];
    $post_date = $row['post_date'];
}

if(isset($_POST['update_post'])){

    echo "this is updated";
// if we hide below mentioned line you will be get the same form edit post !!!
    
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    $file_name = $_FILES['file']['name'];
    $fiel_loc = $_FILES['file']['tmp_name'];
    $file_store = "uploads/".$file_name;

    move_uploaded_file($fiel_loc,$file_store);


    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    // $post_date = now() ;
    $post_comment_count = 4;




        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}',";
        $query .= "post_category_id = '{$post_category_id}',";
        // // $query .= "date = now()', ";
        $query .= "post_author = '{$post_author}',";
        $query .= "post_content = '{$post_content}',";
        $query .= "file_name = '{$post_image}',";
        $query .= " WHERE  post_id = {$this_post_id}";

        $update_post = mysqli_query($connection,$query);
        
        // confirm($update_post);

        if(!$update_post){
            die ("function failed " .mysqli_error($connection));
        }
        
}
?>

    <form action="" method= "post" enctype= "multipart/form-data" >
    <div class="from-group">
        <label for="post_title">post_title</label>
        <input value="<?php echo $post_title; ?>" type="text" class = "form-control" name="post_title" >
    </div>
    <div class="from-group">
        <select name="post_category" id="">
            <?php
        $query = "SELECT * FROM categories  "; 
        $select_categories= mysqli_query($connection,$query);
        confirm($select_categories);

        
        while ($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row ['cat_title'];

            echo " <option  value='$cat_id' >$cat_title</option> ";
        }
            ?>
        </select>
    </div>
    <div class="from-group">
        <label for="post_author">post_author</label>
        <input value="<?php echo $post_author; ?>" type="text" class = "form-control" name=" post_author" >
    </div>
    <div class="from-group">
        <label for="post_status">post_status</label>
        <input value="<?php echo $post_status; ?>" type="text" class = "form-control" name="post_status" >
    </div>
    <div class="from-group">

        <img width = "100" src="/uploads/ <?php echo  $file_name; ?>" alt="">
        <input type="file" name="file" id="">
    </div>
    
    <div class="from-group">
        <label for="post_tags">post_tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class = "form-control" name="post_tags" >
    </div>
    
    <div class="from-group">
        <label for="post_content">post_content</label>
        <textarea   class = "form-control" name="post_content" cols= "30"  row= "10">
        <?php echo $post_tags; ?>        
    </textarea>
    </div>
    <div class="from-group">
        <input  class="btn btn-primary"  type="submit"  name="update_post" value = "Publish_post" >
    </div>
  
</form>

