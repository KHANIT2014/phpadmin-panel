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
                        <?php 
                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        } else{
                            $source = '';
                        }
                        
                        switch($source){
                            case 'add_posts';
                            include "includes/add_posts.php";
                            break;
                            case 'edit_post';
                            include "includes/edit_post.php";
                            break;
                            case '200';
                            echo 'Nice of 200';
                            break;
                            default;

                            include "includes/view_all_comments.php";
                            break;

                           
                        }
                        
                        ?>    
      

                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
</div>
        <!-- /#page-wrapper -->

