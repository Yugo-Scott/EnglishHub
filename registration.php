<?php include "includes/header.php";?>
<?php include "includes/db.php";?>
<?php include "functions.php";?>
    <!-- Navigation -->
    <?php include "includes/navigation.php";?>

    <div class="container-fluid">
          
          <!-- Page Heading -->
          <div class="row">
            <div class="col-lg-12">

      <h3 class="text-center font-weight-light my-4">Create Account</h3>
        <div class="text-center text-muted mb-4">
            <small>Enter your details below.</small>
        </div>
        <?php
        if(isset($_POST['register'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];  
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        echo $username = mysqli_real_escape_string($connection, $username); // escape strings
        $email = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);
        // $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12)); // encrypt password
        $query = "SELECT randSalt FROM users";
        $select_randsalt_query = mysqli_query($connection, $query);
        if(!$select_randsalt_query){
          die("QUERY FAILED" . mysqli_error($connection));
        } else {
          echo "it worked";
        }

        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randSalt'];
        $password = crypt($password, $salt);
        $query = "INSERT INTO users (user_firstname, user_lastname, username, user_email, user_password, user_role) ";
        $query .= "VALUES('{$firstname}', '{$lastname}', '{$username}', '{$email}', '{$password}', 'subscriber')";
        $register_user_query = mysqli_query($connection, $query);
        comfirm($register_user_query);
        $message = "Your registration has been submitted";
        } else {
          $message = "";
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Firstname</label>
         <input type="text" class="form-control" placeholder="Enter your first name" name="firstname">
     </div>

     <div class="form-group">
         <label for="title">Lastname</label>
           <input type="text" class="form-control" placeholder="Enter your last name" name="lastname">
     </div>

     <div class="form-group">
         <label for="title">Username</label>
           <input type="text" class="form-control" placeholder="Enter desired name" name="username">
     </div>

     <div class="form-group">
         <label for="title">Email</label>
           <input type="email" class="form-control" placeholder="name@example.com" name="email">
     </div>

     <div class="form-group">
         <label for="title">Password</label>
           <input type="password" class="form-control" placeholder="Create a password" name="password">
     </div>
          
      <div class="form-group">
         <input class="btn btn-primary btn-block" type="submit" name="register" value="Register">
     </div>

</form>
    <div class="text-center py-3">
    <div class="small"><a href="login.html">Have an account? Go to login</a></div>
    </div>

    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    <?php include "includes/footer.php";?>