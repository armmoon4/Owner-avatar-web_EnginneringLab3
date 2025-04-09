<?php
$host = 'localhost';
$db = 'user_data';  // Database name
$user = 'root';     // Database username
$pass = '';         // Database password

try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get data from form
    $name = $_POST["name"];

    // Prepare and execute the search query (using LIKE for partial matching)
    $sql = "SELECT * FROM users WHERE name LIKE :name";
    $stmt = $pdo->prepare($sql);
    
    // Add wildcard characters to allow partial matching
    $searchTerm = "%" . $name . "%";
    $stmt->bindParam(':name', $searchTerm);
    $stmt->execute();

    // Count the number of records found
    $rowCount = $stmt->rowCount();

    // Check if a record is found
    if ($rowCount > 0) {
        echo "<div class='container'>";
        echo "<h3>User Found: {$rowCount} results</h3>"; // Display the number of results
        
        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div>";
            echo "Name: " . $user['name'] . "<br>";
            echo "Email: " . $user['email'] . "<br>";
            echo "Age: " . $user['age'] . "<br>";
            echo "Gender: " . $user['gender'] . "<br>";
            echo "Course: " . $user['course'] . "<br><br>";
            echo "</div>";
        }
        
        echo "</div>";
    } else {
        // If no records are found
        header("Location: index.html?message=No record found!");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
