<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST["message"]);

    if ($email && $name && $message) {
        $to = "piyushsinghal355@gmail.com"; // Replace this with your email address
        $subject = "New Contact Form Submission";
        $headers = "From: $email";

        // Mail content
        $mail_content = "Name: $name\n";
        $mail_content .= "Email: $email\n\n";
        $mail_content .= "Message:\n$message";

        // Send email
        $success = mail($to, $subject, $mail_content, $headers);

        if ($success) {
            header("Location: contact.html?success=true");
            exit;
        } else {
            header("Location: contact.html?success=false");
            exit;
        }
    } else {
        // Invalid input, redirect back to the form with an error flag
        header("Location: contact.html?success=false");
        exit;
    }
}
?>