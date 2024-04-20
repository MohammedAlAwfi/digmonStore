function validateForm(event) {
    // Validate Name (Alphabetic characters only)
    const nameInput = document.getElementById('name'); // Get the input element for name
    const nameRegex = /^[a-zA-Z ]+$/; // Regular expression for alphabetic characters and space
    if (!nameRegex.test(nameInput.value)) { // Check if the name input matches the regex
        alert('Please enter a valid name (alphabetic characters only).'); // Alert message if invalid
        event.preventDefault(); // Prevent form submission
        return; // Exit the function
    }

    // Validate Feedback (Minimum length of 10 characters)
    const feedbackInput = document.getElementById('feedback'); // Get the input element for feedback
    if (feedbackInput.value.length < 10) { // Check if feedback length is less than 10
        alert('Feedback must be at least 10 characters long.'); // Alert message if too short
        event.preventDefault(); // Prevent form submission
        return; // Exit the function
    }

    // Validate Rating (Select option is not the default)
    const ratingInput = document.getElementById('rating'); // Get the input element for rating
    if (ratingInput.value === '') { // Check if no rating is selected
        alert('Please select a rating.'); // Alert message if no rating selected
        event.preventDefault(); // Prevent form submission
        return; // Exit the function
    }

    // Validate Interests (At least two interests selected)
    var checkboxes = document.getElementsByName('interests'); // Get all interest checkboxes
    var checkedCount = 0; // Counter for checked checkboxes

    for (var i = 0; i < checkboxes.length; i++) { // Loop through all checkboxes
        if (checkboxes[i].checked) { // Check if current checkbox is checked
            checkedCount++; // Increment checked count
        }
    }

    if (checkedCount < 2) { // If less than 2 interests are checked
        event.preventDefault(); // Prevent form submission
        alert('Please select at least two interests'); // Alert message
        return; // Exit the function
    }

    // All validations passed
    // If the function reaches this point, the form submission will proceed
    // No need for an explicit return statement since the function will naturally end here
    // Form will be submitted as normal
}
