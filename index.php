<?php
require_once './inc/connection.php';

$db = new connection('localhost', 'API-1', 'root', '');

if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "GET") {
    //echo "GET";
    echo json_encode($db->query("SELECT * FROM chat"));
    http_response_code(200);
} else if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
    echo "POST";
} else {
    http_response_code(405);
}
?>