<?php
// Connecting to a MySQL database
$user = "root";
$pass = "root";
$charset = "utf8";
$dsn = "mysql:host=localhost;dbname=test;charset=$charset";

$db = new PDO($dsn, $user, $pass);

// Executing a simple query
$val = 42;

$query = "SELECT * FROM foo WHERE bar = " . $db->quote($val);
$result = $db->query($query);

while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    print_r($row);
}

// Sequential executions of a prepared statement
$query = "INSERT INTO REGISTRY (name, value)
          VALUES (:name, :value)";
$stmt = $db->prepare($query);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':value', $value);

// First execution
$name = 'one';
$value = 1;
$stmt->execute();

// Second execution with different values
$name = 'two';
$value = 2;
$stmt->execute();
?>
