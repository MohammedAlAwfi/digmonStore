<?php
//  database connection configuration
$servername = "localhost";
$username = "root";
$dbname = "digimonweb";

// Create connection
$conn = new mysqli($servername, $username, '', $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_criteria'])) {
    $search_criteria = $_POST['search_criteria'];

    // Construct and execute SQL SELECT query based on search criteria
    $sql = "SELECT * FROM products WHERE Product_type LIKE '%$search_criteria%' OR Product_price LIKE '%$search_criteria%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "Product Type: " . $row["Product_type"]. " - Product Price: " . $row["Product_price"]. " - <br>";
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>

<!-- HTML form for searching records -->
<form method="post" action="">
    <input type="text" name="search_criteria" placeholder="Search by Product Type or Price">
    <input type="submit" value="Search">
</form>
