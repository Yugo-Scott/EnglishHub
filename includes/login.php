<?php include "db.php"; ?>
<?php session_start(); ?>


<?php
if(isset($_POST['login'])){
  echo $username = $_POST['username']; 
  echo $password = $_POST['password'];

  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);

  $query = "SELECT * FROM users WHERE username = '{$username}' ";
  $select_user_query = mysqli_query($connection, $query);
  if(!$select_user_query){
    die("QUERY FAILED" . mysqli_error($connection));
  } else {
    echo "it worked";
  }
  while($row = mysqli_fetch_array($select_user_query)){
   echo $db_user_id = $row['user_id'];
   echo $db_username = $row['username'];
    $db_user_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
  }

  // need to avoid NULL == NULL && NULL == NULL
  // if($username == $db_username && $password == $db_user_password){
  //   header("Location: ../admin");
  //   $_SESSION['username'] = $db_username;
  //   $_SESSION['firstname'] = $db_user_firstname;
  //   $_SESSION['lastname'] = $db_user_lastname;
  //   $_SESSION['user_role'] = $db_user_role;
  // } else {
  //   header("Location: ../index.php");
  // }

  if($username !== $db_username && $password !== $db_user_password){
    header("Location: ../index.php");
  } else if($username == $db_username && $password == $db_user_password){
   echo $_SESSION['username'] = $db_username;
   echo $_SESSION['firstname'] = $db_user_firstname;
    echo $_SESSION['lastname'] = $db_user_lastname;
    echo $_SESSION['user_role'] = $db_user_role;
    header("Location: ../admin");
  } else {
    header("Location: ../index.php");
  }
}
