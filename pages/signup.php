<?php
include '../includes/db.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $userType = $_POST['userType'];

    if ($password !== $confirmPassword) {
        $errorMessage = "Passwords do not match.";
    } else {
        $result = createUser($username, $password, $userType);

        if ($result === true) {
            $confirmationMessage = "Signup successful! You can now log in.";
        } else {
            $errorMessage = $result;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <?php if (isset($errorMessage)) : ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>
        <?php if (isset($confirmationMessage)) : ?>
            <p style="color: green;"><?php echo $confirmationMessage; ?></p>
        <?php else : ?>
            <form action="" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>

                <label for="userType">User Type:</label>
                <select id="userType" name="userType">
                    <option value="user">User</option>
                    <option value="vendor">Vendor</option>
                </select>

                <button type="submit">Sign Up</button>
            </form>
        <?php endif; ?>
        <p>Already have an account? <a href="login.php">Log in here</a>.</p>
    </div>
</body>
</html>
