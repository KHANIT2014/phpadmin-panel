<?php 
function confirm($result){
    global $connection;
    if(!$result){
        die("query failed .".mysqli_error($connection) );
    }
}

function insert_categories(){
    global $connection;

    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty ($cat_title)){
            echo "This field should not be empty ";
        }else{
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE ('{$cat_title}')";

            $create_category_query = mysqli_query($connection,$query);
            if(!$create_category_query){
                die('Query Failed'.mysqli_error($connection));
            }

        }
    }
}

function findAllCategories(){
    global $connection;
    $query = "SELECT * FROM categories ";    // LIMIT 3  is called that show limit 3 setted 
    $select_categories= mysqli_query($connection,$query);
                            
    while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row ['cat_title'];


        echo "<tr>";

        echo  "<td>{$cat_id}</td>";
        echo  "<td>{$cat_title}</td>";
        echo "<td> <a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td> <a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }

}






function deletecategories(){
    global $connection;
    if(isset($_GET['delete'])){
        $this_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories  WHERE cat_id  = {$this_cat_id} ";
        $delete_categories_query = mysqli_query($connection,$query);
    }
}

?>