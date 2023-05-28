<?php  include "includes/header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navbar.php";  ?>
        <div id="page-wrapper">
        <?php if($connection) echo "connected"; ?>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcom To Admin Panel
                           
                            
                            <!-- <small><?php echo $_SESSION['username'] ?></small> -->
                        </h1>
                </div>
                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $query = "SELECT * FROM POSTS";
                        $select_all_query_posts = mysqli_query($connection,$query);
                        $post_count = mysqli_num_rows($select_all_query_posts);
                        echo "<div class='huge'>{$post_count}</div>"
                        
                        ?>
                 
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $query_c = "SELECT * FROM COMMENTS";
                        $select_all_query_comments = mysqli_query($connection,$query_c);
                        $comment_count= mysqli_num_rows($select_all_query_comments);
                        echo "<div class='huge'>{$comment_count}</div>"
                        ?>
                     
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $query_u ="SELECT * FROM USERS";
                        $select_all_query_users = mysqli_query($connection,$query_u);
                        $user_count = mysqli_num_rows($select_all_query_users);
                        echo "<div class='huge'>{$user_count}</div>"
                        ?>
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                        $query_ct ="SELECT * FROM CATEGORIES";
                        $select_all_query_categories= mysqli_query($connection,$query_ct);
                        $category_count = mysqli_num_rows($select_all_query_categories);
                        echo "<div class='huge'>{$category_count}</div>"
                        ?>
                        
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

                <?php
                 $query_published = "SELECT * FROM posts WHERE post_status ='Published' ";
                 $select_all_published_posts= mysqli_query($connection,$query_published);
                 $published_count = mysqli_num_rows($select_all_published_posts);


                $query_draft = "SELECT * FROM posts WHERE post_status ='draft' ";
                $select_all_draft_posts= mysqli_query($connection,$query_draft);
                $draft_count = mysqli_num_rows($select_all_draft_posts);




                $query_draft = "SELECT * FROM comments WHERE comment_status ='unapprove' ";
                $select_all_unapprove_comments= mysqli_query($connection,$query_draft);
                $unapprove_count = mysqli_num_rows($select_all_unapprove_comments);


                $query_draft = "SELECT * FROM users WHERE user_role ='subscriber' ";
                $select_all_subscriber_users= mysqli_query($connection,$query_draft);
                $subscriber_count = mysqli_num_rows($select_all_subscriber_users);
                ?>

                <div class="rows">
                <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Counts'],

          <?php
          $elements_text = ['All Posts','Active Posts','draft_posts' ,'unapprove','subscriber', 'comments','users','categories'];
          $elements_count= [$post_count,$published_count,$draft_count,$unapprove_count,$subscriber_count,$comment_count,$user_count,$category_count];


          for($i=0;$i<8; $i++){
            echo "['{$elements_text[$i]}'" . ",". "{$elements_count[$i]}],";

          }
          
          ?>


        //   ['2014', 1000 ],
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: 800px; height: 500px;"></div>
                </div>



                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php  include "includes/footer.php"; ?>
