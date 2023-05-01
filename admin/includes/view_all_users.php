

<table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                <td>ID</td>
                                <td>username</td>
                                <td>FristName</td>
                                <td>LastName</td>
                                <td>Email</td>
                                <td>Image</td>
                                <td>Role</td>
                                <td>Date</td>
                                
                                </tr>
                            </thead>
                            <tbody>
<?php 

$query = "SELECT * FROM users";
$selector_users = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($selector_users)){
    $user_id = $row['user_id'];
    $username = $row['username'];

    $user_password = $row['user_password'];
    $fristname = $row['user_fristname'];
    $lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    // $post_comments_count = $row['post_comments_count'];
    $post_status =$row['user_role'];
   
    
    echo "<tr>";
    echo "<td> $user_id </td>";
    echo "<td> $username </td>";
    echo "<td> $fristname </td>";

   

    // $query= "SELECT * FROM categories WHERE cart_id = $post_category_id ";
    // $select_category_id = mysqli_query($connection,$query);
    // while($row = mysqli_fetch_assoc($select_category_id)){
    //     $cat_id = $row['cat_id'];
    //     $cat_title = $row ['cat_title'];
    //      NEED to update the same tags as well as applied in the applications

    //     echo "<td>$post_category_id</td>";

    // };
    echo "<td> $lastname </td>";
    echo "<td> $user_email </td>";
    echo "<td><img src=''uploads/$user_image''alt= 'image'> </td>";
    // echo "<td> $post_image </td>";
    
    echo "<td> <a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a> </td>";
    echo "<td> <a href='users.php?delete={$user_id}'>Delete</a> </td>";
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
                            $this_user_id = $_GET['delete'];
                            $query = "DELETE FROM users WHERE  user_id= {$this_user_id}";
                            $delete_user_query = mysqli_query($connection,$query);
                            header("location:users.php");
                        }
                        ?>