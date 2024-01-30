<?php
require_once('../db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $conn = $db->getConnection();

    // Retrieve values from the form
    $email = $_POST["loginEmail"];
    $password = $_POST["loginPassword"];

    // Add your validation logic here

    // Check if the user exists in the database and the password is correct
    // Use prepared statements to prevent SQL injection

    // Example using PDO
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            header("Location: ../home.php");
        } else {
            echo "Invalid email or password";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>