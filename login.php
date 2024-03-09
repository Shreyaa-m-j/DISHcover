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
      
      <h1 class="h3 mb-3 font-weight-normal">Please Login </h1>
      <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Enter Email</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <label for="inputEmail" class="sr-only"> Enter Password</label>

      
      <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="sign up">
      <a href="register.php">Create Account</a>
      <!-- <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p> -->
    </form>
  </body>
</html>

<?php 
session_start(); // Start the PHP session

include ('connection/db.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Use a prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Authentication successful, retrieve the user's name
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row['name']; // Store the user's name in session
        header('location: index.html');
        exit();
    } else {
        echo "<script>alert('Email or password is incorrect. Please try again!')</script>";
    }
}
?>