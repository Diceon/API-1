<?php
// Allowing Cross Origin Requests
header("Access-Control-Allow-Origin: *");

require_once './inc/connection.php';

$db = new connection('localhost', 'API-1', 'API-1', 'API-1');
print_r($_GET);
if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "GET") {
    echo json_encode($db->query("SELECT * FROM chat"));

    if ($_GET["url"] == "auth") {
        echo "Authorization request";
    } else if ($_GET["url"] == "bla") {
        echo "blabla";
    }

    http_response_code(200);
} else if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
    echo $_SERVER["REQUEST_METHOD"];
    
    if ($_GET["url"] == "auth") {
        $postBody = file_get_contents("php://input");
        echo $postBody . "test";
    }
} else {
    http_response_code(405);
}
?>