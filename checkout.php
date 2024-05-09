<?php
class check {
    public $name; // Property to store the username
    public $email; // Property to store the email
    public $address; // Property to store the address
    public $city; // Property to store the city
    public $state; // Property to store the state
    public $code; // Property to store the code
    public $Ncard; // Property to store the Ncard
    public $cardit; // Property to store the cardit
    public $dateM; // Property to store the dateM
    public $dateY; // Property to store the dateY
    public $Cvv; // Property to store the Cvv

    public function __construct($name, $email, $address, $city,$state,$code,$Ncard,$cardit,$dateM,$dateY,$Cvv) {
        $this->name = $name; // Initializing username property
        $this->email = $email; // Initializing email property
        $this->address = $address; // Initializing address property
        $this->city = $city; // Initializing city property
        $this->state = $state; // Initializing state property
        $this->code = $code; // Initializing code property
        $this->Ncard = $Ncard; // Initializing Ncard property
        $this->cardit = $cardit; // Initializing cardit property
        $this->dateM = $dateM; // Initializing dateM property
        $this->dateY = $dateY; // Initializing dateY property
        $this->Cvv = $Cvv; // Initializing Cvv property
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['firstname'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['zip'], $_POST['cardname'], $_POST['cardnumber'], $_POST['expmonth'], $_POST['expyear'], $_POST['cvv'])) {
        $name = $_POST['firstname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $cardname = $_POST['cardname'];
        $cardnumber = $_POST['cardnumber'];
        $expmonth = $_POST['expmonth'];
        $expyear = $_POST['expyear'];
        $cvv = $_POST['cvv'];

        echo "<h2>Thank you for purchasing!</h2>";
        echo "<style>
            table {
                border-collapse: collapse;
                width: 100%;
                margin-top: 20px;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            </style>";
        echo "<table>";
        echo "<tr><th>Field</th><th>Value</th></tr>";
        echo "<tr><td>Name</td><td>$name</td></tr>";
        echo "<tr><td>Email</td><td>$email</td></tr>";
        echo "<tr><td>Address</td><td>$address</td></tr>";
        echo "<tr><td>City</td><td>$city</td></tr>";
        echo "<tr><td>State</td><td>$state</td></tr>";
        echo "<tr><td>Zip</td><td>$zip</td></tr>";
        echo "<tr><td>Card Name</td><td>$cardname</td></tr>";
        echo "<tr><td>Card Number</td><td>$cardnumber</td></tr>";
        echo "<tr><td>Expiration Month</td><td>$expmonth</td></tr>";
        echo "<tr><td>Expiration Year</td><td>$expyear</td></tr>";
        echo "<tr><td>CVV</td><td>$cvv</td></tr>";
        echo "</table>";
    } else {
        echo "One or more form fields are missing.";
    }
} else {
    header("Location: checkout.html");
    exit();
}


?>
