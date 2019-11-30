<?php
require("config.php");
require("repoLib.php");

$xesoft = new XeSoft;

$mysql = $xesoft->connectDB(MYSQL_SERVER, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

$xesoft->setHeaderType(1);
$xesoft->genPackages(XESOFT_SERVER_ADDRESS, "", $mysql);