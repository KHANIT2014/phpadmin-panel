<div class="col-md-4">

 
                    <!-- // echo $_POST['search'];



                    // if(isset($_POST['submit'])){
                    //    echo $search =$_POST['search'];

                    //     $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
                    //     $search_query = mysqli_query($connection,$query);
                    //     if(!$search_query){
                    //         die(" query failed".mysqli_error($connection));
                    //     }
                    //     $count = mysqli_num_rows($search_query);
                    //     if($count == 0){
                    //         echo "<h1> no result found</h1>";
                    //     }else {
                    //         echo " sonme reult found";
                    //     }
                    // }; 
                    //The above code is transfered in search.php file ..... -->
                     <!-- and was under php formate   khan javid -->

                    

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                   
                    <form action="search.php" method = "post">
                    <div class="input-group">
                        <input name= "search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name = "submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                <?php 
                        $query = "SELECT * FROM categories LIMIT 3";    // LIMIT 3  is called that show limit 3 setted 
                        $select_categories_sidebar= mysqli_query($connection,$query);
        
                      
                    ?>
                    <h4>Blog Categories</h4>
                 
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                                  while ($row = mysqli_fetch_assoc($select_categories_sidebar)) {
                                    $cat_title = $row['cat_title'];
                
                                    echo  "<li><a href='#'>{$cat_title}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php  include "widget.php";  ?>



             

            </div>