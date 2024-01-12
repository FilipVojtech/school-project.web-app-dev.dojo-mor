<?php
include_once "../includes.php";

if (isset($_POST['type']) && $_POST['type'] == 'images') {
    upload_tech_images();
} else {
    upload_tech_logo_pdf();
}

header('Location: ' . ROOTNAME . "/technology/?id=$_POST[id]");

function upload_tech_logo_pdf(): void
{
    if (!isset($_POST['id'])) {
        header('Location: ./');
        die;
    }
    if (!isset($_FILES['file'])) {
        header('Location: ./');
        die;
    }

    $fileDetails = $_FILES['file'];
    $db = new Database();
    $file = file_get_contents($fileDetails['tmp_name']);
    $encodedFile = base64_encode($file);

    switch ($fileDetails['type']) {
        case 'application/pdf':
            $db->uploadTechnologyPdf($_POST['id'], $encodedFile);
            break;
        case 'image/png':
            $db->uploadTechnologyLogo($_POST['id'], $encodedFile);
            break;
        default:
            header('Location: ./');
            die;
    }
}

function upload_tech_images(): void
{
    if (!isset($_POST['id'])) {
        header('Location: ./');
        die;
    }
    if (!isset($_FILES['files'])) {
        header('Location: ./');
        die;
    }

    $encodedImages = [];

    foreach ($_FILES['files']['tmp_name'] as $image) {
        $file = file_get_contents($image);
        $encoded = base64_encode($file);
        $encodedImages[] = $encoded;
    }

    $db = new Database();
    $db->uploadTechnologyImages($_POST['id'], $encodedImages);
}
