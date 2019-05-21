<?php
include 'config.php';
echo "<form action='search.php'>
<input type='text'name='text' placeholder='Поиск...'>
<button type='submit' name='search'>Поиск</button>
</form> ";

if(isset($_GET['search'])) {
    $id = $clinic_name = $clinic_address = $doc_name = $doc_phone = $pat_phone = $pat_name = $date = $price = NULL;
    $receipts = array();

    $stmt = $pdo->prepare('SELECT * FROM RECEIPT');
    $stmt->execute();

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
        $_SESSION['id'] = $id = $row['receipt_id'];
        $receipt = $clinic_name . "   " . $doc_name . "   " . $pat_name . "   " . $row['price'] . "   " . $row['date']."<br>";

        if (strripos($receipt, $_GET['text']) !==false) {
            //echo $receipt;
            $receipts[] = $receipt;
        }
    }
    sort($receipts);
    foreach($receipts as $receipt)
        echo $receipt;
} else require_once ('index.php')
?>



