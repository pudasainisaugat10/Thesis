<?php
// Create a PDO (PHP Data Objects) instance to connect to the 'healthone' database with the 'root' user and no password on the local host.

   $pdo = new PDO('mysql:dbname=healthone;host=127.0.0.1', 'root', '');

?>