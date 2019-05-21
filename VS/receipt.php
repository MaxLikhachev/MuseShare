<?php
session_start();
include 'config.php';

if (isset($_GET['remove'])) {
    $stmt = $pdo->prepare("DELETE FROM RECEIPT WHERE receipt_id = ?");
    $stmt->execute([$_SESSION['id']]);
} else require_once ('index.php');

if(isset($_GET['send']) || isset($_GET['edit'])) {

    if (isset($_GET['edit'])) {
        $stmt = $pdo->prepare("DELETE FROM RECEIPT WHERE receipt_id = ?");
        $stmt->execute([$_SESSION['id']]);
    }

    // clinic
    $clinic_id = -1;
    $stmt = $pdo->prepare('SELECT * FROM CLINIC WHERE name = ? AND address = ?');
    $stmt->execute(array($_GET['clinic'],$_GET['address']));
    foreach ($stmt as $row) $clinic_id = $row['id'];

    if($clinic_id == -1) {
        $stmt = $pdo->prepare("INSERT INTO CLINIC(name, address) VALUES (?, ?)");
        $stmt->execute(array($_GET['clinic'],$_GET['address']));

        $stmt = $pdo->prepare('SELECT * FROM CLINIC WHERE name = ? AND address = ?');
        $stmt->execute(array($_GET['clinic'],$_GET['address']));
        foreach ($stmt as $row) $clinic_id = $row['id'];

    }

    // doc
    $doc_id = -1;
    $stmt = $pdo->prepare('SELECT * FROM DOCTOR WHERE name = ? AND phone = ?');
    $stmt->execute(array($_GET['doc_name'],$_GET['doc_phone']));
    foreach ($stmt as $row) $doc_id = $row['id'];

    if($doc_id == -1) {
        $stmt = $pdo->prepare("INSERT INTO DOCTOR(name, phone) VALUES (?, ?)");
        $stmt->execute(array($_GET['doc_name'],$_GET['doc_phone']));

        $stmt = $pdo->prepare('SELECT * FROM DOCTOR WHERE name = ? AND phone = ?');
        $stmt->execute(array($_GET['doc_name'],$_GET['doc_phone']));
        foreach ($stmt as $row) $doc_id = $row['id'];
    }

    // patient
    $pat_id = -1;
    $stmt = $pdo->prepare('SELECT * FROM PATIENT WHERE name = ? AND phone = ?');
    $stmt->execute(array($_GET['pat_name'],$_GET['pat_phone']));
    foreach ($stmt as $row) $pat_id = $row['id'];

    if($pat_id == -1) {
        $stmt = $pdo->prepare("INSERT INTO PATIENT(name, phone) VALUES (?, ?)");
        $stmt->execute(array($_GET['pat_name'],$_GET['pat_phone']));

        $stmt = $pdo->prepare('SELECT * FROM PATIENT WHERE name = ? AND phone = ?');
        $stmt->execute(array($_GET['pat_name'],$_GET['pat_phone']));
        foreach ($stmt as $row) $pat_id = $row['id'];
    }

    // create receipt
    $stmt = $pdo->prepare("INSERT INTO RECEIPT(clinic_id, patient_id, doctor_id, date, price) VALUES (?,?,?,?,?)");
    $stmt->execute(array($clinic_id, $pat_id, $doc_id, $_GET['date'],$_GET['price']));

} else require_once ('index.php');
?>