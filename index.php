<?php
require("config.php");
require("repoLib.php");

$xesoft = new XeSoft;

$mysql = $xesoft->connectDB(MYSQL_SERVER, MYSQL_USER, MYSQL_PASS, MYSQL_DB);

$xesoft->setHeaderType(1);
$xesoft->genIndex(XESOFT_SERVER_ADDRESS, XESOFT_REPO_NAME, XESOFT_PACKAGES_PATH, XESOFT_REPO_VERSION);