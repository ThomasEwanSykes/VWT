<?php
// Load the main config file
require_once '../config.php';
require 'db_connector.php';

// Get the clinic folder name from the URL, e.g., /clinic-1/display.php
$clinicFolder = basename(dirname(__FILE__));

// Path to the clinic's configuration file
$clinicConfigPath = __DIR__ . "/config.php";

// Check if the clinic's config file exists
if (!file_exists($clinicConfigPath)) {
    die("Configuration for this clinic is missing.");
}

// Load the clinic's configuration file
$clinicConfig = include $clinicConfigPath;

// Validate the clinic data
if (!isset($clinicConfig['name']) || !isset($clinicConfig['address'])) {
    die("Invalid clinic configuration.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hours = isset($_POST['hours']) ? (int)$_POST['hours'] : 0;
    $minutes = isset($_POST['minutes']) ? (int)$_POST['minutes'] : 0;
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    $festive_theme = isset($_POST['festive_theme']) ? trim($_POST['festive_theme']) : 'none';
    $consult_fee = isset($_POST['consult_fee']) ? (float)$_POST['consult_fee'] : 0;

    try {
        $stmt = $pdo->prepare("
            UPDATE `clinic 2` 
            SET wait_time_hours = :hours,
                wait_time_minutes = :minutes,
                message = :message,
                festive_theme = :festive_theme,
                consult_fee = :consult_fee
            WHERE id = 1
        ");
        $stmt->execute([
            ':hours' => $hours,
            ':minutes' => $minutes,
            ':message' => $message,
            ':festive_theme' => $festive_theme,
            ':consult_fee' => $consult_fee,
        ]);

        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
}
$config = require 'config.php';
$username = $config['username'];
$password = $config['password'];
$realm = $config['realm'];

if (isset($_GET['logout'])) {
    // Send an invalid header to force re-authentication
    header('WWW-Authenticate: Basic realm="Secure Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'You have been logged out.';
    exit;
}

// Check if the user has sent an Authorization header
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Send the header to trigger the browser login popup
    header('WWW-Authenticate: Basic realm="Secure Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'You must provide valid credentials to access this page.';
    exit;
} else {
    // Validate the username and password
    $username = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];

    if ($_SERVER['PHP_AUTH_USER'] === $username && $_SERVER['PHP_AUTH_PW'] === $password) { ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Control Panel</title>
            <link rel="stylesheet" href="../assets/css/control.css">
        </head>

        <body>

            <!-- Header & Sidebar Section -->
            <?php require_once '../assets/includes/control.header.php'; ?>

            <div class="main-content">
                <!-- Main Form for Wait Time and Message -->
                <form method="POST">
                    <h2>Update Wait Time</h2>

                    <label for="hours">Hours:</label>
                    <input type="number" id="hours" name="hours" min="0" value="0" required>
                    <br>

                    <label for="minutes">Minutes:</label>
                    <input type="number" id="minutes" name="minutes" min="0" max="59" value="0" required>
                    <br>

                    <label for="message">Message:</label>
                    <input type="text" id="message" name="message" value="A Vet nurse will be with you shortly to triage." required>
                    <br>

                    <label for="consult-fee">Consult Fee (£):</label>
                    <input type="number" step="0.01" name="consult_fee" id="consult-fee" value="<?= $row['consult_fee'] ?? 336.00 ?>" required>
                    <br>

                    <input type="submit" value="Update Wait Time">
                </form>

                <!-- Separate Festive Theme Form -->
                <form method="POST">
                    <h2>Festive Theme Settings</h2>

                    <label for="festive_theme">Festive Theme:</label>
                    <select id="festive_theme" name="festive_theme">
                        <option value="none">None</option>
                        <option value="christmas">Christmas</option>
                        <option value="new_year">New Year</option>
                        <option value="easter">Easter</option>
                        <!-- Add more festive options here -->
                    </select>

                    <input type="submit" value="Update Festive Theme">
                </form>

                <!-- Iframe to preview the display.php -->
                <div class="iframe-container">
                    <h2>Preview of Display</h2>
                    <iframe height="100%" width="100%" src="display.php"></iframe>
                </div>
            </div>
        </body>
        </html>
<?php     } else {
        // If the credentials are invalid, ask for them again
        header('WWW-Authenticate: Basic realm="Secure Area"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Invalid credentials. Please try again.';
        exit;
    }
}
?>