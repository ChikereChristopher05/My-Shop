<?php
session_start();
include "../includes/config.php";

if(!isset($_SESSION["user_id"]) || $_SESSION["user_role"] !== "admin"){
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
                    <li class="nav-item"><a href="../index.php" class="nav-link">Shop</a></li>
                    <?php if(isset($_SESSION["user_id"])): ?>
                        <?php if($_SESSION["user_role"] === "admin"): ?>
                            
                        <?php endif; ?>
                        <li class="nav-item"><a href="../logout.php" class="nav-link">Logout</a></li>
                    <?php else: ?>
                        <li class="nav-item"><a href="" class="nav-link">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Admin Dashboard</h1>
        <a href="../admin/add_product.php" class="btn btn-success mb-3">Add New Product</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $db->query("SELECT * FROM products");
                while($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td>$<?php echo number_format($row["price"],2); ?></td>
                    <td><img src="../assets/images/<?php echo $row["image"]; ?>" alt="" width="50"></td>
                    <td>
                        <a href="../admin/edit_product.php?id=<?php echo $row["id"]; ?> " class="btn btn-warning btn-sm">Edit</a>
                        <a href="../admin/delete_product.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>