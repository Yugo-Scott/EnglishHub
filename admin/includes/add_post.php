
<?php
if(isset($_POST['create_post'])){
  global $connection;
    // echo $post_title = $_POST['title'];
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_category_id = $_POST['post_category'];
    $post_status = $_POST['post_status'];

    echo $post_image = $_FILES['image']['name']; // this is the name of the file
    echo $post_image_temp = $_FILES['image']['tmp_name']; // this is the temporary location of the file

    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;
    $post_url = $_POST['post_url'];
    
  //   if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
  //     echo "hello";
  // } else {
  //     echo "nope";
  // }
  
  //   if ($_FILES['image']['error'] > 0) {
  //     echo "Error: " . $_FILES['image']['error'] . "<br>";
  // }
  // echo getcwd();
  

    move_uploaded_file($post_image_temp, "images/{$post_image}"); // this is the function that actually moves the file from the temporary location to the location we want it to be
    // if(move_uploaded_file($post_image_temp, "images/{$post_image}")){
    //   $error = error_get_last();
    //   echo $error['message'];
    // } else {
    //   echo "nope";
    // }
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status, post_url) ";
    $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', 0, '{$post_status}', '{$post_url}') ";
    $create_post_query = mysqli_query($connection, $query);
    comfirm(($create_post_query));
    header("Location: posts.php");


  }

?>

    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Post Title</label>
          <input type="text" class="form-control" name="title">
      </div>

         <!-- <div class="form-group">
       <label for="category">Post Category Id</label>
       <input type="text" class="form-control" name="post_category_id">
      
      </div> -->
      <div class="form-group">
       <label for="category">Category</label>
       <select name="post_category" id="">
           
<?php

        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_categories )) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            
            
            echo "<option value='$cat_id'>{$cat_title}</option>";
         
            
        }

?>
           
        
       </select>
      
      </div>

      <div class="form-group">
         <label for="title">Post Author</label>
          <input type="text" class="form-control" name="author">
      </div>
      
      

       <div class="form-group">
          <label for="post_status">Post Status</label>
          <input type="text" class="form-control" name="post_status">
      </div>
      
      
      
    <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="image">
      </div>

      <div class="form-group">
         <label for="post_url">Post YouTube URL</label>
          <input type="text" class="form-control" name="post_url">
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <textarea class="form-control "name="post_content" id="" cols="30" rows="10">
         </textarea>
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
      </div>


</form>