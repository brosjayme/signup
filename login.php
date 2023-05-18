<?php
$invalid= 0;
$login=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
include 'config.php';
   $username=$_POST['username'];
   $password=$_POST['password'];


$sql="select * from `registration` where 
username='$username' and password='$password'";
$result=mysqli_query($conn,$sql);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
      $login=1;
      session_start();
      $_SESSION['username'] = $username;
      header('location:home.php');
    }else{
     $invalid=1;
}
}
}

?>
















<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>login In Form</title>
  </head>
  <body>

  
<?php
if($invalid){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>sorry oo!! </strong>incorrect data or User already exist.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
};
?>


<?php
if($login){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Logged in successfull!! </strong>welcome.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
};
?>



  <h1 class="text-center">Login page</h1>

  <div class="container mt-5 w-25 p-2">
  <form action="login.php" method= "post">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control"
     placeholder='Enter your username' name='username'>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"
     placeholder='Enter your password' name='password'>
  </div>
 
  <button type="submit" class="btn btn-primary w-100">Login</button>
</form> 

  </div>

  </body>
</html>