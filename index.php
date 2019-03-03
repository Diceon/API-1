<?php
// Allowing Cross Origin Requests
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

// Including connection
require_once './inc/connection.php';

// Establishing connection to database
$db = new connection('localhost', 'API-1', 'API-1', 'API-1');

// Checking request method
if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "GET") {

    // Log the request
    logRequest($_SERVER["REQUEST_METHOD"], $_GET, $_POST);

    // Echoing all messages
    echo json_encode($db->query("SELECT * FROM chat"));

    if ($_GET["url"] == "auth") {
        echo "Authorization request";
    }

    // Responding with OK message
    http_response_code(200);
} else if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {

    // Log the request
    logRequest($_SERVER["REQUEST_METHOD"], $_GET, $_POST);
    
    if (filter_has_var(INPUT_POST, "id") && filter_has_var(INPUT_POST, "message") && filter_has_var(INPUT_POST, "time")) {
        // TODO
        // Store message to Database
    }
    
    
    
    if ($_GET["url"] == "auth") {
        $postBody = file_get_contents("php://input");
        echo "POST AUTH" . $postBody;
    }

    // Responding with OK message
    http_response_code(200);
} else {
    http_response_code(405);
}

function logRequest($method, $get, $post) {
    $fname = date('h-ia_Y-m-d') . ".txt";
    file_put_contents($fname, "METHOD: " . $method . "\r\n", FILE_APPEND);
    file_put_contents($fname, "GET: " . json_encode($get) . "\r\n", FILE_APPEND);
    file_put_contents($fname, "POST: " . json_encode($post) . "\r\n", FILE_APPEND);
}


?>