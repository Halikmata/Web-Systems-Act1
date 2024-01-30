<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact info</title>
    <link rel="stylesheet" type="text/css" href="designs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            color: #333;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .navbar {
            background-color: rgb(85, 79, 79, 0.5);
            overflow: hidden;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 100;
            border-radius: 15px;
        }

        .navbar a {
            margin: 5px;
            float: none;
            display: inline-block;
            color: white;
            text-align: center;
            padding: 20px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            border-radius: 10px;
            background-color: whitesmoke;
            color: black;
            transition: 0.2s;
        }

        .navbar #active {
            border-radius: 10px;
            background-color: whitesmoke;
            color: black;
        }

        .contact-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: white;
            max-width: 500px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .contact-container form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .contact-container label {
            margin-top: 10px;
            font-weight: bold;
            text-align: left;
        }

        .contact-container input,
        .contact-container textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .contact-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .contact-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- logout -->
    <div class="logout-container">
        <a href="access/logout.php" class="btn"> Log-out </a>
    </div>
    <div class="navbar">
        <section class="navbar">
            <a href="home.php" class="btn"> Home </a>
            <a href="profile.php" class="btn"> Profile </a>
            <a href="gallery.php" class="btn"> Gallery </a>
            <a href="contactUs.php" class="btn" id="active"> Contact Us </a>
        </section>
    </div>

    <div class="contact-container">
        <h2>Contact Us</h2>
        <!-- Complaint Form -->
        <form action="submit_complaint.php" method="post">
            <label for="complaintSubject">Subject:</label>
            <input type="text" id="complaintSubject" name="complaintSubject" required>

            <label for="complaintDescription">Description:</label>
            <textarea id="complaintDescription" name="complaintDescription" rows="8" cols="45" required></textarea>

            <button type="submit">Submit Complaint</button>
        </form>
    </div>
</body>
<script src="footer.js"></script>
</html>