<?php
class User {
    public $username; // Property to store the username
    public $email; // Property to store the email
    public $password; // Property to store the password
    public $phone; // Property to store the phone number

    public function __construct($username, $email, $password, $phone) {
        $this->username = $username; // Initializing username property
        $this->email = $email; // Initializing email property
        $this->password = $password; // Initializing password property
        $this->phone = $phone; // Initializing phone property
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Checking if the request method is POST
    // Check if all form fields are set in the POST data
    if (isset($_POST['username'], $_POST['Email'], $_POST['password'], $_POST['Phone'])) {
        $username = $_POST['username']; // Retrieving username from POST data
        $email = $_POST['Email']; // Retrieving email from POST data
        $password = $_POST['password']; // Retrieving password from POST data
        $phone = $_POST['Phone']; // Retrieving phone number from POST data

        $user = new User($username, $email, $password, $phone); // Creating a new User object

        // Printing user registration information
        echo "<h2>Thank you for registering!</h2>"; // Displaying a thank you message
        echo "<p>Username: $user->username</p>"; // Displaying the username
        echo "<p>Email: $user->email</p>"; // Displaying the email
        echo "<p>Password: $user->password</p>"; // Displaying the password
        echo "<p>Phone: $user->phone</p>"; // Displaying the phone number
    } else {
        echo "One or more form fields are missing."; // Displaying an error message if any form field is missing
    }
} else {
    // If the form is not submitted properly, redirect to the login page
    header("Location: login.html"); // Redirecting to the login page
    exit(); // Exiting the script
}
?>
