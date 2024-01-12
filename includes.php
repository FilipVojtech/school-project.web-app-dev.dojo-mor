<?php
error_reporting(E_ALL);
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define('ROOTNAME', '/' . basename(ROOT));
set_include_path(ROOT);
include ROOT . "/database/Database.php";

//echo ROOT;
//echo '<br>';
//echo ROOTNAME;
