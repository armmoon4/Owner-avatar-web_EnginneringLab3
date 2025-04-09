<?php
$host = 'localhost';
$db = 'user_data';
$user = 'root';   
$pass = '';      

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from form
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $course = $_POST["course"];

    // Prepare and execute insert query
    $sql = "INSERT INTO users (name, email, age, gender, course) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $age, $gender, $course]);

    echo "Data inserted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
