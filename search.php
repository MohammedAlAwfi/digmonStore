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

// Processing POST data for searching records
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search_criteria'])) {
    $search_criteria = $_POST['search_criteria']; // Retrieving search criteria from the POST data

    // Construct and execute SQL SELECT query based on search criteria
    $sql = "SELECT * FROM products WHERE Product_type LIKE '%$search_criteria%' OR Product_price LIKE '%$search_criteria%'"; // SQL query to search for records
    $result = $conn->query($sql); // Executing the SQL query

    if ($result->num_rows > 0) { // Checking if any results were returned
        // Output data of each row
        while ($row = $result->fetch_assoc()) { // Looping through each row of the result set
            echo "Product Type: " . $row["Product_type"]. " - Product Price: " . $row["Product_price"]. " - <br>"; // Displaying Product Type and Price of each row
        }
    } else {
        echo "0 results"; // Displaying message if no results were found
    }
}

$conn->close(); // Closing the database connection
?>

<!-- HTML form for searching records -->
<form method="post" action="">
    <input type="text" name="search_criteria" placeholder="Search by Product Type or Price"> <!-- Input field for entering search criteria -->
    <input type="submit" value="Search"> <!-- Submit button to trigger the form submission -->
</form>
