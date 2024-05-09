<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$dbname = "digimonweb";

// Create connection
$conn = new mysqli($servername, $username, '', $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists
$tableExists = $conn->query("SHOW TABLES LIKE 'products'")->num_rows > 0;

if (!$tableExists) {
    die("Error: Table 'product' doesn't exist in the 'digimonweb' database.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['Product_type']) && isset($_POST['Product_price'])) {
    $Product_type = $_POST['Product_type'];
    $Product_price = $_POST['Product_price'];

    // Construct and execute SQL UPDATE query
    $sql = "UPDATE products SET Product_type='$Product_type', Product_price='$Product_price' WHERE Product_id = $Product_id";
    $sql = "INSERT INTO products (Product_type, Product_price) VALUES ('$Product_type', '$Product_price')";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!-- HTML form for updating records -->
<form method="post" action="">
    <input type="text" name="Product_type" placeholder="New Product Type">
    <input type="number" name="Product_price" placeholder="New Price">
    <input type="submit" value="Insert">
</form>