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


                 <!-- Login Form -->
                 <div class="well">
                    <h4>LOgin FOrm</h4>
                   
                    <form action="includes/login.php" method = "post">
                    <div class="form-group">
                        <input name= "username" type="text" class="form-control" Placehoder = "enter username here">
                    </div>
                    <div class="input-group">
                    <input  name = "password" type="password" class = "form-conntrol" Placehoder ="Enter your Password Here">
                        <span class="input-group-btn">
                            <button  class="btn btn-primary" name= "login" type="submit">
                                Submit
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
                                    $cat_id = $row['cat_id'];
                
                                    echo  "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
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