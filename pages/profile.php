<?php
session_start();
require_once('../db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Store the current page in a cookie
    setcookie('redirect_page', $_SERVER['REQUEST_URI'], time() + 3600, '/');
    
    // Redirect to the sign-in page
    header('Location: ../signin.php');
    exit();
}

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
        header("Location: ../login.php");
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
    <title>Profile</title>
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
            <a href="../index.php" class="btn"> Home </a>
            <a href="profile.php" class="btn" id="active"> Profile </a>
            <a href="gallery.php" class="btn"> Gallery </a>
            <a href="contactUs.php" class="btn"> Contact Us </a>
        </section>
    </div>
    <section class="container">
        <div class="photo-grid">
            <?php if ($user['profile_picture']) : ?>
                <img src="../images/profile_pics/<?php echo $user['profile_picture']; ?>" alt="Profile Picture">
            <?php else : ?>
                <!-- Provide a default image if the user doesn't have a profile picture -->
                <img src="../images/profile_pics/FRAME.jpg" alt="Default Profile Picture">
            <?php endif; ?>

            <div class="profile-info">
                <h1><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></h1>
                <p>Email: <?php echo $user['email']; ?></p>
                <p>Mobile Number: <?php echo $user['mobile_number']; ?></p>
                <p>Age: <?php echo $user['age']; ?></p>
                <p>Gender: <?php echo $user['gender']; ?></p>
                <p>Hobbies: <?php echo $user['hobbies']; ?></p>
            </div>
        </div>
    </section>
</body>
<script src="../scripts/footer.js"></script>
</html>