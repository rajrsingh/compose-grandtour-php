<?php
// Rename this file config.php and insert the proper value for connection string
// from the Overview page of your Compose dashboard - or otherwise set the
// values in $db (host, user, pass, port, dbname)

$connection_string = 'postgres://username:password@servername.com:port/compose';
// $dbname = 'compose'; // optional, supply this if the name isn't in the URL

// --- You probably don't need to edit below here ---

$db = parse_url($connection_string);

// try to get the dbname from the URL, but extra variable takes precedence
$db['dbname'] = substr($db['path'],1);
unset($db['path']); // not needed
if(isset($dbname) && $dbname) {
    $db['dbname'] = $dbname;
}

