<?php


$host = "localhost"; /* Host name */
$user = "postgres"; /* User */
$password = "postgres"; /* Password */
$dbname = "data"; /* Database name */

$con = pg_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: ");
}