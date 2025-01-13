<?php
// Enable error reporting for debugging during development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Set the recipient email address
$recipient_email = 'anup.dkal@gmail.com';

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input fields
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Check if all fields are filled and valid
    if ($name && $email && $subject && $message) {
        // Compose the email headers
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Send the email
        if (mail($recipient_email, $subject, $message, $headers)) {
            // Respond with success message
            echo json_encode(['status' => 'success', 'message' => 'Your message has been sent successfully.']);
        } else {
            // Respond with failure message
            echo json_encode(['status' => 'error', 'message' => 'Failed to send your message. Please try again later.']);
        }
    } else {
        // Respond with validation error message
        echo json_encode(['status' => 'error', 'message' => 'Please fill all the fields with valid information.']);
    }
} else {
    // Respond with invalid request method message
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
