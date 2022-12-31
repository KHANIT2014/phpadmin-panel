<table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                <td>ID</td>
                                <td>Author</td>
                                <td>title</td>
                                <td>category</td>
                                <td>images</td>
                                <td>status</td>
                                <td>tags</td>
                                <td>comments</td>
                                <td>status</td>
                                <td>Date</td>
                                <td>comments</td>
                                <td>Edit</td>
                                <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
<?php 

$query = "SELECT * FROM posts";
$selector_posts = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($selector_posts)){
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];

    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    // $post_comments_count = $row['post_comments_count'];
    $post_status =$row['post_status'];
    $post_date = $row['post_date'];
    $post_content =$row['post_content'];
    
    echo "<tr>";
    echo "<td> $post_id </td>";
    echo "<td> $post_author </td>";
    echo "<td> $post_title </td>";

   

    // $query= "SELECT * FROM categories WHERE cart_id = {$post_category_id} ";
    // $select_category_id = mysqli_query($connection,$query);
    // while($row = mysqli_fetch_assoc($select_category_id)){
    //     $cat_id = $row['cat_id'];
    //     $cat_title = $row ['cat_title'];

    //     echo "<td>$cat_title</td>";

    // };
    echo "<td> $post_category_id </td>";
    echo "<td> $post_status </td>";
    echo "<td><img src=''uploads/$post_image''alt= 'image'> </td>";
    // echo "<td> $post_image </td>";
    echo "<td> $post_tags </td>";
    echo "<td> $post_comments_count </td>";
    echo "<td> $post_status </td>";
    echo "<td> $post_date </td>";
    echo "<td>$post_content</td>";
    echo "<td> <a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a> </td>";
    echo "<td> <a href='posts.php?delete={$post_id}'>Delete</a> </td>";
    echo "</tr>";
   
}
?>




                                <!-- <tr>
                                    <td>{$post_id}</td>
                                    <td>KHAN JAVID</td>
                                    <td>Admin portal</td>
                                    <td>Smart</td>
                                    <td>High</td>
                                    <td></td>
                                    <td>super tags</td>
                                    <td>This is</td>
                                    <td>today</td>
                                </tr> -->
                            </tbody>
                        </table>


                        <?php
                        if(isset($_GET['delete'])){
                            $this_post_id = $_GET['delete'];
                            $query = "DELETE FROM posts WHERE post_id= {$this_post_id}";
                            $delete_query = mysqli_query($connection,$query);
                        }
                        ?>