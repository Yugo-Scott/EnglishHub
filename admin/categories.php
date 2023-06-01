<?php include "includes/admin_header.php"; ?>
    <div id="wrapper">
      
      <!-- Navigation -->
      <?php include "includes/admin_navigation.php"; ?>
      
      <div id="page-wrapper">
        
        <div class="container-fluid">
          
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">
              <h1 class="page-header">
                Welcome to admin
                <small>-Yugo</small>
              </h1>

              <div class="col-xs-6">
                <?php
                insert_categories();
                ?>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="cat-title">Add Category</label>
                    <input type="text" class="form-control" name="cat_title">
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                  </div>
                </form>
                <form action="" method="post">
                  <div class="form-group">
                    <label for="cat-title">Edit Category</label>
                    <?php
                    if(isset($_GET['edit'])){
                      $cat_id = $_GET['edit'];
                      // echo "<h1>$cat_id</h1>";
                      $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                      $select_categories_id = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_categories_id)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                        ?>
                        <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
                        <?php
                      }
                      }else {
                        ?>
                      <input type="text" class="form-control" name="cat_title">
                      <?php
                    };
                      ?>
                    <?php
                    if(isset($_POST['update_category'])){
                      $the_cat_title = $_POST['cat_title'];
                      $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                      $update_query = mysqli_query($connection, $query);
                      if(!$update_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                      }
                    }
                    ?>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="update_category" value="Update Category">
                  </div>
                </form>
                <?php
                if(isset($_GET['edit'])){
                  $cat_id = $_GET['edit'];
                  include "includes/update_categories.php";
                }
                ?>
              </div> <!-- Add Category Form -->

              <div class="col-xs-6">
                <table class="table table-bordered table-hover">
                  <thread>
                    <tr>
                      <th>Id</th>
                      <th>Category Title</th>
                    </tr>
                  </thread>
                  <tbody>
                    <tr>
                      <?php
                      // Find all categories query
                      findAllCategories();
                      ?>
                <?php
                    deleteCategories(); // delete query
                ?>

                    </tr>
                  </tbody>
                </table>
              </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>