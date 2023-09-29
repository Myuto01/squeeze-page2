<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace with your real receiving email address
    $receiving_email_address = 'mutalemwango04@gmail.com';

    // Replace with your SMTP server credentials
    $smtp_host = 'smtp.mandrillapp.com';
    $smtp_username = 'mutalemwango04@gmail.com';
    $smtp_password = 'M@gna2020';
    $smtp_port = 587; // Use the appropriate SMTP port
    $smtp_security = 'tls'; // You can use 'ssl' if needed

    // Validation
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please fill out the form correctly.";
    } else {
        // Create a PHPMailer object
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Set up SMTP
        $mail->isSMTP();
        $mail->Host = $smtp_host; 
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username; 
        $mail->Password = $smtp_password; 
        $mail->Port = $smtp_port; 
        $mail->SMTPSecure = $smtp_security; 

        // Sender and recipient
        $mail->setFrom($email, $name);
        $mail->addAddress($receiving_email_address);

        // Email subject and body
        $mail->Subject = "Notify me request";
        $mail->Body = "Name: $name\n";
        $mail->Body .= "Email: $email\n";

        // Attach eBook (replace 'ebook.pdf' with the actual eBook file path)
        $ebook_path = 'static/assets/E-book/Book Draft.pdf';
        $mail->addAttachment($ebook_path);

        // Send email
        if ($mail->send()) {
            echo "Thank you! Your request has been submitted, and the eBook has been sent.";
        } else {
            echo "Sorry, there was an error processing your request. Please try again later.";
        }
    }
} else {
    // Handle invalid request method (GET instead of POST)
    echo "Invalid request method.";
}
?>
