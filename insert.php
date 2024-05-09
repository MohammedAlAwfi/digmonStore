<?php
// Database connection configuration
$servername = "localhost"; // Server where the database is hosted
$username = "root"; // Username for database access
$dbname = "digimonweb"; // Name of the database

// Create connection
$conn = new mysqli($servername, $username, '', $dbname); // Creating a new MySQLi connection object

// Check connection
if ($conn->connect_error) { // Checking if connection to the database failed
    die("Connection failed: " . $conn->connect_error); // Terminating the script and displaying an error message if connection failed
}

// Check if the table exists
$tableExists = $conn->query("SHOW TABLES LIKE 'products'")->num_rows > 0; // Checking if a table named 'products' exists in the database

if (!$tableExists) { // If 'products' table doesn't exist
    die("Error: Table 'product' doesn't exist in the 'digimonweb' database."); // Terminating the script and displaying an error message
}

// Processing POST data for updating or inserting records
if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['Product_type']) && isset($_POST['Product_price'])) {
    $Product_type = $_POST['Product_type']; // Retrieving new Product Type from the POST data
    $Product_price = $_POST['Product_price']; // Retrieving new Price from the POST data

    // Construct and execute SQL INSERT query
    $sql = "INSERT INTO products (Product_type, Product_price) VALUES ('$Product_type', '$Product_price')"; // SQL query to insert a new record

    if ($conn->query($sql) === TRUE) { // Executing the SQL query
        echo "Record updated successfully"; // Displaying success message if the query executed successfully
    } else {
        echo "Error updating record: " . $conn->error; // Displaying error message if the query failed
    }
}

$conn->close(); // Closing the database connection
?>

<!-- HTML form for updating records -->
<form method="post" action="">
    <input type="text" name="Product_type" placeholder="New Product Type"> <!-- Input field for entering new Product Type -->
    <input type="number" name="Product_price" placeholder="New Price"> <!-- Input field for entering new Price -->
    <input type="submit" value="Insert"> <!-- Submit button to trigger the form submission -->
</form>
