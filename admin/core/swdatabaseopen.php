<?php
require_once("general/MysqliDb.php");
error_reporting(E_ALL);
$db = new Mysqlidb ($config["db_hostname"], $config["db_username"], $config["db_password"], $config["db_database"]);

?>