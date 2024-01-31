<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="../designs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .logout-container {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        <?php
            session_start();
            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                echo '.logout-container {
                    background-color: red;
                }';

                echo '.logout-container:hover {
                    background-color: darkred;
                }';
            } else {
                echo '.logout-container {
                    background-color: green;
                }';

                echo '.logout-container:hover {
                    background-color: darkgreen;
                }';
            }
        ?>
    </style>
</head>

<body>
    <!-- logout -->
    <div class="logout-container">
        <?php
            // Check if the user is logged in
            if (isset($_SESSION['user_id'])) {
                echo '<a href="../access/logout.php" class="login-btn active"> Log-out </a>';
                $welcomeMessage = isset($_SESSION['first_name']) ? 'Welcome, ' . $_SESSION['first_name'] : 'Welcome, User';
            } else {
                echo '<a href="../signin.php" class="login-btn"> Sign-in </a>';
                $welcomeMessage = 'Welcome, Guest';
            }
        ?>
    </div>

    <header>
        <div class="navbar">
            <section class="navbar">
                <a href="index.php" class="btn" id="active"> Home </a>
                <a href="profile.php" class="btn"> Profile </a>
                <a href="gallery.php" class="btn"> Gallery </a>
                <a href="contactUs.php" class="btn"> Contact Us </a>
            </section>
        </div>
    </header>
    <br><br><br><br><br><br><br><br><br>
    <div>
        <h1><?php echo $welcomeMessage; ?></h1>
        <h1>There is no hate quite like Christian love</h1>
        <p>Mori memorias non somnia</p>
    </div>
</body>
<script src="../footer.js"></script>
</html>