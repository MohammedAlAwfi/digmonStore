<?php
class QuestionnaireResponse {
    public $name; // Property to store the name
    public $gender; // Property to store the gender
    public $interests; // Property to store the interests
    public $feedback; // Property to store the feedback
    public $rating; // Property to store the rating

    public function __construct($name, $gender, $interests, $feedback, $rating) {
        $this->name = $name; // Initializing name property
        $this->gender = $gender; // Initializing gender property
        $this->interests = $interests; // Initializing interests property
        $this->feedback = $feedback; // Initializing feedback property
        $this->rating = $rating; // Initializing rating property
    }
}

// Initialize an array to store QuestionnaireResponse objects
$questionnaireResponses = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Checking if the request method is POST
    // Retrieve form data
    $name = $_POST['name']; // Retrieving name from POST data
    $gender = $_POST['gender']; // Retrieving gender from POST data

    // Check if 'interests' field is set and is an array, then retrieve the array of interests
    $interests = isset($_POST['interests']) && is_array($_POST['interests']) ? $_POST['interests'] : []; // Retrieving interests from POST data and checking if it's an array

    // Implode the array of interests into a comma-separated string
    $interests_str = implode(', ', $interests); // Converting array of interests into a string

    $feedback = $_POST['feedback']; // Retrieving feedback from POST data
    $rating = $_POST['rating']; // Retrieving rating from POST data

    // Create QuestionnaireResponse object and store it in the array
    $questionnaireResponse = new QuestionnaireResponse($name, $gender, $interests_str, $feedback, $rating); // Creating a new QuestionnaireResponse object
    $questionnaireResponses[] = $questionnaireResponse; // Adding the response to the array of questionnaire responses

    // Normally, you would save this data to a database or session
    // For now, we'll just display the last submitted response
}

// Function to display questionnaire responses in table format
function displayQuestionnaireResponses($questionnaireResponses) {
    echo "<table border='1'>"; // Start of HTML table
    echo "<tr><th>Name</th><th>Gender</th><th>Interests</th><th>Feedback</th><th>Rating</th></tr>"; // Table header row
    foreach ($questionnaireResponses as $response) { // Looping through each questionnaire response
        echo "<tr>"; // Start of table row
        echo "<td>".$response->name."</td>"; // Displaying name
        echo "<td>".$response->gender."</td>"; // Displaying gender
        echo "<td>".$response->interests."</td>"; // Displaying interests
        echo "<td>".$response->feedback."</td>"; // Displaying feedback
        echo "<td>".$response->rating."</td>"; // Displaying rating
        echo "</tr>"; // End of table row
    }
    echo "</table>"; // End of HTML table
}

// Display questionnaire responses
displayQuestionnaireResponses($questionnaireResponses);
?>

