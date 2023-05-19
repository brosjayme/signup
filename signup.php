<?php
$invalid=0;
$user=0;
$success=0;
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'config.php';
   $username=$_POST['username'];
   $password=$_POST['password'];
   $confirm_password=$_POST['confirm_password'];


$sql="select * from `registration` where username='$username'";
$result=mysqli_query($conn,$sql);
if($result){
    $num=mysqli_num_rows($result);
    if($num>0){
        // echo "user already exist";
        $user=1;
    }else{  
       if($password===$confirm_password){
   $sql= "insert into `registration`(username, password)
   values('$username', '$password')";
   $result= mysqli_query($conn,$sql);
      if($result){
    // echo "Login Successfull";
    $success=1;
    // header('location:login.php');
   }
  }else{
    $invalid=1;
    // die(mysqli_error($conn));
   }
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

    <title>Sign In Form</title>
  </head>
  <body>

<?php
if($user){
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>sorry oo!! </strong>User already exist.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
};
?>


<?php
if($invalid){
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>invalid</strong>User password does not match.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
};
?>

<?php
if($success){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>signup successfull!! </strong>welcome.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
};
?>


  <h1 class="text-center">Sign In page</h1>

  <div class="container mt-5 w-25 p-2">
  <form action="signup.php" method= "post">
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
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" class="form-control"
     placeholder='confirm password' name='confirm_password'>
  </div>

 
  <button type="submit" class="btn btn-primary w-100">Sign in</button>
</form> 

  </div>

  </body>
</html>