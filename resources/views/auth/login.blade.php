<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        form {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        text-align: center;
        color: #333;
    }
    .input-group {
        margin-bottom: 20px;
    }
    .input-group label {
        display: block;
        color: #666;
        margin-bottom: 5px;
    }
    .input-group input[type="email"],
    .input-group input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box; /* Added for better input sizing */
    }
    .input-group input[type="checkbox"] {
        margin-right: 5px;
    }
    .input-group button {
        width: 100%;
        padding: 10px;
        border: none;
        background-color: #5E5CE6;
        color: white;
        border-radius: 4px;
        cursor: pointer;
    }
    .input-group button:hover {
        background-color: #7e7be8;
    }
    .input-group a {
        display: block;
        text-align: center;
        background: #4285F4;
        color: white;
        text-decoration: none;
        padding: 10px;
        border-radius: 4px;
        margin-top: 10px;
    }
    .input-group .google-icon {
        vertical-align: middle;
        margin-right: 8px;
    }
        .login-container {
            display: flex;
            height: 100vh;
        }
        .login-image {
            flex: 1;
            background-image: url('/images/older.png'); /* Make sure this is the correct path */
            background-size: cover;
            background-position: center; /* Optional: Centers the image within the div */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            padding: 20px;
        }


        
        .login-form-container {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #2a235a; /* Even darker purple background color for the right section */
}
        .login-form {
            width: 300px;
        }
        .login-image h1 {
    font-size: 3em; /* Adjust the font size as needed */
    margin-top: 20px;
    animation: moveUp 2s ease infinite; /* Add a simple animation */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Adjust the shadow values as needed */
}

        @keyframes moveUp {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        .google-icon {
            margin-right: 10px;
        }
    .google-signup-btn {
        background-color: #000000; /* Black background */
        color: white;
        padding: 12px 24px; /* Slightly larger padding for a taller button */
        border: none;
        border-radius: 100px; /* Very large border radius for pill shape */
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none; /* No underline for the link */
        box-shadow: 0 4px 6px rgba(0,0,0,0.2); /* Subtle shadow for depth */
        cursor: pointer;
        overflow: hidden; /* Ensures no overflow if the image is too large */
    }
    .google-signup-btn img {
        margin-right: 10px;
        height: 20px; /* Maintain the aspect ratio of the Google logo */
    }

        /* Add further styling for inputs, labels, and buttons */
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Left Section - Image -->
        <div class="login-image">
            <img src="/images/logo.png" alt="Logo" style="width: 300px; height: 300px;">
            <h1>ElderWisdom</h1>
        </div>

        <!-- Right Section - Login Form -->
        <div class="login-form-container">
            <div class="login-form">
                <!-- Your Application Logo -->
                <div class="logo-container">
                    <!-- Logo goes here -->
                </div>
                <!-- Login Form -->
                <form method="POST" action="your_login_processing_script">
                <h2>Login Form</h2>
                    <!-- Email Address -->
                    <div class="input-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autofocus>
        </div>

                    <!-- Password -->
                    <div class="input-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>

                    <!-- Remember Me -->
                    <div class="input-group">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">Remember me</label>
        </div>

                    <!-- Login Button -->
                    <div class="input-group">
            <button type="submit">Log in</button>
            <div style="display: flex; align-items: center; text-align: center;">
  <div style="flex-grow: 1; height: 1px; background: #d3d3d3;"></div>
  <div style="margin: 0 20px; color: #757575;">OR</div>
  <div style="flex-grow: 1; height: 1px; background: #d3d3d3;"></div>
</div>
            <div class="input-group">
            <a href="{{ route('login.google') }}" style="text-align: center; display: block; background-color: black; color: white; padding: 10px; border-radius: 4px; text-decoration: none; box-sizing: border-box; width: 100%;">
    <img src="/images/google.png" alt="Google" style="vertical-align: middle; margin-right: 8px; width: auto; height: 20px;">Continue with Google
</a>



</div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>
