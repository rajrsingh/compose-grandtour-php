<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start(); 
}

$words = [];
if(isset($_SESSION['items'])) {
    $words = $_SESSION['items'];
} else {
    $_SESSION['items'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Content-type: application/json');
    echo json_encode($words);
} else if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    if (isset($put_vars['word'])) {
        $item = array(
            "_id" => (date(DateTime::RFC2822)),
            "word" => $put_vars['word'], 
            "definition" => $put_vars['definition']
        );
        array_push($_SESSION['items'], $item);
    }
}

