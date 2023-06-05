
<?php
if(isset($_POST['create_user'])){
  global $connection;

    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];


    // echo $post_image = $_FILES['image']['name']; // this is the name of the file
    // echo $post_image_temp = $_FILES['image']['tmp_name']; // this is the temporary location of the file

    $username = $_POST['username'];
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    $query .= "VALUES('{$user_firstname}', '{$user_lastname}', 'admin', '{$username}', '{$user_email}', '{$user_password}') ";
    $create_user_query = mysqli_query($connection, $query);
    comfirm(($create_user_query));
    ?>
    <div class="alert alert-success" role="alert">
  <?php echo $user_firstname . " " . $user_lastname; ?> was created: <a href="users.php">View Users</a></div><?php
}


    // $post_date = date('d-m-y');
    // $post_comment_count = 4;
    // $post_url = $_POST['post_url'];

//     // echo $post_title = $_POST['title'];
//     $post_title = $_POST['title'];
//     $post_author = $_POST['author'];
//     $post_category_id = $_POST['post_category'];
//     $post_status = $_POST['post_status'];

//     echo $post_image = $_FILES['image']['name']; // this is the name of the file
//     echo $post_image_temp = $_FILES['image']['tmp_name']; // this is the temporary location of the file

//     $post_tags = $_POST['post_tags'];
//     $post_content = $_POST['post_content'];
//     $post_date = date('d-m-y');
//     // $post_comment_count = 4;
    // $post_url = $_POST['post_url'];
    
  //   if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
  //     echo "hello";
  // } else {
  //     echo "nope";
  // }
  
  //   if ($_FILES['image']['error'] > 0) {
  //     echo "Error: " . $_FILES['image']['error'] . "<br>";
  // }
  // echo getcwd();
  

    // move_uploaded_file($post_image_temp, "images/{$post_image}"); // this is the function that actually moves the file from the temporary location to the location we want it to be
    // if(move_uploaded_file($post_image_temp, "images/{$post_image}")){
    //   $error = error_get_last();
    //   echo $error['message'];
    // } else {
    //   echo "nope";
    // }
  //   $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status, post_url) ";
  //   $query .= "VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', 0, '{$post_status}', '{$post_url}') ";
  //   $create_post_query = mysqli_query($connection, $query);
  //   comfirm(($create_post_query));


  // }

?>

    <form action="" method="post" enctype="multipart/form-data">    
     
     
      <div class="form-group">
         <label for="title">Firstname</label>
          <input type="text" class="form-control" name="firstname">
      </div>

      <div class="form-group">
          <label for="title">Lastname</label>
            <input type="text" class="form-control" name="lastname">
      </div>

      <div class="form-group">
          <label for="title">Username</label>
            <input type="text" class="form-control" name="username">
      </div>

      <div class="form-group">
          <label for="title">Email</label>
            <input type="email" class="form-control" name="email">
      </div>

      <div class="form-group">
          <label for="title">Password</label>
            <input type="password" class="form-control" name="password">
      </div>
           
       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
      </div>

</form>