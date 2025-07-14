<?php
session_start();
include "includes/config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

  if($user && password_verify($password, $user["password"])){
    $_SESSION["user_id"] = $user["id"];
    $_SESSION["user_role"] = $user["role"];

    if($user["role"] === "admin"){
      header("Location: admin/dashboard.php");
    }else{
      header("Location: index.php");
    }
    exit;
  }else{
    echo "Invalid Login Details!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
     <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body"><br>
                <p class="text-center fw-light text-primary fs-1">My Shop</p>
                <form action="" method="POST">
                  <div class="mb-3 fs-4 text-primary">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your Email" required>
                  </div>
                  <div class="mb-4 fs-4 text-primary">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                  </div>
                  <input class="btn btn-primary w-100 py-8 fs-5 mb-4" type="submit" name="login" value="Login"></input>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-light">Don't have an Account?</p>
                    <a class="text-primary fw-bold ms-2 fs-5" href="register.php">Sign Up</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>