<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Signup</title>
    <link rel="stylesheet" type="text/css" href="designs.css">
    <style>
        /* Add the following style for the semi-transparent button */
        #signupSubmitButton[disabled] {
            opacity: 0.5;
        }
    </style>
</head>

<body>
    <div class="login-signup-form">
        <form id="loginForm" action="access/login.php" method="post">
            <h2>Login</h2>
            <label for="loginEmail">Email:</label>
            <input type="email" id="loginEmail" name="loginEmail" required>

            <label for="loginPassword">Password:</label>
            <input type="password" id="loginPassword" name="loginPassword" required>

            <button type="submit">Login</button>
            <p>Don't have an account? <a href="#" onclick="toggleForm('signupForm')">Sign up here</a></p>
        </form>

        <form id="signupForm" action="access/signup.php" method="post" enctype="multipart/form-data" style="display:none;">
            <h2>Sign Up</h2>
            <label for="profilePicture">Profile Picture:</label>
            <input type="file" id="profilePicture" name="profilePicture" accept="image/*" required>

            <label for="signupEmail">Email:</label>
            <input type="email" id="signupEmail" name="signupEmail" required>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="hobbies">Hobbies:</label>
            <input type="text" id="hobbies" name="hobbies" required>

            <label for="signupPassword">Password:</label>
            <input type="password" id="signupPassword" name="signupPassword" required>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>

            <button type="submit" id="signupSubmitButton" disabled>Sign Up</button>
            <p>Already have an account? <a href="#" onclick="toggleForm('loginForm')">Login here</a></p>
        </form>
    </div>

    <script src="forms.js"></script>
    
    <script>
        var signupSubmitButton = document.getElementById("signupSubmitButton");

        function updateButtonOpacity() {
            var password = document.getElementById("signupPassword").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            // Check if passwords match
            if (password === confirmPassword) {
                signupSubmitButton.removeAttribute("disabled");
                signupSubmitButton.style.opacity = 1;
            } else {
                signupSubmitButton.setAttribute("disabled", "true");
                signupSubmitButton.style.opacity = 0.5;
            }
        }

        document.getElementById("signupPassword").addEventListener("input", updateButtonOpacity);
        document.getElementById("confirmPassword").addEventListener("input", updateButtonOpacity);
    </script>
</body>
</html>