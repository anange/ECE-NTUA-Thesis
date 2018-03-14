<?php
$user = "root";
$pass = "root";
$dsn = "mysql:host=localhost;dbname=test";
$charset = "utf8";

$dbh = new PDO('mysql:host=localhost;dbname=test;charset=$charset', $user, $pass);
?>

<?php

$query = "SELECT * FROM foo WHERE bar = " . $db->quote($zip);

$result = $db->query($query);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}
?>

<?php
$stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':value', $value);

// insert one row
$name = 'one';
$value = 1;
$stmt->execute();

// insert another row with different values
$name = 'two';
$value = 2;
$stmt->execute();
?>
