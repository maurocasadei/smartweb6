<?php
require_once($config["internalurlfront"]."MysqliDb.php");
$db = new Mysqlidb ($config["db_hostname"], $config["db_username"], $config["db_password"], $config["db_database"]);

?>
