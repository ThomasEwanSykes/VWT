<?php
// If you need to process any specific POST data or database changes, 
// you can handle that here, but for now, we are focusing on just displaying contact info.
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Support Page</title>
    <style>
        /* Dark mode styling */
        body {
            background-color: #131313;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        footer {
            background-color: #1a1a1a;
            color: #fff;
            text-align: center;
            position: fixed;
            width: 250px;
            bottom: 0;
        }

        /* Sidebar styling */
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #222;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .sidebar a {
            padding: 10px;
            text-decoration: none;
            font-size: 18px;
            color: #fff;
            display: block;
            margin: 10px 0;
            background-color: #333;
            border-radius: 5px;
            text-align: center;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .main-content {
            margin-left: 270px;
            padding: 20px;
        }

        /* Contact information styling */
        .contact-info {
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .contact-info h2 {
            margin-top: 0;
        }

        .contact-info ul {
            list-style-type: none;
            padding-left: 0;
        }

        .contact-info li {
            margin-bottom: 10px;
        }

        .contact-info li a {
            color: #4CAF50;
            text-decoration: none;
        }

        .contact-info li a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <header>
        <h1>IT Support Page</h1>
    </header>

    <div class="sidebar">
        <img src="logo.png" alt="Logo">
        <!-- You can add sidebar links here if needed -->
        <footer>
            <p>&copy; 2025 Pythona Studios Limited | All Rights Reserved Built by Pythona Studios</p>
        </footer>
    </div>

    <div class="main-content">
        <!-- This can change for your internal IT Department Support - This is to get help from Pythona Studios to set this up. -->
        <div class="contact-info">
            <h2>For help with this </h2>
            <ul>
                <li><strong>Email Support:</strong> <a href="mailto:support@pythonastudios.com">support@pythonastudios.com</a></li>
                <li><strong>Office Hours:</strong> Monday to Friday, 9:00 AM - 5:00 PM GMT/UK Time*</li><small>*Please note Support may be able to help outside this time, but we cannot guarantee this</small>
            </ul>
        </div>
    </div>

</body>

</html>
