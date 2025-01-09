<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Wait Time</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <!-- Header Section -->
    <?php require_once 'assets/includes/header.php'; ?>
    <!-- Main Content Wrapper (Wait Time and Consult Fee) -->
    <div class="main-wrapper">
        <!-- Main Content for Current Wait Time and Consult Fee -->
        <div class="main-content">
            <h1>Please select whether this device is to control or Display.</h1>
            <a class="display-control-button" href="clinic-select">Control</a>
            <a class="display-control-button" href="clinic-select-display">Display</a>
        </div>
    </div>
    <!-- Footer Section -->
    <?php require_once 'assets/includes/footer.php'; ?>
</body>

</html>