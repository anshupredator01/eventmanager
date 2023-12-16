<?php
// Assuming vendor is already authenticated and vendor name is available
$vendorname = "example_vendor";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Vendor Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $vendorname; ?>!</h2>
        <h3>Vendor Dashboard</h3>

        <div>
            <h4>Catering</h4>
            <!-- TODO: Display catering services here -->
            <p>Catering services content goes here.</p>
        </div>

        <div>
            <h4>Florist</h4>
            <!-- TODO: Display florist services here -->
            <p>Florist services content goes here.</p>
        </div>

        <div>
            <h4>Decoration</h4>
            <!-- TODO: Display decoration services here -->
            <p>Decoration services content goes here.</p>
        </div>

        <div>
            <h4>Lighting</h4>
            <!-- TODO: Display lighting services here -->
            <p>Lighting services content goes here.</p>
        </div>

        <button onclick="logout()">Logout</button>
    </div>

    <script src="../assets/js/script.js"></script>
    <script>
        function logout() {
            // TODO: Implement logout functionality (e.g., redirect to logout page)
            alert('Logout functionality to be implemented.');
        }
    </script>
</body>
</html>
