<?php include "includes/header.php";?>
<?php include "includes/db.php";?>
<?php include "functions.php";?>

    <!-- Navigation -->
<?php include "includes/navigation.php";?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <?php
                    $query = "SELECT * FROM posts WHERE post_status = 'published'";
                    $select_all_posts_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_all_posts_query)){
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_status = $row['post_status'];
                        $post_date = $row['post_date'];
                        $post_url = $row['post_url'];
                        $post_content = $row['post_content']; //substr($row['post_content'],0,100);

            ?>  
            <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date?></p>
            
            <?php
            // YouTubeのURLからIDを取得

            // YouTubeの動画のURL
            // $url = $post_url;

            // 動画のIDを取得
            $id = get_youtube_id($post_url);

            // YouTubeの埋め込みURLを作成
            $embed_url = 'https://www.youtube.com/embed/'.$id;

            // HTMLを出力
            echo '<hr>';
            echo '<div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">';
            echo '<iframe src="'.$embed_url.'" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>';
            echo '</div>';
            echo '<hr>';
            ?>
            <!-- <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr> -->
            <p><?php echo $post_content?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <?php } ?> 

                <!-- Second Blog Post -->

                <!-- Third Blog Post -->

                <!-- Pager -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>

            </div>

        </div>
        <!-- /.row -->

        <hr>
        <!-- Footer -->
<?php include "includes/footer.php";?>


