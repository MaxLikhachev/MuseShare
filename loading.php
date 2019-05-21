<?php
include 'config.php';
//$uploaddir = ;
//$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

if ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK)
{
    move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$_FILES['userfile']['name']);
    echo "Файл загружен";
    echo $_SERVER['DOCUMENT_ROOT'];
    echo $_FILES['userfile']['name'];
}
?>