<?php
class QuestionnaireResponse {
    public $name;
    public $gender;
    public $interests;
    public $feedback;
    public $rating;

    public function __construct($name, $gender, $interests, $feedback, $rating) {
        $this->name = $name;
        $this->gender = $gender;
        $this->interests = $interests;
        $this->feedback = $feedback;
        $this->rating = $rating;
    }
}

// Initialize an array to store QuestionnaireResponse objects
$questionnaireResponses = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];

    // Check if 'interests' field is set and is an array, then retrieve the array of interests
    $interests = isset($_POST['interests']) && is_array($_POST['interests']) ? $_POST['interests'] : [];

    // Implode the array of interests into a comma-separated string
    $interests_str = implode(', ', $interests);

    $feedback = $_POST['feedback'];
    $rating = $_POST['rating'];

    // Create QuestionnaireResponse object and store it in the array
    $questionnaireResponse = new QuestionnaireResponse($name, $gender, $interests_str, $feedback, $rating);
    $questionnaireResponses[] = $questionnaireResponse;

    // Normally, you would save this data to a database or session
    // For now, we'll just display the last submitted response
}

// Function to display questionnaire responses in table format
function displayQuestionnaireResponses($questionnaireResponses) {
    echo "<table border='1'>";
    echo "<tr><th>Name</th><th>Gender</th><th>Interests</th><th>Feedback</th><th>Rating</th></tr>";
    foreach ($questionnaireResponses as $response) {
        echo "<tr>";
        echo "<td>".$response->name."</td>";
        echo "<td>".$response->gender."</td>";
        echo "<td>".$response->interests."</td>";
        echo "<td>".$response->feedback."</td>";
        echo "<td>".$response->rating."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Display questionnaire responses
displayQuestionnaireResponses($questionnaireResponses);
?>
