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
                            insert_categories();
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


                            <?php  if(isset($_GET['edit'])){
                                $cat_id = $_GET['cat_id'];

                                include "includes/update_category.php";
                            }  ?>










                            

                            <!-- 



                            <!-- Update  or edit above Data  -->
                        
                        </div>






                        <!-- Fetched all Data from Database    -->
                        <div class="col-xs-6">
                        <table class = "table table-bordered table-hover ">
                                <thead>
                                    <tr>
                                        <th>id </th>
                                        <th>catagory</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php findAllCategories();?>
                                    <?php deletecategories();?>                                                         
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
