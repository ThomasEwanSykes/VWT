<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Wait Time</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/clinic-select.css">
    <script>
        function navigateToClinic(url) {
            if (url) {
                window.location.href = url;
            }
        }
    </script>
</head>

<body>
    <!-- Header Section -->
    <?php require_once 'assets/includes/header.php'; ?>
    <!-- Main Content Wrapper (Wait Time and Consult Fee) -->
    <div class="main-wrapper">
        <!-- Main Content for Current Wait Time and Consult Fee -->
        <div class="main-content">
            <h1>Please select your clinic below to be displayed in the waiting room.</h1>
            <label for="clinic">Select a Clinic:</label>
            <select id="clinic" onchange="navigateToClinic(this.value)">
                <option value="" disabled selected>Select a clinic</option>
                <?php foreach ($clinics as $clinic => $url): ?>
                    <option value="<?= htmlspecialchars($url) ?>/display">
                        <?= htmlspecialchars($clinic) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Promo Material Section -->
        <div class="promo" id="festive-theme">
            <img src="<?= htmlspecialchars($promotionalMaterial['path']) ?>" alt="<?= htmlspecialchars($promotionalMaterial['alt']) ?>">
        </div>
    </div>
    <!-- Footer Section -->
    <?php 
   require_once 'assets/includes/footer.php';
   ?>
</body>

</html>