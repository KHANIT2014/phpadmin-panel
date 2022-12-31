
<?php  
include "db.php";
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}


$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
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
        <label for="post_title">post_title</label>
        <input value="<?php echo $post_title; ?>" type="text" class = "form-control" name="post_title" >
    </div>
    <div class="from-group">
        <select name="post_category_id" id="">
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
    <div class="from-group">
        <label for="post_author">post_author</label>
        <input value="<?php echo $post_author; ?>" type="text" class = "form-control" name="post_author" >
    </div>
    <div class="from-group">
        <label for="post_status">post_status</label>
        <input value="<?php echo $post_status; ?>"  type="text" class = "form-control" name="post_status" >
    </div>
    <div class="from-group">
        <!-- <img src="uploads/$post_image" alt="images"> -->

        <label for="">image</label>
        <input type="file"  name="file" >
    </div>
    <!-- <div class="from-group">
    <input type="file" name ="image1"><br>
    <input type="submit">
    </div> -->
    <div class="from-group">
        <label for="post_tags">post_tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class = "form-control" name="post_tags" >
    </div>
    <div class="from-group">
        <label for="post_date">post_date</label>
        <input value="<?php echo $post_date; ?>" type="date" class = "form-control" name="post_date" >
    </div>
    <div class="from-group">
        <label for="post_content">post_content</label>
        <textarea   class = "form-control" name="post_content" cols= "30"  row= "10">
         <?php echo $post_content; ?>
            
    </textarea>
    </div>
    <div class="from-group">
        <input  class="btn btn-primary"  type="submit"  name="update_post" value = "Publish_post" >
    </div>
  
</form>