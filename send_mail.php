<?php
require 'PHPMailer/PHPMailerAutoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Validate required fields
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        echo 'All fields are required.';
        exit;
    }

    $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'pugalenthi1512@gmail.com';         // SMTP username
    $mail->Password = 'gufzcthabfniqsut';                 // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom($email, $name);                        // From email and name from form
    $mail->addAddress('pugalenthi1512@gmail.com', 'Pugal'); // Recipient's email and name

    $mail->isHTML(true);                                  // Set email format to HTML

    // Email subject and body
    $mail->Subject = "Message from $name - $phone";
    $mail->Body = "
        <h3>Contact Form Message</h3>
        <p><b>Name:</b> $name</p>
        <p><b>Email:</b> $email</p>
        <p><b>Phone:</b> $phone</p>
        <p><b>Message:</b> $message</p>
    ";
    $mail->AltBody = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";

    // Send email and output result
    if (!$mail->send()) {
        header('Location: https://www.rivvottechnologies.com/sakthi/contact.php');
        exit;
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        header('Location: https://www.rivvottechnologies.com/sakthi/contact.php');
        exit;
    }
} else {
    echo 'Invalid request method.';
}
