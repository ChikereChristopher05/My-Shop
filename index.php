<?php
session_start();
include "includes/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | My Shop</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a href="index.php" class="navbar-brand">My Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="products.php" class="nav-link">Shop</a></li>
                    <?php if(isset($_SESSION["user_id"])): ?>
                        <?php if($_SESSION["user_role"] === "admin"): ?>
                            <li class="nav-item"><a href="admin/dashboard.php" class="nav-link">Admin Panel</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a href="cart.php" class="nav-link">Cart</a></li>
                        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="jumbotron text-center bg-light p-5">
            <h1>Welcome to My Shop</h1>
            <p>Discover amazing products at the best prices!</p><br><br>
            <a href="products.php" class="btn btn-primary">Shop Now</a>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-center">Featured Products</h2><br>
        <div class="row">
            <?php
            $result = $db->query("SELECT * FROM products ORDER BY RAND() LIMIT 4");
            while($row = $result->fetch_assoc()):
            ?>
            <div class="col-md-3">
                <div class="card">
                    <img src="assets/images/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <p class="card-text">$<?php echo number_format($row['price'], 2); ?></p>
                        <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <footer class="bg-black text-light text-center py-3 mt-5">
            <p>&copy; 2025 My Shop.</p>
    </footer>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>