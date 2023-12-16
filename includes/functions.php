<?php
include 'db.php';

function createUser($username, $password, $userType) {
    global $conn;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (Username, PasswordHash, UserRole) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $hashedPassword, $userType);

    if ($stmt->execute()) {
        $stmt->close();
        return true; // Signup successful
    } else {
        return "Error creating user: " . $stmt->error;
    }
}

// functions.php

function loginUser($username, $password, $userType) {
    global $conn;

    // Perform additional validation if needed

    // Retrieve user data from the database
    $sql = "SELECT UserID, PasswordHash, UserRole FROM Users WHERE Username = ? AND UserRole = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $userType);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();

        if (password_verify($password, $userData['PasswordHash'])) {
            return true; // Return true on successful login
        } else {
            return "Incorrect password";
        }
    } else {
        return "User not found";
    }
}


function getLatestVendors() {
    global $conn;

    $sql = "SELECT * FROM Vendors ORDER BY VendorID DESC LIMIT 5";
    $result = $conn->query($sql);

    return $result->fetch_all(MYSQLI_ASSOC);
}

// Additional functions for managing memberships, vendors, items, transactions, etc.
// ...
?>
