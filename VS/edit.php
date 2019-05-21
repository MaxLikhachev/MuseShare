<?php
session_start();
include 'config.php';

echo "<html><body>Выберите запись для редактирования:<br><form action=\"edit.php\" method=\"get\"><input type='text'name='text' placeholder='Поиск...'><button type='submit' name='search'>Поиск</button><select name='load[]'>";
$id = $clinic_name = $clinic_address = $doc_name = $doc_phone = $pat_phone = $pat_name = $date = $price = NULL;

$stmt = $pdo->prepare('SELECT * FROM RECEIPT');
$stmt->execute();
$receipts = array();
foreach ($stmt as $row) {

    $stm = $pdo->prepare("SELECT * FROM CLINIC WHERE id = ?");
    $stm->execute([$row['clinic_id']]);
    foreach ($stm as $subrow) {
        $clinic_name = $subrow['name'];
        $clinic_address = $subrow['address'];
    }

    $stm = $pdo->prepare("SELECT * FROM PATIENT WHERE id = ?");
    $stm->execute([$row['patient_id']]);
    foreach ($stm as $subrow) {
        $pat_name = $subrow['name'];
        $pat_phone = $subrow['phone'];
    }

    $stm = $pdo->prepare("SELECT * FROM DOCTOR WHERE id = ?");
    $stm->execute([$row['doctor_id']]);
    foreach ($stm as $subrow) {
        $doc_name = $subrow['name'];
        $doc_phone = $subrow['phone'];
    }

    $price = $row['price'];
    $date = $row['date'];
    $id = $row['receipt_id'];
    $receipt = $clinic_name . "   " . $doc_name . "   " . $pat_name . "   " . $row['price'] . "   " . $row['date']."<br>";

    if (strripos($receipt, $_GET['text']) !==false) {
        //echo $receipt;
        $receipts[] = $receipt;
        echo "<option value='".$row['$receipt_id']."'>".$receipt."</option>";
    }
}

echo "</select><button type=\"submit\" name=\"send\">Выбрать запись</button></form>";

if(isset($_GET['send'])) {
    foreach ($_GET['load'] as $load) {
        $_SESSION['id'] = $load;
        $stmt = $pdo->prepare("SELECT * FROM RECEIPT WHERE receipt_id = ?");
        $stmt->execute([$load]);
        foreach ($stmt as $row) {
            $stm = $pdo->prepare("SELECT * FROM CLINIC WHERE id = ?");
            $stm->execute([$row['clinic_id']]);
            foreach ($stm as $subrow) {
                $clinic_name = $subrow['name'];
                $clinic_address = $subrow['address'];
            }

            $stm = $pdo->prepare("SELECT * FROM PATIENT WHERE id = ?");
            $stm->execute([$row['patient_id']]);
            foreach ($stm as $subrow) {
                $pat_name = $subrow['name'];
                $pat_phone = $subrow['phone'];
            }

            $stm = $pdo->prepare("SELECT * FROM DOCTOR WHERE id = ?");
            $stm->execute([$row['doctor_id']]);
            foreach ($stm as $subrow) {
                $doc_name = $subrow['name'];
                $doc_phone = $subrow['phone'];
            }

            $price = $row['price'];
            $date = $row['date'];
        }
    }
    require ('form.php');
} else {
    $id = $clinic_name = $clinic_address = $doc_name = $doc_phone = $pat_phone = $pat_name = $date = $price = NULL;
    require_once ('form.php');

}
