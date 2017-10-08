<?php

if (session_status()==1) {
  session_start(); 
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  header('Content-type: application/json');
  if (!isset($_SESSION['items'])) {
    echo '{"items":[]}';
  } else {
    echo '{"items":',json_encode($_SESSION['items']),'}';
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
  if (!isset($_SESSION['items'])) $_SESSION['items'] = array();
  
  parse_str(file_get_contents("php://input"), $put_vars);
  if (isset($put_vars['word'])) {
    $word = $put_vars['word'];
    $defin = $put_vars['definition'];
    $item = array(
      "word" => $word, 
      "definition" => $defin
    );
    array_push($_SESSION['items'], $item);
    header('Content-type: text/plain');
    echo 'added word ',$_SESSION['items'][0]['word'],' and definition ',$_SESSION['items'][0]['definition'],' to session';
  }
}
?>