<?php
require 'db_connector.php';

try {
    $stmt = $pdo->query("SELECT wait_time_hours, wait_time_minutes, message, consult_fee, festive_theme FROM `clinic 2` WHERE id = 1");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode([
            "hours" => $result['wait_time_hours'],
            "minutes" => $result['wait_time_minutes'],
            "message" => $result['message'],
            "consult_fee" => $result['consult_fee'],
            "festive_theme" => $result['festive_theme'], // Added festive_theme
        ]);
    } else {
        echo json_encode([
            "hours" => 0,
            "minutes" => 0,
            "message" => "No wait time data available.",
            "consult_fee" => 0, // Default value if no data is available
            "festive_theme" => "none", // Default festive_theme if no data
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "hours" => 0,
        "minutes" => 0,
        "message" => "Error fetching wait time.",
        "consult_fee" => 0, // Default value in case of error
        "festive_theme" => "none", // Default festive_theme in case of error
    ]);
}
?>
