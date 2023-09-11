<?php
// Ensure that PHP returns JSON responses
date_default_timezone_set('UTC');
header('Content-Type: application/json');

// Function to validate UTC time within +/-2
// Check if 'slack_name' and 'utc_time' parameters are present in the query string
if (isset($_GET['slack_name']) && isset($_GET['track'])) {
    $slackName = $_GET['slack_name'];
    $track = $_GET['track'];
    // Get the GitHub URLs (replace with your actual URLs)
    $githubFileURL = 'https://github.com/nduej/hngx/tree/main/Api';
    $githubSourceURL = 'https://github.com/nduej/hngx.git';
    // Set the timezone to UTC
    $utcDateTime = gmdate('Y-m-d\TH:i:s\Z');
    $currentDay = date('l');
    $response = [
        'slack_name' => $slackName,
        'day_of_week' => $currentDay,
        'utc_time' => $utcDateTime,
        'track' => $track,
        'github_file_url' => $githubFileURL,
        'github_source_url' => $githubSourceURL,
        'status_code' => 200,
    ];

    echo json_encode($response);
} else {

    echo json_encode(['error' => 'Missing required parameters']);
    http_response_code(400);
}
