<?php  include "includes/header.php"; ?>

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
                            <small>Author</small>
                        </h1>


                        <div class="col-xs-6">
                            <?php 
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
                            ?>




                            <!-- add data  -->


                            <form action="" method= "POST">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text"  class= "form-control" name = "cat_title"  >
                                </div>
                                <div class="form-group">
                                    <input class = "btn btn-primary" type="submit" name = "submit" value = "Add category" >
                                </div>  
                            </form>

                            <!-- edit post is mentioned below  created form for edit data -->



                            <form action="" method= "POST">
                                <div class="form-group">
                                    <label for="cat-title">Update Category</label>  
                                    <?php 
                                    if(isset($_GET['edit'])){
                                        $cat_id = $_GET['edit'];
                                        $query = "SELECT * FROM categories WHERE cat_id = $cat_id "; 
                                        $select_categories_id= mysqli_query($connection,$query);
                                        while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                            $cat_id = $row['cat_id'];
                                            $cat_title = $row ['cat_title'];
    
                                            ?>
                                            <input value = "<?php if(isset($cat_title)){ echo $cat_title;}  ?> " type="text"  class= "form-control" name = "cat_title"  >

                                       <?php }}?>
                
    
                                         
                                    
                                   
                                    
                                </div>
                                <div class="form-group">
                                    <input class = "btn btn-primary" type="submit" name = "submit" value = "Update category" >
                                </div>  
                            </form>




                            <!-- Update  or edit above Data  -->
                        
                        </div>






                        <!-- Fetched all Data from Database    -->
                        <div class="col-xs-6">
                            <?php   $query = "SELECT * FROM categories ";    // LIMIT 3  is called that show limit 3 setted 
                        $select_categories= mysqli_query($connection,$query); ?>
                            <table class = "table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>id </th>
                                        <th>catagory</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                       
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
        
                      
                    ?>
                    <?php
                    if(isset($_GET['delete'])){
                        $this_cat_id = $_GET['delete'];
                        // this query is wrriten for Deletion the Data


                        $query = "DELETE FROM categories  WHERE cat_id  = {$this_cat_id} ";
                        $delete_categories_query = mysqli_query($connection,$query);
                        header("Location : categories.php");
                    }
                    ?>
                                    <!-- <tr>
                                        <td>Base Id</td>
                                        <td>Base body</td>
                                    </tr>
                                    <tr>
                                        <td>Base Id</td>
                                        <td>Base body</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
