<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>sign up</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="CSS/signup.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="register.php" method="post">
      
      <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
      <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required autofocus>
      <label for="inputPassword" class="sr-only">Enter Name</label>
      <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Enter Email</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <label for="inputEmail" class="sr-only"> Enter Password</label>

      
      <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="sign up">
      <a href="login.php">Already a member</a>
      <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
    </form>
  </body>
</html>

<?php
include('connection/db.php');

// Check database connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $name=$_POST['name'];
       
    $query=mysqli_query($conn,"insert into user(email,password,name)values('$email','$password','$name')");
    
    if($query){
      // Set success message in session variable
      $_SESSION['message'] = "Successfully registered";
      // Redirect to index.php
      header('Location: index.html');
      exit(); // Stop further execution
  } else {
      // Set error message in session variable
      $_SESSION['message'] = "Some error occurred, please try again";
      // Redirect to index.php
      header('Location: index.php');
      exit(); // Stop further execution
  }
}
?>
