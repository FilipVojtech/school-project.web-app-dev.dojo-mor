<?php
if (!isset($_GET['id'])) {
    header('Location: ../');
    die();
}
include_once '../database/Database.php';

$db = new Database();
$file = $db->getTechnologyPdf($_GET['id']);
$contents = base64_decode($file['instructions']);

header("Content-type: application/pdf");
header("Content-Disposition: attachment; filename=$file[name]_Instructions.pdf");
echo $contents;
