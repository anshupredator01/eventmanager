<?php
include '../includes/db.php';
include '../includes/functions.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $userType = isset($_GET['type']) ? $_GET['type'] : null;

    $loginResult = loginUser($username, $password, $userType);

    if ($loginResult === true) {
        $_SESSION['user_type'] = $userType;
        $_SESSION['username'] = $username;

        switch ($userType) {
            case 'user':
                header("Location: user_dashboard.php");
                break;
            case 'vendor':
                header("Location: vendor_dashboard.php");
                break;
            case 'admin':
                header("Location: admin_dashboard.php");
                break;
            default:
                // Handle other user roles or unexpected cases
                break;
        }
        exit();
    } else {
        $errorMessage = "Login failed: " . $loginResult;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($errorMessage)) : ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
