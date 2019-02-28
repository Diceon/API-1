<?php

if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "GET") {
    echo "GET";
} else if (filter_input(INPUT_SERVER, "REQUEST_METHOD") == "POST") {
    echo "POST";
} else {
    http_response_code(405);
}
?>