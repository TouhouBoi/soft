<?php
require("config.php");
require("repoLib.php");

$xesoft = new XeSoft;

$xesoft->setHeaderType(1);
$xesoft->genIndex(XESOFT_SERVER_ADDRESS, XESOFT_REPO_NAME, XESOFT_PACKAGES_PATH, XESOFT_XENONOS_VERSION);