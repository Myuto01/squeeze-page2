<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
   echo $name = $_POST['name'];
   echo $email = $_POST['email'];

    // Add the email to your email service provider's list using their API
    // Replace with code to call your email service provider's API to add the email

    // Send the e-book
    $ebook_file = 'path/to/your/ebook.pdf'; // Update with the actual path
    $subject = "Your E-Book Download";
    $message = "Dear $name,\n\nThank you for your request. Here's your e-book: [Add e-book download link here]";
    $headers = "From: your_email@example.com";

    if (mail($email, $subject, $message, $headers)) {
        // Email sent successfully
        echo "Your notification request was sent, and the e-book has been emailed to you. Thank you!";
    } else {
        // Error sending email
        echo "Sorry, there was an error processing your request. Please try again later.";
    }
} else {
    // Handle invalid request method (GET instead of POST)
    echo "Invalid request method.";
}
?>
