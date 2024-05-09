<?php
class contactRes {
    public $name; // Property to store the name
    public $email; // Property to store the email
    public $feedback; // Property to store the feedback
    

    public function __construct($name, $email, $feedback) {
        $this->name = $name; // Initializing name property
        $this->email = $email; // Initializing email property
        
        $this->feedback = $feedback; // Initializing feedback property

    }
}

// Initialize an array to store QuestionnaireResponse objects
$contactrespone = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Checking if the request method is POST
    // Retrieve form data
    $name = $_POST['name']; // Retrieving name from POST data
    $email = $_POST['email']; // Retrieving email from POST data

    $feedback = $_POST['feedback']; // Retrieving feedback from POST data

    // Create QuestionnaireResponse object and store it in the array
    $questionnaireResponse = new contactRes($name, $email, $feedback); // Creating a new QuestionnaireResponse object
    $contactrespone[] = $questionnaireResponse; // Adding the response to the array of questionnaire responses
}

// Function to display questionnaire responses in table format
function displaycontactrespone($contactrespone) {
    echo "<table border='1'>"; // Start of HTML table
    echo "<tr><th>Name</th><th>email</th><th>Feedback</th></tr>"; // Table header row
    foreach ($contactrespone as $response) { // Looping through each questionnaire response
        echo "<tr>"; // Start of table row
        echo "<td>".$response->name."</td>"; // Displaying name
        echo "<td>".$response->email."</td>"; // Displaying email
        echo "<td>".$response->feedback."</td>"; // Displaying feedback
        echo "</tr>"; // End of table row
    }
    echo "</table>"; // End of HTML table
}

// Display questionnaire responses
displaycontactrespone($contactrespone);
?>

