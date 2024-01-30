<?php
require_once('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $conn = $db->getConnection();

    // Initialize the response message
    $responseMessage = '';

    // Retrieve values from the form
    $profilePicture = $_FILES["profilePicture"]["name"];
    $email = $_POST["signupEmail"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $hobbies = $_POST["hobbies"];
    $password = $_POST["signupPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Add your validation logic here

    // Check if the email is already registered
    $checkEmailQuery = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $checkEmailQuery->execute([$email]);

    if ($checkEmailQuery->rowCount() > 0) {
        $responseMessage = "Email is already registered.";
    } else {
        // Add the user to the database if validation passes
        // Use prepared statements to prevent SQL injection

        // Example using PDO
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (profile_picture, email, first_name, last_name, age, gender, hobbies, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$profilePicture, $email, $firstName, $lastName, $age, $gender, $hobbies, $hashedPassword]);

            $responseMessage = "User registered successfully!";
        } catch (PDOException $e) {
            $responseMessage = "Error: " . $e->getMessage();
        }
    }

    $conn = null;

    // Pass the response message to JavaScript for displaying a pop-up
    echo "<script>
            alert('" . $responseMessage . "');
            window.location.href = '../index.php';
          </script>";
}
?>