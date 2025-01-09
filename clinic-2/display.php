<?php
// Load the main config file
require_once '../config.php';

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

    if ($_SERVER['PHP_AUTH_USER'] === $username && $_SERVER['PHP_AUTH_PW'] === $password) {?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Current Wait Time</title>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <link rel="stylesheet" href="../assets/css/display.css">
            <script>
                // Function to fetch and update wait time & festive message
                function fetchWaitTime() {
                    $.ajax({
                        url: "fetch_wait_time.php",
                        method: "GET",
                        success: function(data) {
                            const result = JSON.parse(data);
                            $("#wait-time").text(`${result.hours} hours, ${result.minutes} minutes`);
                            $("#consult-fee").text(`OOH Consult Fee: £${result.consult_fee}*`);
                            $("#message").text(result.message);

                            // Festive theme logic
                            const festiveTheme = result.festive_theme;
                            let festiveMessage = "";

                            // Check the festive theme and set the appropriate message
                            switch (festiveTheme) {
                                case 'christmas':
                                    festiveMessage = "Merry Christmas from us!";
                                    break;
                                case 'new_year':
                                    festiveMessage = "Happy New Year from us!";
                                    break;
                                case 'easter':
                                    festiveMessage = "Happy Easter from us!";
                                    break;
                                default:
                                    festiveMessage = "Enjoy the festive season with us!";
                                    break;
                            }

                            // Update the festive message and show or hide it
                            if (festiveTheme && festiveTheme !== "none") {
                                $("#festive-theme").attr('class', `promo festive ${festiveTheme}`);
                                $("#festive-message").text(festiveMessage).show();
                            } else {
                                $("#festive-theme").attr('class', 'promo');
                                $("#festive-message").hide();
                            }
                        }
                    });
                }

                $(document).ready(function() {
                    fetchWaitTime();
                    setInterval(fetchWaitTime, 5000); // Fetch every 5 seconds
                });
            </script>
        </head>

        <body>

            <!-- Header Section -->
           <?php include_once '../assets/includes/display.header.php'; ?>

            <!-- Main Content Wrapper (Wait Time and Consult Fee) -->
            <div class="main-wrapper">
                <!-- Main Content for Current Wait Time and Consult Fee -->
                <div class="main-content">
                    <h1>Current Estimated Wait Time</h1>
                    <div class="wait-time" id="wait-time">Loading...</div>
                    <div class="consult-fee" id="consult-fee">Loading...</div>
                    <div class="message" id="message">Loading...</div>

                    <div class="festive" id="festive-message" style="display: none;"></div>
                    <div></div>
                    <Br><BR><BR><BR>
                    <Br><BR><BR><BR>
                    <Br><BR><BR><BR>
                    <div class="info">
                        <small>*Estimated fees may vary depending on your pet's condition and treatment required</small>
                        <p><?= htmlspecialchars($clinicConfig['name']) ?> Is an emergency out-of-hours veterinary practice. We operate similar to Accident and Emergency (A&E), Which means we Triarge and Prioritise most urgent cases. We have displayed the current esitmated wait time above for you to plan your visit.</p>
                        <p>For more information, please visit our website: <a href="<?= htmlspecialchars($parentCompany['website']) ?>/ecc-wait-time">www.<?= htmlspecialchars($parentCompany['website']) ?>/ecc-wait-time</a></p>
                    </div>
                </div>

                <!-- Promo Material Section -->
                <div class="promo" id="festive-theme">
                    <img src="<?= htmlspecialchars($promotionalMaterial['path']) ?>" alt="<?= htmlspecialchars($promotionalMaterial['alt']) ?>">
                </div>
            </div>
            <!-- Footer Section -->
           <?php 
           include_once '../assets/includes/display.footer.php';
           ?>
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