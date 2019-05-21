<?php
echo "<form action=\"receipt.php\" method=\"get\">
    <div>
        <label for=\"clinic\">Название клиники</label>
        <input type=\"text\" name=\"clinic\" placeholder=\"Название клиники\" value='".$clinic_name."'>
    </div>
    <div>
        <label for=\"address\">Адрес клиники</label>
        <input type=\"text\" name=\"address\" placeholder=\"Адрес клиники\" value='".$clinic_address."'>
    </div>
    <br>
    <div>
        <label for=\"doc_name\">ФИО врача</label>
        <input type=\"text\" name=\"doc_name\" placeholder=\"ФИО врача\" value='".$doc_name."'>
    </div>
   <div>
        <label for=\"doc_phone\">Телефон врача</label>
        <input type=\"text\" name=\"doc_phone\" placeholder=\"Телефон врача\" value='".$doc_phone."'>
    </div>
    <br>
    <div>
        <label for=\"pat_name\">ФИО пациента</label>
        <input type=\"text\" name=\"pat_name\" placeholder=\"ФИО пациента\" value='".$pat_name."'>
    </div>
   <div>
        <label for=\"pat_phone\">Телефон пациента</label>
        <input type=\"text\" name=\"pat_phone\" placeholder=\"Телефон пациента\" value='".$pat_phone."'>
    </div>
    <br>
    <div>
        <label for=\"price\">Стоимость</label>
        <input type=\"text\" name=\"price\" placeholder=\"Стоимость\" value='".$price."'>
    </div>
    <div>
        <label for=\"date\">Дата</label>
        <input type=\"date\" name=\"date\" placeholder=\"Дата\" value='".$date."'>
    </div>
    <button type=\"submit\" name=\"send\">Сохранить</button>
    <button type=\"submit\" name=\"edit\">Обновить</button>
    <button type=\"submit\" name=\"remove\">Удалить</button>
</form>";
?>