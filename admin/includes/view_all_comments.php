

<table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                <td>ID</td>
                                <td>Author</td>
                                <td>Email</td>
                                <td>Content</td>
                                <td>status</td>
                                <td>Date</td>
                                <td>In Responsive</td>
                                
                                <td>Approve</td>
                                <td>Un Approve</td>
                                <td>Delete</td>
                                </tr>
                            </thead>
                            <tbody>
<?php 

$query = "SELECT * FROM comments";
$selector_comments = mysqli_query($connection,$query);


while($row = mysqli_fetch_assoc($selector_comments)){
    $comment_id = $row['comment_id'];
    $comment_post_id= $row['comment_post_id'];
    $comment_author = $row['comment_author'];

    $comment_email= $row['comment_email'];
    $comment_content= $row['comment_content'];
    $comment_status = $row['comment_status'];
    // $comment_inresposive =$row['in_responsive'];
   
    
   
    $comment_date = $row['comment_date'];
    
    echo "<tr>";
    echo "<td> $comment_id </td>";
    // echo "<td> $comment_post_id </td>";
    echo "<td> $comment_author </td>";

    //  We would be update the same tags in the front line updated lines

   

    // // $query= "SELECT * FROM categories WHERE cart_id = $post_category_id ";
    // // $select_category_id = mysqli_query($connection,$query);
    // // while($row = mysqli_fetch_assoc($select_category_id)){
    // //     $cat_id = $row['cat_id'];
    // //     $cat_title = $row ['cat_title']

    // there is some important tasks added in this programme by khan javid

    // //     echo "<td>$post_category_id</td>";

    // // };
    echo "<td> $comment_email </td>";
    echo "<td> $comment_content </td>";
    echo "<td> $comment_status </td>";
    echo "<td> $comment_date </td>";

    $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    $select_comment_query = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_comment_query)){
        $post_id = $row['post_id'];
        $post_title = $row ['post_title'];
        echo "<td> <a href = '../post.php?p_id=$post_id'>$post_title</a>  </td>";
    }

    // echo "<td> Type something here </td>";
    // echo "<td> $comment_status </td>";
    echo "<td> <a href='posts.php?source=edit_post&p_id='>Approve</a> </td>";
    echo "<td> <a href='posts.php?delete='>Un Approve</a> </td>";
    echo "<td> <a href='posts.php?delete='>Delete</a> </td>";
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