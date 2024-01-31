<?php
    session_start();
    require_once('../db.php');

    // Check if the user is not logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../signin.php");
        exit();
    }

    $complainant = $_SESSION['user_id'];

    // Retrieve user details from the database
    try {
        $db = new Database();
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$complainant]);
        $user = $stmt->fetch();

        // Close the database connection
        $conn = null;

        if (!$user) {
            // Redirect to login page if user not found
            header("Location: ../signin.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact info</title>
    <link rel="stylesheet" type="text/css" href="../designs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <!-- logout -->
    <div class="logout-container">
        <a href="../access/logout.php" class="btn"> Log-out </a>
    </div>
    <div class="navbar">
        <section class="navbar">
            <a href="index.php" class="btn"> Home </a>
            <a href="profile.php" class="btn"> Profile </a>
            <a href="gallery.php" class="btn"> Gallery </a>
            <a href="contactUs.php" class="btn" id="active"> Contact Us </a>
        </section>
    </div>

    <div class="contact-container">
        <h2>Contact Us</h2>
        <!-- Complaint Form -->
        <form action="../submit_complaint.php" method="post">
            <label for="complaintSubject">Subject:</label>
            <input type="text" id="complaintSubject" name="complaintSubject" required>

            <label for="complaintDescription">Description:</label>
            <textarea id="complaintDescription" name="complaintDescription" rows="8" cols="45" required></textarea>

            <button type="submit">Submit Complaint</button>
        </form>
    </div>
</body>
<script src="../footer.js"></script>
</html>