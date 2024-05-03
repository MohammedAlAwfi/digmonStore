<?php
class User {
    public $username;
    public $email;
    public $password;
    public $phone;

    public function __construct($username, $email, $password, $phone) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all form fields are set in the POST data
    if (isset($_POST['username'], $_POST['Email'], $_POST['password'], $_POST['Phone'])) {
        $username = $_POST['username'];
        $email = $_POST['Email'];
        $password = $_POST['password'];
        $phone = $_POST['Phone'];

        $user = new User($username, $email, $password, $phone);

        // prints
        echo "<h2>Thank you for registering!</h2>";
        echo "<p>Username: $user->username</p>";
        echo "<p>Email: $user->email</p>";
        echo "<p>Password: $user->password</p>";
        echo "<p>Phone: $user->phone</p>"; 
    } else {
        echo "One or more form fields are missing.";
    }
} else {
    // If the form is not submitted properly, redirect to the login page
    header("Location: login.html");
    exit();
}
?>
