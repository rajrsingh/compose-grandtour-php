<?php
require('vendor/autoload.php'); // brings the predis dependency
require('config.php'); // this sets $connection_string

$redis = new Predis\Client($connection_string);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header('Content-type: application/json');
    $list = $redis->keys("word:*");
    if (count($list) == 0) {
        return json_encode([]);
    }
    $words = [];
    foreach ($list as $item) {
        $row = $redis->hscan($item, 0);
        $words[] = $row[1];
    }

    echo json_encode($words);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents("php://input"), $put_vars);
    if (isset($put_vars['word'])) {
        $w = $put_vars['word'];
        $d = $put_vars['definition'];

        $redis->hmset('word:' . $w, ['word' => $w, 'definition' => $d]); 

        echo 'added word ',$w,' and definition ',$d,' to database';
    }
}
